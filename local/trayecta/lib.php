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
 * Funciones de integración con los hooks de navegación de Moodle para local_trayecta.
 *
 * @package    local_trayecta
 * @copyright  2026 Trayecta - Instituto Tecnológico de Morelia
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Agrega el enlace de Trayecta en el menú de navegación de cada curso.
 *
 * @param navigation_node $navigation Nodo de navegación del curso.
 * @param stdClass $course Registro del curso de Moodle.
 * @param context_course $context Contexto del curso.
 * @return void
 */
function local_trayecta_extend_navigation_course(
    navigation_node $navigation,
    stdClass $course,
    context_course $context
): void {
    global $USER;

    if (!isloggedin() || isguestuser()) {
        return;
    }

    if (!is_siteadmin($USER->id)
        && !has_capability('moodle/course:manageactivities', $context)
        && !is_enrolled($context, $USER->id, '', true)) {
        return;
    }

    $url = new moodle_url('/local/trayecta/index.php', ['courseid' => $course->id]);
    $navigation->add(
        get_string('pluginname', 'local_trayecta'),
        $url,
        navigation_node::TYPE_SETTING,
        null,
        'local_trayecta',
        new pix_icon('i/course', '')
    );
}
