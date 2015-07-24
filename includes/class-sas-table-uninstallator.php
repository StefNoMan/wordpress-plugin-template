<?php

/**
 * Fired during plugin uninstall
 *
 * @link       www.sas-communication.fr
 * @since      1.0.0
 *
 * @package    Sas_Table
 * @subpackage Sas_Table/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Sas_Table
 * @subpackage Sas_Table/includes
 * @author     SAS Communication <contact@sas-communication.fr>
 */
class Sas_Table_Uninstallator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function uninstall() {
		
		// global $wpdb;

		// $sql = "DROP TABLE IF EXISTS {$wpdb->prefix}sas_table";
		// $wpdb->query($sql);

		// $sql = "DROP TABLE IF EXISTS {$wpdb->prefix}sas_legend";
		// $wpdb->query($sql);
	}

}
