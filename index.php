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
 * TODO describe file index
 *
 * @package    tool_newreservedwords
 * @copyright  2024 Marina Glancy
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../../../config.php');

require_login();

$url = new moodle_url('/admin/tool/newreservedwords/index.php', []);
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());

$PAGE->set_heading($SITE->fullname);
echo $OUTPUT->header();
print_object($DB->get_records('tool_newreservedwords'));
$columncontenttype = $DB->get_manager()->generator->getEncQuoted('content_type');
print_object($DB->get_records_sql("SELECT id, $columncontenttype FROM {tool_newreservedwords}
    WHERE $columncontenttype IS NOT NULL"));
echo $OUTPUT->footer();
