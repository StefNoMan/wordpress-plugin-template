<?php 

	/**
	 * A IMPLEMENTER : 
	 * Abstraction de la configuration du plugin par un tableau
	 */

	$plugin = array(

		'admin' => array(

			'css' => false,
			'js' => false,

			'menu' => array( 
				'Main Menu' => array(
					'Sous-menu 1',
					'Sous-menu 2',
					'Sous-menu 3',
				),
			),
		),

		'shortcode' => array(
			'shortcode1',
			'shortcode2',
		),
	);