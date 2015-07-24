(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note that this assume you're going to use jQuery, so it prepares
	 * the $ function reference to be used within the scope of this
	 * function.
	 *
	 * From here, you're able to define handlers for when the DOM is
	 * ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * Or when the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and so on.
	 *
	 * Remember that ideally, we should not attach any more than a single DOM-ready or window-load handler
	 * for any particular page. Though other scripts in WordPress core, other plugins, and other themes may
	 * be doing this, we should try to minimize doing that in our own work.
	 */
	var headertext = [];
	var headers = document.querySelectorAll(".sas-table thead");
	var tablebody = document.querySelectorAll(".sas-table tbody");
	for (var i = 0; i < headers.length; i++) {
		headertext[i]=[];
		for (var j = 0, headrow; headrow = headers[i].rows[0].cells[j]; j++) {
			var current = headrow;
			headertext[i].push(current.textContent.replace(/\r?\n|\r/,""));
		}
	}
	for (var h = 0, tbody; tbody = tablebody[h]; h++) {
		for (var i = 0, row; row = tbody.rows[i]; i++) {
		  for (var j = 0, col; col = row.cells[j]; j++) {
		    col.setAttribute("data-th", headertext[h][j]);
		  } 
		}
	}

})( jQuery );
