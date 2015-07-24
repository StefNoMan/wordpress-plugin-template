<?php 

	/**
	* DAO
	*/
	abstract class DAO
	{
		protected $db;
		
		function __construct($db)
		{
			global $wpdb;
			$this->db = $wpdb;
		}

		public abstract function create();
		public abstract function read();
		public abstract function update();
		public abstract function delete();
	}