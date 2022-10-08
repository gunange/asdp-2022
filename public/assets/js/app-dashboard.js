$(document).ready(function() {
	$('#DataTable').DataTable({
		"pagingType": "simple"
	});
} );





function injectJsDashboardPrimary(){
	$(".sel-all").select2({
		placeholder: 'Silahkan Pilih',
		width: '100%'
	});
	$(document).ready(function() {
		$('#DataTable').DataTable({
			"pagingType": "simple",
			"retrieve": true,
		});
	} );

}


$(window).on('load', function(e) { // makes sure the whole site is loaded
    $(".loader__figure").fadeOut(); // will first fade out the loading animation
    $(".loader").delay(100).fadeOut("slow"); // will fade out the white DIV that covers the website.
    document.querySelector(".loader").className += " hidden";
})