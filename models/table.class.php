<?php


	/**
	* Models TABLE
	*/
	class Table extends MySqlDAO
	{
		protected $id;
		protected $content;
		
		function __construct()
		{
			$content = array(
				array( 
					'date' => '2015-07-26',
					'midi' => '2',
					'soir' => '2',
				),
				array( 
					'date' => '2015-07-27',
					'midi' => '4',
					'soir' => '4',
				),
				array( 
					'date' => '2015-07-28',
					'midi' => '3',
					'soir' => '1',
				),
			);
		}


		public function display()
		{
			
		}
	}