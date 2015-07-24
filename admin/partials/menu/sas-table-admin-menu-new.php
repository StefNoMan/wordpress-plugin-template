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


<div class="wrap sas-table" id="sas-table-new">

	<h1>Nouveau</h1>

	<form action="<?= site_url(); ?>/wp-admin/admin.php?page=sas-table" method="post" class="form-inline">

		<table class="table-bordered">
			<caption>Tableaux des disponibilités <strong>id</strong> : <?= $id_table ?></caption>
			<thead>
				<tr>
					<th>Date</th>
					<th>Midi</th>
					<th>Soir</th>
				</tr>
			</thead>
			<tbody>

		<?php for ( $i = 0; $i < 42; $i++ ): ?>

				<tr>
					<td>
						<div class="form-group">
							<input type="date" name="cell-<?= $i ?>-date" class="form-control">
						</div>
					</td>
					<td>
						<div class="form-group">
							<select name="cell-<?= $i ?>-midi" class="form-control">
								<option value="null" style="background-color: black" selected >N/A</option>
							<?php foreach ($legend as $key => $value): ?>
								<option style="background-color: <?= $value->couleur ?>" value="<?= $value->id ?>" ><?= $value->legende ?></option>
							<?php endforeach ?>
							</select>
						</div>
					</td>
					<td>
						<div class="form-group">
							<select name="cell-<?= $i ?>-soir" class="form-control">
								<option value="null" style="background-color: black" selected >N/A</option>
							<?php foreach ($legend as $key => $value): ?>
								<option style="background-color: <?= $value->couleur ?>" value="<?= $value->id ?>" ><?= $value->legende ?></option>
							<?php endforeach ?>
							</select>
						</div>
					</td>
				</tr>

		<?php endfor ?>

			</tbody>
		</table>
		<div class="form-group submit-button">
			<input type="hidden" name="action" value="new">
			<input type="hidden" name="id_table" value="<?= $id_table ?>">
			<input type="submit" value="Sauvegarder" class="btn btn-primary">
			<a href="<?= site_url(); ?>/wp-admin/admin.php?page=sas-table" title="Annuler">Annuler</a>
		</div>
	</form>

</div>