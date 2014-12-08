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
 * Course summary block caps.
 *
 * @package    block_yammer
 * @copyright  2014 Catalyst EU
 * @author     Chris Wharton <chris.wharton@catalyst-eu.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_yammer_edit_form extends block_edit_form {

    protected function specific_definition($mform) {

        // Section header title according to language file.
        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));

        // The yammer network permalink.
        $mform->addElement('text', 'config_network', get_string('network', 'block_yammer'));
        $mform->setType('config_network', PARAM_TEXT);
        $mform->addRule('config_network', get_string('required'), 'required', '', 'client');
        // The yammer feed id.
        $mform->addElement('text', 'config_feedid', get_string('feedid', 'block_yammer'));
        $mform->setType('config_feedid', PARAM_TEXT);
        // The yammer feed type.
        $mform->addElement('text', 'config_feedtype', get_string('feedtype', 'block_yammer'));
        $mform->setType('config_feedtype', PARAM_TEXT);
        // The yammer feed default group id.
        $mform->addElement('text', 'config_defaultgroupid', get_string('defaultgroupid', 'block_yammer'));
        $mform->setType('config_defaultgroupid', PARAM_TEXT);
    }
}
