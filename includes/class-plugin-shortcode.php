<?php 


	/**
	* SHORTCODE
	*/
	abstract class Snw_Shortcode
	{
		
		protected $name;

		/**
		 * Register shortcode with WordPress
		 */
		function __construct()
		{
			add_shortcode( $this->name, array( $this , 'render' ) );
		}

		/**
		 * Method to implement in a child-class for shortcode HTML rendering
		 * @param  array	$atts 		An array containing the shortcode parameters
		 * @param  string	$content 	Content for non self-closing shortcode
		 * @return string 				HTML to be displayed
		 */
		public abstract function render( $atts, $content = null );

	}