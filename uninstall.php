<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   IPTC_Caption_Mapping
 * @author    32spokes <info@32spokes.com>
 * @license   GPL-2.0+
 * @link      http://32spokes.com
 * @copyright 2014 32spokes
 */

// If uninstall not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}