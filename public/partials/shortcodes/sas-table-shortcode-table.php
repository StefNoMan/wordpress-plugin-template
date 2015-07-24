<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       www.sas-communication.fr
 * @since      1.0.0
 *
 * @package    Sas_Table
 * @subpackage Sas_Table/public/partials
 */


	global $wpdb;

	// les ids des legendes qui ne permettent plus de réserver (pour afficher ou non le liens "réervez")
	$id_resa_closed = array(1, 4, 5, 6);

	// défini la locale à FR pour afficher les dates en francais
	setlocale (LC_TIME, 'fr_FR.utf8','fra'); 

	/**
	 * Récupération des disponibilité
	 */
	$sql = "SELECT t.date as date, t.midi as midi, t.soir as soir, l1.couleur as couleur_midi, l2.couleur as couleur_soir
			FROM `{$wpdb->prefix}sas_table` t
			LEFT JOIN {$wpdb->prefix}sas_legend l1 ON t.midi = l1.id
			LEFT JOIN {$wpdb->prefix}sas_legend l2 ON t.soir = l2.id
			WHERE t.id_table = {$id}
			ORDER BY date
	";

	$data_table = $wpdb->get_results( $sql );

	if( !$data_table )
		return "";


	/**
	 * Récupération de la légende
	 */
	if ( $legende != "no" ) {
		$sql = "SELECT legende, couleur	FROM {$wpdb->prefix}sas_legend";
		$data_legend = $wpdb->get_results( $sql );
	}

?>

<div class="sas-table-wrapper">

	<div class="sas-table-content">
		<table class="sas-table">
			<thead>
				<tr>
					<th>Lundi</th>
					<th>Mardi</th>
					<th>Mercredi</th>
					<th>Jeudi</th>
					<th>Vendredi</th>
					<th>Samedi</th>
					<th>Dimanche</th>
				</tr>
			</thead>

			<tbody>

			<?php foreach ($data_table as $key => $value): ?>
					
				<?php if ( $key % 7 == 0 ): ?>
				<tr>					
				<?php endif ?>
				
				<?php if ( $value->midi == null && $value->soir == null ): ?>
					<td></td>
				<?php else: ?>
					<td>
						<div class="date"><?= strftime( '%d %B', strtotime( $value->date ) ) ?></div>
						<div class="midi" style="background-color: <?= $value->couleur_midi ?>"></div>
						<div class="soir" style="background-color: <?= $value->couleur_soir ?>"></div>

						<?php if ( ! in_array( $value->midi, $id_resa_closed ) || ! in_array( $value->soir, $id_resa_closed ) ): ?>
							<div class="sas-link">
								<a href="/contact" title="Réservations">Réservez maintenant</a>
							</div>
						<?php endif ?>

					</td>
				<?php endif ?>

				<?php if ( $key % 7 == 6 ): ?>
				</tr>
				<?php endif ?>

			<?php endforeach ?>

			</tbody>
		</table>
	</div>
	
	<?php if ( $legende != "no" ): ?>

	<div class='sas-table-legend'>

		<?php foreach ( $data_legend as $value ): ?>
			<div class="sas-legend">
				<div class="sas-legend-color" style="background-color: <?= $value->couleur ?>"></div>
				<span><?= $value->legende ?></span>
			</div>
		<?php endforeach ?>
		
	</div>

	<?php endif ?>
	<div class="sas-table-clearfix"></div>
</div>