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

<div class="wrap sas-table" id="sas-table-edit">

	<h1>Edition</h1>

	<form action="<?= site_url() ?>/wp-admin/admin.php?page=sas-table" method="post" class="form-inline">

		<table class="table-bordered">
			<caption>Tableaux des disponibilités <strong>id</strong> : <?= $id_table ?></caption>
			<thead>
				<tr>
					<th>Date</th>
					<th>Midi</th>
					<th>Soir</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th colspan="3" style="text-align: right">
						<a href="<?= site_url() ?>/wp-admin/admin.php?page=sas-table&action=addrow&id=<?= $id_table ?>" title="Ajouter une case" class="btn btn-default" id="add-button">Ajouter une case</a>
					</th>
				</tr>
			</tfoot>
			<tbody>

			<?php foreach ( $data_table as $key => $cell ): ?>
		
				<tr>
					<td>
						<div class="form-group">
							<input type="date" name="cell-date-<?= $cell->id ?>" data-id="<?= $cell->id ?>" class="form-control date" value="<?= $cell->date ?>" required>
						</div>
					</td>
					<td>
						<div class="form-group">
							<select name="cell-midi-<?= $cell->id ?>" data-id="<?= $cell->id ?>" class="form-control midi">
								<option value="null" style="background-color: black" >N/A</option>
							<?php foreach ($data_legend as $legend): ?>
								<option 
									style="background-color: <?= $legend->couleur ?>"
									value="<?= $legend->id ?>"
									<?= ( $cell->midi == $legend->id ) ? 'selected' : '' ; ?>
								><?= $legend->legende ?></option>
							<?php endforeach ?>
							</select>
						</div>
					</td>
					<td>
						<div class="form-group">
							<select name="cell-soir-<?= $cell->id ?>" data-id="<?= $cell->id ?>" class="form-control soir">
								<option value="null" style="background-color: black" >N/A</option>
							<?php foreach ($data_legend as $legend): ?>
								<option 
									style="background-color: <?= $legend->couleur ?>" 
									value="<?= $legend->id ?>"
									<?= ( $cell->soir == $legend->id ) ? 'selected' : '' ; ?>
								><?= $legend->legende ?></option>
							<?php endforeach ?>
							</select>
						</div>
					</td>
				</tr>
		
			<?php endforeach ?>

			</tbody>
		</table>
		<div class="form-group submit-button">
			<input type="hidden" name="action" value="edit">
			<input type="hidden" name="id_table" value="<?= $id_table ?>">
			<input type="submit" value="Sauvegarder" class="btn btn-primary">
			<a href="<?= site_url(); ?>/wp-admin/admin.php?page=sas-table" title="Annuler">Annuler</a>
		</div>
	</form>

</div>