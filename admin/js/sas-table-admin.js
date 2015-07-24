(function( $ ) {
	'use strict';

	$(function() {

		/**
		 * Dialog box de confirmation de suppression
		 */
		$(".sas-table .delete-link").on("click", function(e) {
			e.preventDefault();
			if (confirm("Valider ?")) {
				window.location.href = $(this).attr("href");
			}
		});

		/**
		 * Ajout d'un ligne au tableau d'edition
		 */
		// $("#sas-table-edit #add-button").on("click", function(e) {
		// 	e.preventDefault();
		// 	var lastRow = $("#sas-table-edit tbody tr:last-of-type");
		// 	var newRow = lastRow.clone();

		// 	var date = newRow.find("input.date");
		// 	var midi = newRow.find("select.midi");
		// 	var soir = newRow.find("select.soir");
			
		// 	date.attr("value", "");
		// 	midi.find("option:selected").removeAttr("selected");
		// 	midi.find("option:first-of-type").attr("selected", "selected");
		// 	soir.find("option:selected").removeAttr("selected");
		// 	soir.find("option:first-of-type").attr("selected", "selected");

		// 	var newId = date.data("id") + 1;

		// 	date.attr("name", "cell-date-" + newId);
		// 	midi.attr("name", "cell-midi-" + newId);
		// 	soir.attr("name", "cell-soir-" + newId);

		// 	date.attr("data-id", newId);
		// 	midi.attr("data-id", newId);
		// 	soir.attr("data-id", newId);

		// 	$("#sas-table-edit tbody").append(newRow);
		// });

	});


})( jQuery );
