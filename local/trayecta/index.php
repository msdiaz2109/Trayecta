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

/**
 * Página de verificación de sesión y rol nativo de Moodle en local_trayecta (PRM-14).
 *
 * Muestra la identidad del usuario autenticado ($USER), su estado de inscripción
 * en el curso (is_enrolled) y el rol que Trayecta le reconoce (estudiante,
 * docente o administrador) mediante has_capability() e is_siteadmin(),
 * cumpliendo REQ-INT-001 y MT 2.3 sin pedir ningún registro adicional.
 *
 * @package    local_trayecta
 * @copyright  2026 Trayecta - Instituto Tecnológico de Morelia
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../config.php');

use local_trayecta\local\session_role_resolver;

$courseid = optional_param('courseid', SITEID, PARAM_INT);
$course = get_course($courseid);

// Exige que el usuario haya iniciado sesión en Moodle (sin solicitar registro extra).
require_login();
if (isguestuser()) {
    throw new require_login_exception('Guests are not allowed in Trayecta.');
}

$iscourse = ($course->id != SITEID);
$context = $iscourse ? context_course::instance($course->id) : context_system::instance();

$PAGE->set_url(new moodle_url('/local/trayecta/index.php', ['courseid' => $course->id]));
$PAGE->set_context($context);
if ($iscourse) {
    $PAGE->set_course($course);
}
$PAGE->set_pagelayout('incourse');
$PAGE->set_title(get_string('session_page_title', 'local_trayecta'));
$PAGE->set_heading($iscourse ? format_string($course->fullname) : get_string('pluginname', 'local_trayecta'));

$info = session_role_resolver::resolve((int)$course->id);

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('session_page_heading', 'local_trayecta'));

// Aviso de estado de acceso según el rol detectado (REQ-INT-001).
if ($info->canaccess) {
    echo $OUTPUT->notification($info->action, \core\output\notification::NOTIFY_SUCCESS);
} else {
    echo $OUTPUT->notification($info->action, \core\output\notification::NOTIFY_ERROR);
}

$enrolledtext = $info->isenrolled
    ? get_string('enrolled_yes', 'local_trayecta')
    : get_string('enrolled_no', 'local_trayecta');

$idnumbertext = ($info->idnumber !== '')
    ? s($info->idnumber)
    : get_string('not_assigned', 'local_trayecta');

$moodlerolestext = !empty($info->moodleroles)
    ? s(implode(', ', $info->moodleroles))
    : get_string('not_assigned', 'local_trayecta');

$table = new html_table();
$table->attributes['class'] = 'generaltable table table-bordered';
$table->head = [
    get_string('field_label', 'local_trayecta'),
    get_string('value_label', 'local_trayecta'),
];
$table->data = [
    [get_string('user_fullname', 'local_trayecta'), s($info->fullname)],
    [get_string('user_username', 'local_trayecta'), s($info->username) . ' (ID: ' . (int)$info->userid . ')'],
    [get_string('user_email', 'local_trayecta'), s($info->email)],
    [get_string('user_idnumber', 'local_trayecta'), $idnumbertext],
    [get_string('course_name', 'local_trayecta'), format_string($course->fullname) . ' (ID: ' . (int)$course->id . ')'],
    [get_string('course_enrolled', 'local_trayecta'), $enrolledtext],
    [get_string('moodle_roles', 'local_trayecta'), $moodlerolestext],
    [get_string('trayecta_role', 'local_trayecta'), html_writer::tag('strong', s($info->rolelabel))],
    [get_string('trayecta_action', 'local_trayecta'), s($info->action)],
];

echo html_writer::table($table);

echo $OUTPUT->footer();
