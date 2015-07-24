<?php

/**
 * Fired during plugin activation
 *
 * @link       www.sas-communication.fr
 * @since      1.0.0
 *
 * @package    Sas_Table
 * @subpackage Sas_Table/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Sas_Table
 * @subpackage Sas_Table/includes
 * @author     SAS Communication <contact@sas-communication.fr>
 */
class Sas_Table_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		global $wpdb;

		$sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}sas_legend` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `legende` varchar(100) NOT NULL,
				  `couleur` varchar(20) NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;
		";

		$wpdb->query($sql);


		$sql = "INSERT INTO `{$wpdb->prefix}sas_legend` (`id`, `legende`, `couleur`) VALUES
				(1, 'Complet', '#8a2a2e'),
				(2, 'Vite ! Bientôt complet', '#ef7a3c'),
				(3, 'Tables disponibles', '#147068'),
				(4, 'Jour de Fermeture', '#c0c0c0'),
				(5, 'Privatisation sur site', '#3e1f1d'),
				(6, 'Privatisation extérieure', '#f1d092');
		";

		$wpdb->query($sql);

		$sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}sas_table` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `id_table` int(11) NOT NULL,
				  `date` date DEFAULT NULL,
				  `midi` varchar(50) DEFAULT NULL,
				  `soir` varchar(50) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;
		";

		$wpdb->query($sql);
	}

}
