<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace local_trayecta\local;

use context_course;
use context_system;
use stdClass;

/**
 * Identifica al usuario autenticado en Moodle y resuelve su rol en Trayecta.
 *
 * Cumple REQ-INT-001 y MT 2.3: utiliza únicamente la sesión activa de Moodle
 * ($USER) y las funciones nativas de control de acceso e inscripción
 * (is_siteadmin, has_capability, is_enrolled, get_user_roles), sin solicitar
 * ningún registro ni credencial adicional.
 *
 * @package    local_trayecta
 * @copyright  2026 Trayecta - Instituto Tecnológico de Morelia
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class session_role_resolver {

    /** Rol de administrador del sistema en Trayecta. */
    public const ROLE_ADMIN = 'admin';

    /** Rol de docente titular / profesor en el curso. */
    public const ROLE_TEACHER = 'teacher';

    /** Rol de estudiante inscrito activamente en el curso. */
    public const ROLE_STUDENT = 'student';

    /** Usuario autenticado sin inscripción ni permisos en el curso (acceso rechazado). */
    public const ROLE_NONE = 'none';

    /**
     * Resuelve la identidad del usuario en sesión, su estado de inscripción
     * y el rol operativo que le corresponde dentro de Trayecta para un curso.
     *
     * @param int $courseid ID del curso de Moodle (o SITEID si no se especificó).
     * @param stdClass|null $user Objeto de usuario de Moodle (por defecto usa $USER global).
     * @return stdClass Estructura con los datos de sesión, inscripción, rol y acción.
     */
    public static function resolve(int $courseid, ?stdClass $user = null): stdClass {
        global $USER;

        $targetuser = $user ?? $USER;
        $userid = (int)($targetuser->id ?? 0);

        $systemcontext = context_system::instance();
        $iscourse = ($courseid > 0 && $courseid != SITEID);
        $coursecontext = $iscourse ? context_course::instance($courseid) : null;

        // 1. Verificar si es administrador del sitio.
        $isadmin = is_siteadmin($userid)
            || has_capability('moodle/site:config', $systemcontext, $userid);

        // 2. Verificar inscripción activa y capacidades en el contexto del curso.
        $isenrolled = false;
        $isteacher = false;
        $moodleroles = [];

        if ($coursecontext !== null) {
            // El cuarto parámetro (onlyactive = true) garantiza que solo cuente inscripciones activas.
            $isenrolled = is_enrolled($coursecontext, $userid, '', true);

            // El tercer parámetro ($doanything = false) evita que el admin se clasifique como docente
            // antes de pasar por la regla explícita de rol.
            $isteacher = has_capability('moodle/course:manageactivities', $coursecontext, $userid, false)
                || has_capability('moodle/course:update', $coursecontext, $userid, false);

            $assignedroles = get_user_roles($coursecontext, $userid, true);
            foreach ($assignedroles as $role) {
                $moodleroles[] = $role->shortname;
            }
        }

        // 3. Determinar el rol en Trayecta (administrador, docente, estudiante o sin acceso).
        if ($isadmin) {
            $trayectarole = self::ROLE_ADMIN;
            $rolelabel = get_string('role_admin', 'local_trayecta');
            $action = get_string('action_admin', 'local_trayecta');
            $canaccess = true;
        } else if ($isteacher) {
            $trayectarole = self::ROLE_TEACHER;
            $rolelabel = get_string('role_teacher', 'local_trayecta');
            $action = get_string('action_teacher', 'local_trayecta');
            $canaccess = true;
        } else if ($isenrolled) {
            $trayectarole = self::ROLE_STUDENT;
            $rolelabel = get_string('role_student', 'local_trayecta');
            $action = get_string('action_student', 'local_trayecta');
            $canaccess = true;
        } else {
            $trayectarole = self::ROLE_NONE;
            $rolelabel = get_string('role_none', 'local_trayecta');
            $action = get_string('action_none', 'local_trayecta');
            $canaccess = false;
        }

        return (object)[
            'userid'       => $userid,
            'username'     => $targetuser->username ?? '',
            'fullname'     => fullname($targetuser),
            'email'        => $targetuser->email ?? '',
            'idnumber'     => $targetuser->idnumber ?? '',
            'courseid'     => $courseid,
            'isenrolled'   => $isenrolled,
            'isadmin'      => $isadmin,
            'isteacher'    => $isteacher,
            'moodleroles'  => array_values(array_unique($moodleroles)),
            'trayectarole' => $trayectarole,
            'rolelabel'    => $rolelabel,
            'action'       => $action,
            'canaccess'    => $canaccess,
        ];
    }
}
