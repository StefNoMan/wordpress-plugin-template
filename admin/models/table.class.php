<?php 

	/**
	* TABLE
	*/
	class Table
	{
		

		public function editTable($id_table)
		{
			global $wpdb;

			$sql = "SELECT t.id, t.date as date, t.midi as midi, t.soir as soir
					FROM `{$wpdb->prefix}sas_table` t
					WHERE t.id_table = {$id_table}
					ORDER BY date";

			$data_table = $wpdb->get_results( $sql );

			$sql = "SELECT id, legende, couleur
					FROM {$wpdb->prefix}sas_legend";

			$data_legend = $wpdb->get_results( $sql );

			$args = array(
				"id_table" => $id_table,
				"data_table" => $data_table,
				"data_legend" => $data_legend
			);

			return $args;
		}


		public function deleteTable($id_table)
		{
			global $wpdb;
			
			$wpdb->delete( $wpdb->prefix . 'sas_table', array( 'id_table' => $id_table) );

			$sql = "SELECT DISTINCT id_table 
					FROM {$wpdb->prefix}sas_table";

			$data_table = $wpdb->get_results( $sql );
			
			$args = array( "tables" => $data_table );

			return $args;
		}



		public function newTable()
		{
			global $wpdb;
			
			if ( isset( $_POST['id_table'] ) ) {

				// var_dump($_POST);

				$i = 0;
				foreach ($_POST as $key => $value) {
					
					if ( $key != 'id_table' ) {
						
						$tab[] = $value;
						
						if ( ( $i % 3 ) == 2 ) {

							if ( $tab[0] != '' && $tab[1] != 'null' && $tab[2] != 'null' ) {
								var_dump( $tab );
								$values = array( 
									'id_table' 	=> $_POST['id_table'], 
									'date' 		=> $tab[0], 
									'midi' 		=> $tab[1], 
									'soir' 		=> $tab[2], 
								);
								$wpdb->insert( $wpdb->prefix . 'sas_table', $values );
							}
							$tab = array();

						}
					}
					$i++;
				}

			}
			else {

				$sql = "SELECT id, legende, couleur
						FROM {$wpdb->prefix}sas_legend";

				$data_legend = $wpdb->get_results( $sql );

				// SELECT max(id_table) FROM wp_sas_table
				$sql = "SELECT max(id_table) as maxId FROM {$wpdb->prefix}sas_table";

				$data_lastId = $wpdb->get_var( $sql );

				$args = array( 
					"legend" => $data_legend,
					"id_table" => $data_lastId + 1
				);
				return $args;
			}

		}


		public function getTablesList()
		{
			global $wpdb;
			
			$sql = "SELECT DISTINCT id_table 
					FROM {$wpdb->prefix}sas_table";

			$data_id_table = $wpdb->get_results( $sql );

			return array( "tables" => $data_id_table );
		}


		public function addRow($id_table)
		{
			global $wpdb;
			
			$param = array(
				'id_table' => $id_table,
				'date' => date('Y-m-d'),
				'midi' => 0,
				'soir' => 0,
			);
			$wpdb->insert( $wpdb->prefix . 'sas_table', $param );

			return $this->editTable($id_table);
		}
	}