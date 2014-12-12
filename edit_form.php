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
        $mform->addHelpButton('config_network', 'network', 'block_yammer');
        $mform->addRule('config_network', get_string('err_required', 'form'), 'required', '', 'client');
        $mform->setType('config_network', PARAM_TEXT);
        // The yammer feed id.
        $mform->addElement('text', 'config_feedid', get_string('feedid', 'block_yammer'));
        $mform->addHelpButton('config_feedid', 'feedid', 'block_yammer');
        $mform->addRule('config_feedid', get_string('err_numeric', 'form'), 'numeric', '', 'client');
        $mform->setType('config_feedid', PARAM_TEXT);
        // The yammer feed type.
        $feedtypes = array('my' => 'my', 'group' => 'group', 'topic' => 'topic', 'user' => 'user', 'open-graph' => 'open-graph');
        $mform->addElement('select', 'config_feedtype', get_string('feedtype', 'block_yammer'), $feedtypes);
        $mform->addHelpButton('config_feedtype', 'feedtype', 'block_yammer');
        $mform->setType('config_feedtype', PARAM_TEXT);
        // The yammer feed default group id.
        $mform->addElement('text', 'config_defaultgroupid', get_string('defaultgroupid', 'block_yammer'));
        $mform->addHelpButton('config_defaultgroupid', 'defaultgroupid', 'block_yammer');
        $mform->addRule('config_defaultgroupid', get_string('err_numeric', 'form'), 'numeric', '', 'client');
        $mform->disabledIf('config_defaultgroupid', 'config_feedtype', 'neq', 'group');
        $mform->setType('config_defaultgroupid', PARAM_TEXT);
        // The opengraph parameters
        // opengraph url
        $mform->addElement('text', 'config_ogurl', get_string('ogurl', 'block_yammer'));
        $mform->addHelpButton('config_ogurl', 'ogurl', 'block_yammer');
        $mform->disabledIf('config_ogurl', 'config_feedtype', 'neq', 'open-graph');
        $mform->setType('config_ogurl', PARAM_URL);
        // Where to get the parameters from.
        $mform->addElement('static', 'description', '', get_string('config_help', 'block_yammer'));
        // Clean form inputs.
        $mform->applyFilter('__ALL__', 'trim');
    }

    public function validation($data, $files) {
        $errors = array();

        // If open-graph is the selected feed type, a url is required
        if (($data['config_feedtype'] === 'open-graph') && (empty($data['config_ogurl']))) {
            $errors['config_ogurl'] = get_string('err_required', 'form');
        }

        return $errors;
    }
}
