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
 * Cadenas de idioma (es) del plugin local_trayecta.
 *
 * @package    local_trayecta
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Trayecta';
$string['session_page_title'] = 'Trayecta · Verificación de sesión y rol';
$string['session_page_heading'] = 'Identificación de sesión y rol en Trayecta (PRM-14)';
$string['field_label'] = 'Campo';
$string['value_label'] = 'Valor detectado en Moodle';
$string['user_fullname'] = 'Nombre completo ($USER)';
$string['user_username'] = 'Usuario de Moodle';
$string['user_email'] = 'Correo institucional';
$string['user_idnumber'] = 'Número de control (idnumber)';
$string['course_name'] = 'Curso actual';
$string['course_enrolled'] = '¿Inscrito activamente en el curso? (is_enrolled)';
$string['moodle_roles'] = 'Roles asignados en el curso (get_user_roles)';
$string['trayecta_role'] = 'Rol reconocido por Trayecta';
$string['trayecta_action'] = 'Flujo correspondiente en el plugin';
$string['enrolled_yes'] = 'Sí (inscripción activa)';
$string['enrolled_no'] = 'No';
$string['not_assigned'] = 'Sin asignar';
$string['role_admin'] = 'Administrador';
$string['role_teacher'] = 'Docente';
$string['role_student'] = 'Estudiante';
$string['role_none'] = 'Sin acceso (usuario no inscrito)';
$string['action_admin'] = 'Acceso habilitado como Administrador: configuración global del plugin, gestión de cohortes y exportación CSV.';
$string['action_teacher'] = 'Acceso habilitado como Docente: clasificación de objetos de aprendizaje, panel analítico de grupo y desbloqueo de recursos.';
$string['action_student'] = 'Acceso habilitado como Estudiante: consentimiento informado, herramientas de perfilamiento (H1-H4) y ruta de aprendizaje.';
$string['action_none'] = 'Acceso rechazado (REQ-INT-001): el usuario autenticado no está inscrito en este curso.';
