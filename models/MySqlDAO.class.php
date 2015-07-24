<?php 

	/**
	* MySQL DAO
	*/
	class MySqlDAO extends DAO
	{

		public function create() {
			global $wpdb;

			$sql = "INSERT INTO {$wpdb->prefix}sas_table
					VALUES ('')
			";
			$this->db->query($sql);
		}

		public function read() {

		}

		public function update(){

		}

		public function delete() {

		}
	}