$('#unidades_click').click(function(){
	console.log("hola");
	//$('#content_ajax').html("<p>Hola</p>");
	$('#content_ajax').load('core/admin/index.php');
});