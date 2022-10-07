setForm();

function injectJsWellcomePrimary(){
	$(".sel-all").select2({
		placeholder: 'Silahkan Pilih',
		width: '100%'
	});
	
}


AOS.init({
  delay: 30, // values from 0 to 3000, with step 50ms
  duration: 700, // values from 0 to 3000, with step 50ms
  mirror: false
});