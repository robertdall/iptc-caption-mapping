<?php
/**
 * IPTC Caption Mapping.
 *
 * @package   IPTC_Caption_Mapping
 * @author    32spokes <info@32spokes.com>
 * @license   GPL-2.0+
 * @link      http://32spokes.com
 * @copyright 2014 32spokes
 *
 * @wordpress-plugin
 * Plugin Name:       IPTC Caption Mapping
 * Plugin URI:        http://32spokes.com
 * Description:       A lightweight plugin that auto-populates an image's caption field with its IPTC caption if it's available on upload (default WP behaviour populates the image description and alt field).
 * Version:           1.0.0
 * Author:            32spokes
 * Author URI:        http://32spokes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'class-iptc-caption-mapping.php' );

add_action( 'plugins_loaded', array( 'IPTC_Caption_Mapping', 'get_instance' ) );