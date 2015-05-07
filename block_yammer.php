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
    public function init() {
        $this->title = get_string('pluginname', 'block_yammer');
    }

    public function applicable_formats() {
        return array('course-view' => true);
    }

    public function has_config() {
        return true;
    }

    public function get_content() {

        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = new stdClass();

        if (empty($this->config->feedtype)) {
            $this->content->text = get_string('notconfigured', 'block_yammer');
            return $this->content;
        }

        // Get config settings for script.
        $scriptsource = get_config('yammer', 'scriptsource');

        // Yammer network settings.
        $params = array(
            'container' => '#embedded-feed',
            'network' => $this->config->network,
            'config' => array(),
        );
        // The "my" feed doesn't use the feedType parameter.
        if ($this->config->feedtype !== 'my') {
            $params['feedType'] = $this->config->feedtype;
        }
        if (!empty($this->config->feedid)) {
            $params['feedId'] = $this->config->feedid;
        }
        if (!empty($this->config->defaultgroupid)) {
            $params['config']['defaultGroupId'] = $this->config->defaultgroupid;
        }
        $params['config']['defaultToCanonical'] = isset($this->config->defaulttocanonical) ? (bool) $this->config->defaulttocanonical : false;
        $params['config']['use_sso'] = isset($this->config->usesso) ? (bool) $this->config->usesso : false;

        // Open graph settings.
        if ($this->config->feedtype === 'open-graph') {
            $params['objectProperties'] = array(
                'url' => $this->config->ogurl,
                'type' => $this->config->ogtype,
                'fetch' => isset($this->config->fetch) ? (bool) $this->config->fetch : false,
                'private' => isset($this->config->private) ? (bool) $this->config->private : false,
                'ignore_canonical_url' => isset($this->config->ignore_canonical_url) ? (bool) $this->config->ignore_canonical_url : false,
            );
            $params['config']['showOpenGraphPreview'] = isset($this->config->showogpreview) ? (bool) $this->config->showogpreview : false;
        }

        // Feed display settings.
        if (!empty($this->config->prompttext)) {
            $params['config']['promptText'] = $this->config->prompttext;
        }
        $params['config']['header'] = isset($this->config->showheader) ? (bool) $this->config->showheader : false;
        $params['config']['hideNetworkName'] = isset($this->config->hideNetworkName) ? (bool) $this->config->hideNetworkName : false;
        $params['config']['footer'] = isset($this->config->showfooter) ? (bool) $this->config->showfooter : false;

        // Encode the parameters for the yammer javascript to use.
        $params = json_encode($params, JSON_PRETTY_PRINT);

        $this->content->text = html_writer::tag('div', '', array('id' => 'embedded-feed'));
        $this->content->text .= html_writer::tag('script', '',
            array('type' => 'text/javascript', 'src' => $scriptsource));
        $this->content->text .= html_writer::tag('script', "yam.connect.embedFeed({$params});");

        return $this->content;
    }

    public function hide_header() {
        return false;
    }

    public function instance_allow_multiple() {
        return false;
    }

    public function specialization() {
        if (!isset($this->config)) {
            $this->config = new stdClass();
        }
        // Set the block title.
        if (!empty($this->config->title)) {
            $this->title = $this->config->title;
        } else {
            $this->title = get_string('pluginname', 'block_yammer');
        }
        // Set the default yammer network.
        if (empty($this->config->network)) {
            $this->config->network = get_config('yammer', 'defaultnetwork');
        }
    }
}

