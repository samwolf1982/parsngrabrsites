function rentLive(argument) {
	// body...

	console.log('rent live');
	jQuery('#my-ajax-table').dynatable({
  dataset: {
    ajax: true,
    ajaxUrl: '/rentlive.php',
    ajaxOnLoad: true,
    records: []
  }
});


}

jQuery( document ).ready(function() {
    console.log( "ready!" );
});
