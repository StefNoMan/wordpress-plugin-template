<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       www.sas-communication.fr
 * @since      1.0.0
 *
 * @package    Sas_Table
 * @subpackage Sas_Table/admin/partials
 */

?>

<div class="wrap sas-table">
	<h1>PRÉFÉRENCES</h1>


	<form action="<?= site_url(); ?>/wp-admin/admin.php?page=sas-table-prefs" method="post" class="form">
	
		<table class="table-bordered">
			<caption>Légendes</caption>
			<thead>
				<tr>
					<th>Légende</th>
					<th>Couleur</th>
				</tr>
			</thead>
			<tbody>

		<?php foreach ($data_legend as $key => $legend): ?>

				<tr>
					<td>
						<input type="hidden" name="id-<?= $key ?>" value="<?= $legend->id ?>">
						<div class="form-group">
							<input type="text" name="legende-<?= $key ?>" value="<?= $legend->legende ?>" class="form-control">
						</div>
					</td>
					<td>
						<div class="form-group">
						<input type="color" name="couleur-<?= $key ?>" value="<?= $legend->couleur ?>" placeholder="<?= $legend->couleur ?>" class="form-control">
						</div>
					</td>
				</tr>

		<?php endforeach ?>

			</tbody>
		</table>
		<div class="form-group submit-button">
			<input type="hidden" name="action" value="update">
			<input type="submit" value="Sauvegarder" class="btn btn-primary">
			<a href="<?= site_url(); ?>/wp-admin/admin.php?page=sas-table" title="Annuler">Annuler</a>
		</div>
	</form>

</div>