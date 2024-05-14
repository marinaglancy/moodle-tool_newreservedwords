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
 * Install script for New reserved words
 *
 * Documentation: {@link https://moodledev.io/docs/guides/upgrade}
 *
 * @package    tool_newreservedwords
 * @copyright  2024 Marina Glancy
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Executed on installation of New reserved words
 *
 * @return bool
 */
function xmldb_tool_newreservedwords_install() {
    global $DB;
    $dbman = $DB->get_manager();

    $columncontenttype = $dbman->generator->getEncQuoted('content_type');
    $DB->execute("INSERT INTO {tool_newreservedwords} ($columncontenttype) ".
        "VALUES (?)", [2, 3]);
    return true;
}
