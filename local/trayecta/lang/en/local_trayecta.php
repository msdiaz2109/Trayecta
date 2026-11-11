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
 * Language strings (en) for local_trayecta.
 *
 * Moodle siempre requiere el paquete de idioma base en inglés para
 * resolver cadenas; lang/es/ trae la traduccion que usa el proyecto.
 *
 * @package    local_trayecta
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Trayecta';
$string['session_page_title'] = 'Trayecta · Session and role verification';
$string['session_page_heading'] = 'Session and role identification in Trayecta (PRM-14)';
$string['field_label'] = 'Field';
$string['value_label'] = 'Detected value in Moodle';
$string['user_fullname'] = 'Full name ($USER)';
$string['user_username'] = 'Moodle username';
$string['user_email'] = 'Institutional email';
$string['user_idnumber'] = 'Student ID (idnumber)';
$string['course_name'] = 'Current course';
$string['course_enrolled'] = 'Actively enrolled in course? (is_enrolled)';
$string['moodle_roles'] = 'Assigned roles in course (get_user_roles)';
$string['trayecta_role'] = 'Role recognized by Trayecta';
$string['trayecta_action'] = 'Corresponding plugin workflow';
$string['enrolled_yes'] = 'Yes (active enrolment)';
$string['enrolled_no'] = 'No';
$string['not_assigned'] = 'Not assigned';
$string['role_admin'] = 'Administrator';
$string['role_teacher'] = 'Teacher';
$string['role_student'] = 'Student';
$string['role_none'] = 'No access (user not enrolled)';
$string['action_admin'] = 'Access granted as Administrator: global plugin configuration, cohort management, and CSV export.';
$string['action_teacher'] = 'Access granted as Teacher: learning object classification, group analytics dashboard, and resource unlocking.';
$string['action_student'] = 'Access granted as Student: informed consent, profiling instruments (H1-H4), and personalized learning path.';
$string['action_none'] = 'Access denied (REQ-INT-001): the authenticated user is not enrolled in this course.';
