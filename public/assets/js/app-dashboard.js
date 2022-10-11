$(document).ready(function () {
	$('#DataTable').DataTable({
		"pagingType": "simple"
	});
});





function injectJsDashboardPrimary() {
	$(".sel-all").select2({
		placeholder: 'Silahkan Pilih',
		width: '100%'
	});
	$(document).ready(function () {
		$('#DataTable').DataTable({
			"pagingType": "simple",
			"retrieve": true,
		});
	});

}

$(".sel-all").select2({
	placeholder: 'Silahkan Pilih',
	width: '100%'
});



$(window).on('load', function (e) { // makes sure the whole site is loaded
	$(".loader__figure").fadeOut(); // will first fade out the loading animation
	$(".loader").delay(100).fadeOut("slow"); // will fade out the white DIV that covers the website.
	document.querySelector(".loader").className += " hidden";
});




function getLiter(id) {
	var tarif = document.getElementById("totaltarifair" + id);
	var debit = document.getElementById("debitair" + id);
	tarif.value = (debit.value * 50);
}

function resetdebitair(id) {
	var tarif = document.getElementById("totaltarifair" + id);
	var debit = document.getElementById("debitair" + id);


	$(".set-default" + id).select2({
		placeholder: 'Silahkan Pilih',
		allowClear: true
	});
	$(".set-default" + id).val('').trigger('change');
	tarif.value = '';
	debit.value = '';


}




