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
 * Version details
 *
 * @package    block
 * @subpackage yammer
 * @copyright  2014 Catalyst EU
 * @author     Chris Wharton <chris.wharton@catalyst-eu.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_yammer extends block_base {
    function init() {
        $this->title = get_string('pluginname', 'block_yammer');
    }

    function applicable_formats() {
        return array('course-view' => true);
    }

    function has_config() { // global config settings.php
        return true;
    }

    function get_content() {

        if ($this->content !== NULL) {
            return $this->content;
        }

        $this->content = new stdClass();

        if (empty($this->config)) {
            $this->content->text = get_string('notconfigured', 'block_yammer');
            return $this->content;
        }

        // Get the yammer embed script source url from the global config.
        $this->config->scriptsource = get_config('yammer', 'scriptsource');

        // Get config settings for script.
        $params = array(
            'container' => '#embedded-feed',
            'network' => $this->config->network,
        );
        if (!empty($this->config->feedtype) && $this->config->feedtype !== 'my') { // The "my" feed doesn't use the feedType parameter.
            $params['feedType'] = $this->config->feedtype;
        }
        if (!empty($this->config->feedid)) {
            $params['feedId'] = $this->config->feedid;
        }
        if (!empty($this->config->defaultgroupid)) {
            $params['config'] = array('defaultGroupId' => $this->config->defaultgroupid);
        }
        if (!empty($this->config->ogurl)) {
            $params['objectProperties'] = array('url' => $this->config->ogurl, 'type' => 'page');
        }

        $this->content = new stdClass();
        $this->content->text = html_writer::tag('script', '', array('type' => 'text/javascript', 'src' => $this->config->scriptsource));
        $this->content->text.= html_writer::tag('div', '', array('id' => 'embedded-feed'));
        $this->content->text.= html_writer::tag('script', 'yam.connect.embedFeed(' . json_encode($params) . ');');

        return $this->content;
    }

    function hide_header() {
        return false;
    }

    function instance_allow_multiple() {
        return true;
    }
}


