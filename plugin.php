<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.snowman.fr
 * @since             1.0.0
 * @package           Sas_Table
 *
 * @wordpress-plugin
 * Plugin Name:       Wordpress Plugin Template
 * Description:       A base for fast Wordpress plugin building.
 * Version:           1.0.0
 * Author:            StefNoMan
 * Author URI:        www.snowman.fr
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! defined( 'SNW_PLUGIN_DIR_PATH' ) ) {
	define( 'SNW_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
}


/**
 * Loads the core plugin
 */
require SNW_PLUGIN_DIR_PATH . 'includes/class-plugin.php';

/**
 * Then, let's START !!
 */
$plugin = new Snw_Plugin();