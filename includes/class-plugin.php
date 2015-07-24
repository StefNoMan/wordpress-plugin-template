<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       www.sas-communication.fr
 * @since      1.0.0
 *
 * @package    Sas_Table
 * @subpackage Sas_Table/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Sas_Table
 * @subpackage Sas_Table/includes
 * @author     SAS Communication <contact@sas-communication.fr>
 */
class Snw_Plugin {

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->define_shortcodes();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Sas_Table_Loader. Orchestrates the hooks of the plugin.
	 * - Sas_Table_i18n. Defines internationalization functionality.
	 * - Sas_Table_Admin. Defines all hooks for the admin area.
	 * - Sas_Table_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		// require_once SNW_PLUGIN_DIR_PATH . 'includes/class-plugin-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		// require_once SNW_PLUGIN_DIR_PATH . 'includes/class-plugin-i18n.php';

		/**
		 * Inclusion of all the shortcodes
		 */
		require_once SNW_PLUGIN_DIR_PATH . 'includes/class-plugin-shortcode.php';

		$files = scandir( SNW_PLUGIN_DIR_PATH . 'shortcodes' );

		for ($i=2; $i < sizeof( $files ); $i++) { 
			require_once SNW_PLUGIN_DIR_PATH . 'shortcodes/' . $files[$i];
			$shortcode_name = str_replace( '-shortcode.php', '', $files[$i] );
			$classname = ucfirst( $shortcode_name ) . '_Shortcode';
			new $classname();
		}
		

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		// require_once SNW_PLUGIN_DIR_PATH . 'admin/class-plugin-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		// require_once SNW_PLUGIN_DIR_PATH . 'public/class-plugin-public.php';

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Sas_Table_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		// $plugin_i18n = new Sas_Table_i18n();
		// $plugin_i18n->set_domain( $this->get_plugin_name() );

		// $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		// $plugin_admin = new Sas_Table_Admin( $this->get_plugin_name(), $this->get_version() );

		// $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		// $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		// $plugin_public = new Sas_Table_Public( $this->get_plugin_name(), $this->get_version() );

		// $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		// $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Register all of the shortcodes related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_shortcodes() {

		// $plugin_shortcode = new Sas_Table_Shortcode( 'sas_table', 'table' );

	}


}
