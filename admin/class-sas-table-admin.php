<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.sas-communication.fr
 * @since      1.0.0
 *
 * @package    Sas_Table
 * @subpackage Sas_Table/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sas_Table
 * @subpackage Sas_Table/admin
 * @author     SAS Communication <contact@sas-communication.fr>
 */
class Sas_Table_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action('admin_menu', array( $this, 'declare_menu' ) );

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sas_Table_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sas_Table_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sas-table-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sas_Table_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sas_Table_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sas-table-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the Menu for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function declare_menu() {

		$main_menu = array( 
			'page_title' => 'Tableau des disponibilités', 
			'menu_title' => 'Disponibilités',
			'capability' => 'manage_options', 
			'menu_slug'  => 'sas-table', 
			'function'   => 'sas_table_admin_menu_tables'
		);

		$sub_menus = array(
			'Tableaux'    => array( 
				'parent_slug' => 'sas-table',
				'page_title' => 'Tableaux', 
				'menu_title' => 'Tableaux', 
				'capability' => 'manage_options', 
				'menu_slug' => 'sas-table', 
				'function' => 'sas_table_admin_menu_tables'
			),
			'Préférences'    => array( 
				'parent_slug' => 'sas-table',
				'page_title' => 'Préférences', 
				'menu_title' => 'Préférences', 
				'capability' => 'manage_options', 
				'menu_slug' => 'sas-table-prefs', 
				'function' => 'sas_table_admin_menu_prefs'
			), 
		);

		// https://codex.wordpress.org/Function_Reference/add_menu_page
		add_menu_page( $main_menu['page_title'], $main_menu['menu_title'], $main_menu['capability'], $main_menu['menu_slug'], array( $this, $main_menu['function'] ) );
		
		foreach ($sub_menus as $submenu_title => $submenu_item) {
			// https://codex.wordpress.org/Function_Reference/add_submenu_page
			add_submenu_page($submenu_item['parent_slug'], $submenu_item['page_title'], $submenu_item['menu_title'], $submenu_item['capability'], $submenu_item['menu_slug'], array( $this, $submenu_item['function'] ) );
		}
			
	}



	/**
	 * Callback function called for menu rendering
	 * Includes and executes the shortcode template located in admin/partials/menu/sas-table-shortcode-{$template}.php
	 */
	public function render($template, $args) {

		ob_start();

		extract( $args );
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/menu/sas-table-admin-menu-' . $template . '.php';

		$html = ob_get_contents();
		ob_end_clean();

		return $html;
	}


	/**
	 * Function for main menu rendering
	 */
	public function sas_table_admin_menu_tables() {

		global $wpdb;

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/models/table.class.php';
		$table = new Table();


		if ( isset( $_POST['action'] ) ) {
			
			switch ( $_POST['action'] ) {
				case 'new':
					echo '<div class="updated"><p>Nouveau tableau crée !</p></div>';

					$id_table = $_POST['id_table'];

					$values = $_POST;
					unset( $values['id_table'] );
					unset( $values['action'] );

					for ( $i = 0 ; $i < sizeof( $values ) ; $i++ ) {

						$val[] = current($values);
						next($values);

						if ( $i % 3 == 2 ) {

							if ( $val[0] != '' && $val[1] != 'null' && $val[2] != 'null' ) {
							
								$param = array(
									'id_table' => $id_table,
									'date' => $val[0],
									'midi' => $val[1],
									'soir' => $val[2],
								);
								$wpdb->insert( $wpdb->prefix . 'sas_table', $param );
							}

							$val = array();
						}

					}
					break;

				case 'edit':
					echo '<div class="updated"><p>Tableau mis à jour !</p></div>';

					$id_table = $_POST['id_table'];

					$values = $_POST;
					unset( $values['id_table'] );
					unset( $values['action'] );

					for ( $i = 0 ; $i < sizeof( $values ) ; $i++ ) {

						$val[] = current($values);

						if ( $i % 3 == 2 ) {

							$param = array( 
								'id_table' => $id_table,
								'date' => $val[0],
								'midi' => $val[1],
								'soir' => $val[2],
							);
							$where = array(
								'id' => substr( key( $values ), 10 )
							);
							
							$wpdb->update( $wpdb->prefix . 'sas_table', $param, $where );

							$val = array();
						}

						next($values);
					}
					
					break;

				default:
					die('Paramêtres invalides !');
					break;
			}
		}

		if ( isset( $_GET['action'] ) ) {

			switch ( $_GET['action'] ) {

				case 'edit':

					if ( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) ) {

						$args = $table->editTable( $_GET['id'] );
						echo $this->render( 'edit', $args );
					}
					break;

				case 'delete':
					
					if ( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) ) {

						$args = $table->deleteTable( $_GET['id'] );
						echo $this->render( 'main', $args );
					}
					break;

				case 'new':
					
					$args = $table->newTable();

					echo $this->render( 'new', $args );
					break;
				

				case 'addrow':
					
					$args = $table->addRow( $_GET['id'] );

					echo $this->render( 'edit', $args );
					break;
				
				default:

					die('Paramêtres invalides !');
					break;
			}
		}
		else {

			$args = $table->getTablesList();
			echo $this->render( 'main', $args );
		}

	}


	/**
	 * Function for submenu rendering
	 */
	public function sas_table_admin_menu_prefs() {

		global $wpdb;

		if ( isset( $_POST['action'] ) ) {
			
			switch ( $_POST['action'] ) {

				case 'update':
					$values = $_POST;
					unset( $value['action'] );
					foreach ($values as $key => $value) {
						$val[] = $value;
						if ( sizeof( $val ) == 3 ) {
							$param = array( 
								'legende' => $val[1],
								'couleur' => $val[2],
							);
							$where = array(
								'id' => $val[0]
							);
							
							$wpdb->update( $wpdb->prefix . 'sas_legend', $param, $where );
							$val = array();
						}
					}
					break;

				default:
					break;
			}
		}

		$sql = "SELECT id, legende, couleur
				FROM {$wpdb->prefix}sas_legend";

		$data_legend = $wpdb->get_results( $sql );
		
		$args = array(
			'data_legend' => $data_legend,
		);
		echo $this->render('prefs', $args);
	}


}