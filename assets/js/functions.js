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

function delete_company(id){
	$.ajax({
		url: 'core/admin/admin.class.php',
		type: 'POST',
		data: {id:id, action:'delete'},
		success: function(data){
			if (data == '') {
				console.log("vacio");
				$('#content_ajax').load('core/admin/index.php');
			}
		}
	})
}

function update_company(id){
	
	$.post('core/admin/modal.company.php', {id: id}, function(responseText) {
		console.log(id);
		$("#modal_company").html(responseText);
			$('#update_unity').modal({
			 show: 'true'
		});
	});
	
}

function update_company_data(){
	var company = $('#companynameupd').val();
	var id = $('#idcompany').val();

	$.ajax({
		url: 'core/admin/admin.class.php',
		type: 'POST',
		data: {name:company, id:id, action:'update'},
		success: function(data){
			console.log(data);

			$('#content_ajax').load('core/admin/index.php');
		}
	});
	$('#update_unity').modal('hide');
}