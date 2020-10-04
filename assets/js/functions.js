$('#unidades_click').click(function(){
	console.log("hola");
	$('#content_ajax').load('core/admin/index.php');
});




function save_company(){
	var companyname = $('#companyname').val();
	$.ajax({
		url: 'core/admin/admin.class.php',
		type: 'POST',
		data: {name:companyname, action:'create'},
		success: function(data){
			console.log(data);
		}
	})
	.done(function(data) {
		Swal.fire(
			'Good job!',
			data,
			'success'
		)
	})
	.fail(function(data) {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: data,
			footer: '<a href>Why do I have this issue?</a>'
		})
	});	
}