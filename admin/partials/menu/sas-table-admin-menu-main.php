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
	<h1>TABLEAUX</h1>

	<table class="table-bordered">
		<caption>Tableaux des disponibilités existants</caption>
		<thead>
			<tr>
				<th>Tableau</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>

	<?php foreach ($tables as $key => $table): ?>

			<tr>
				<td>Tableau n° <?= $table->id_table ?></td>
				<td>
					<a href="<?= get_site_url() ?>/wp-admin/admin.php?page=sas-table&action=edit&id=<?= $table->id_table ?>" class="btn btn-default">modifier</a>
					<a href="<?= get_site_url() ?>/wp-admin/admin.php?page=sas-table&action=delete&id=<?= $table->id_table ?>" class="btn btn-danger delete-link">supprimer</a>
				</td>
			</tr>

	<?php endforeach ?>
			
		</tbody>
	</table>

	<div class="submit-button">
		<a href="<?= get_site_url() ?>/wp-admin/admin.php?page=sas-table&action=new" class="btn btn-primary">Créer un nouveau tableau</a>
	</div>

	
</div>