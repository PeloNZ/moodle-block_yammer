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
 * Strings for component 'block_yammer'
 *
 * @package   block_yammer
 * @copyright 2014 Catalyst EU
 * @author    Chris Wharton <chris.wharton@catalyst-eu.net>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['yammer'] = 'Yammer';
$string['yammer:addinstance'] = 'Add a new Yammer block';
$string['pluginname'] = 'Yammer';

// Instance settings.
$string['blocktitle'] = 'Block title';
$string['config_help'] = 'You can display My Feed, a Group Feed, a Topic Feed, a User Feed or an OG object feed. Users will need to log in to view the feed.  Additionally, the feed is restricted to users of the network specified.</br>To retrieve the feed ID and network permalink, please navigate to the feed in the <a href="https://www.yammer.com" target="_blank">Yammer web application</a> and copy it from the URL.</br>Detailed documentation for the embedded feed specifcation is available <a href="https://developer.yammer.com/connect/" target="_blank">here</a>.';
$string['defaultgroupid'] = 'Default Group ID';
$string['defaultgroupid_help'] = 'The default group ID to post to.';
$string['usesso'] = 'Use SSO';
$string['usesso_help'] = 'The newest version of Yammer Embed (released April 2014) supports Single Sign-on if your organization has used it on your Yammer Enterprise account.';
$string['usesso_desc'] = 'Enable Single Sign On.';
$string['feedid'] = 'Feed ID';
$string['feedid_help'] = 'The feed ID to display.';
$string['feed_settings'] = 'Feed display settings';
$string['feedtype'] = 'Feed Type';
$string['feedtype_help'] = 'The type of feed to display.This can be <em>my</em>, <em>group</em>, <em>topic</em>, <em>user</em>, or <em>open-graph</em>.';
$string['hideheader'] = 'Hide header';
$string['hideheader_desc'] = 'Hide the network ID header.';
$string['hidefooter'] = 'Hide footer';
$string['hidefooter_desc'] = 'Hide the footer.';
$string['hideogpreview'] = 'Hide OG preview';
$string['hideogpreview_desc'] = 'Hide open graph object preview.';
$string['hideogpreview_help'] = 'Display an Open Graph preview of the target URL beneath the new message publisher, which provides users with a preview of the Open Graph summary they will see in the conversation they are starting.';
$string['network'] = 'Network permalink';
$string['network_help'] = 'This is the name of your Network, e.g. yammer.com/<strong>my-company-name.net</strong>.';
$string['notconfigured'] = 'This block instance has not been configured';
$string['ogurl'] = 'Open Graph URL';
$string['ogurl_help'] = 'If the feed type is <em>open-graph</em>, the feed URL must be specified.';
$string['prompttext'] = 'Prompt Text';
$string['prompttext_help'] = 'You can encourage your users to post more by providing custom publisher watermark text.';
$string['yammer_settings'] = 'Yammer network settings';

// Global settings.
$string['scriptsource'] = 'Script source';
$string['scriptsource_desc'] = 'The location of the Yammer embed script. This should be left as default.';
$string['defaultnetwork'] = 'Default network';
$string['defaultnetwork_desc'] = 'The default Yammer network for this site. This is usually your company email domain, e.g. username@<strong>companyname.com</strong>. All new Yammer block instances will use this by default.';
