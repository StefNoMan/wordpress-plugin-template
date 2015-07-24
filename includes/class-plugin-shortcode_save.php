<?php

/**
 * Register all actions and filters for the plugin
 *
 * @link       www.sas-communication.fr
 * @since      1.0.0
 *
 * @package    Sas_Table
 * @subpackage Sas_Table/includes
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Sas_Table
 * @subpackage Sas_Table/includes
 * @author     SAS Communication <contact@sas-communication.fr>
 */
class Sas_Table_Shortcode {

	/**
	 * tag of the shortcode
	 */
	protected $shortcodes;

	/**
	 * template file where html rendering is stored
	 */
	protected $template;

	/**
	 * array of args to be passed to template
	 */
	protected $args;

	/**
	 * Initialize and declare the shortcode.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $shortcode, $template ) {

		$this->shortcodes = $shortcode;
		$this->template = $template;

		add_shortcode( $this->shortcodes, array( $this, 'render' ) );
	}


	/**
	 * Callback function called when the shortcode is detected by WordPress
	 * Includes and executes the shortcode template located in public/partials/sas-table-shortcode-{$template}.php
	 */
	public function render($args, $content = null) {

		ob_start();

		extract( $args );
		require plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/shortcodes/sas-table-shortcode-' . $this->template . '.php';

		$html = ob_get_contents();
		ob_end_clean();

		return $html;
	}

}
