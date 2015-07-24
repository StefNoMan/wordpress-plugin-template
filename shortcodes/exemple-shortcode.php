<?php 

	/**
	* A simple "Hello World!" shortcode
	*/
	class Exemple_Shortcode extends Snw_Shortcode
	{
		
		/**
		 * Give the shortcode a name and call his parent's constructor
		 */
		function __construct()
		{
			$this->name = 'exemple';
			parent::__construct();
		}


		/**
		 * Generates HTML for shortcode rendering
		 * @param  array	$atts 		An array containing the shortcode parameters
		 * @param  string	$content 	Content for non self-closing shortcode
		 * @return string 				HTML to be displayed
		 */
		public function render( $atts, $content = null )
		{
			return "<h1>Hello World !</h1>";
		}
	}