<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.sas-communication.fr
 * @since             1.0.0
 * @package           Sas_Table
 *
 * @wordpress-plugin
 * Plugin Name:       SAS Table
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            SAS Communication
 * Author URI:        www.sas-communication.fr
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sas-table
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! defined( 'SAS_TABLE_PLUGIN_DIR_PATH' ) ) {
	define( 'SAS_TABLE_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sas-table-activator.php
 */
function activate_sas_table() {
	require_once SAS_TABLE_PLUGIN_DIR_PATH . 'includes/class-sas-table-activator.php';
	Sas_Table_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sas-table-deactivator.php
 */
function deactivate_sas_table() {
	require_once SAS_TABLE_PLUGIN_DIR_PATH . 'includes/class-sas-table-deactivator.php';
	Sas_Table_Deactivator::deactivate();
}

/**
 * The code that runs during plugin uninstall.
 * This action is documented in includes/class-sas-table-uninstallator.php
 */
function uninstall_sas_table() {
	require_once SAS_TABLE_PLUGIN_DIR_PATH . 'includes/class-sas-table-uninstallator.php';
	Sas_Table_Uninstallator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sas_table' );
register_deactivation_hook( __FILE__, 'deactivate_sas_table' );
register_uninstall_hook( __FILE__, 'uninstall_sas_table' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require SAS_TABLE_PLUGIN_DIR_PATH . 'includes/class-sas-table.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sas_table() {

	$plugin = new Sas_Table();
	$plugin->run();

}
run_sas_table();
