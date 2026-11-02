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

namespace local_trayecta;

use advanced_testcase;
use local_trayecta\local\session_role_resolver;

/**
 * Pruebas unitarias de integración con sesiones y roles nativos de Moodle (PRM-14).
 *
 * Verifica REQ-INT-001 y MT 2.3 con los tres roles del sistema (estudiante,
 * docente y administrador) y con un usuario no inscrito.
 *
 * @package    local_trayecta
 * @covers     \local_trayecta\local\session_role_resolver
 * @copyright  2026 Trayecta - Instituto Tecnológico de Morelia
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class session_role_resolver_test extends advanced_testcase {

    /**
     * Comprueba que el plugin distingue correctamente a un estudiante, un docente,
     * un administrador y un usuario no inscrito usando la sesión activa ($USER).
     */
    public function test_resolve_three_roles_and_unenrolled_user(): void {
        $this->resetAfterTest(true);

        $generator = $this->getDataGenerator();
        $course = $generator->create_course([
            'fullname'  => 'Fundamentos de Ingeniería de Software',
            'shortname' => 'FIS-2027',
        ]);

        $student = $generator->create_user([
            'firstname' => 'Mariana',
            'lastname'  => 'Meneses',
            'idnumber'  => '23121132',
        ]);
        $teacher = $generator->create_user([
            'firstname' => 'Claudio',
            'lastname'  => 'Florián',
        ]);
        $outsider = $generator->create_user([
            'firstname' => 'Usuario',
            'lastname'  => 'Externo',
        ]);

        $generator->enrol_user($student->id, $course->id, 'student');
        $generator->enrol_user($teacher->id, $course->id, 'editingteacher');

        // 1. Estudiante inscrito.
        $this->setUser($student);
        $studentinfo = session_role_resolver::resolve((int)$course->id);
        $this->assertSame((int)$student->id, $studentinfo->userid);
        $this->assertSame('23121132', $studentinfo->idnumber);
        $this->assertTrue($studentinfo->isenrolled);
        $this->assertFalse($studentinfo->isteacher);
        $this->assertFalse($studentinfo->isadmin);
        $this->assertSame(session_role_resolver::ROLE_STUDENT, $studentinfo->trayectarole);
        $this->assertTrue($studentinfo->canaccess);

        // 2. Docente inscrito (editingteacher).
        $this->setUser($teacher);
        $teacherinfo = session_role_resolver::resolve((int)$course->id);
        $this->assertSame((int)$teacher->id, $teacherinfo->userid);
        $this->assertTrue($teacherinfo->isenrolled);
        $this->assertTrue($teacherinfo->isteacher);
        $this->assertFalse($teacherinfo->isadmin);
        $this->assertSame(session_role_resolver::ROLE_TEACHER, $teacherinfo->trayectarole);
        $this->assertTrue($teacherinfo->canaccess);

        // 3. Administrador del sitio.
        $this->setAdminUser();
        $admininfo = session_role_resolver::resolve((int)$course->id);
        $this->assertTrue($admininfo->isadmin);
        $this->assertSame(session_role_resolver::ROLE_ADMIN, $admininfo->trayectarole);
        $this->assertTrue($admininfo->canaccess);

        // 4. Usuario no inscrito (rechazado según REQ-INT-001).
        $this->setUser($outsider);
        $outsiderinfo = session_role_resolver::resolve((int)$course->id);
        $this->assertFalse($outsiderinfo->isenrolled);
        $this->assertSame(session_role_resolver::ROLE_NONE, $outsiderinfo->trayectarole);
        $this->assertFalse($outsiderinfo->canaccess);
    }
}
