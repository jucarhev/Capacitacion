// Funcion mostrar formulario unidad dentro del modal de administrador
function furmulario_unidad(){
	var url="../form/unidad.php";
    $.post(url, function (responseText){
        $("#formulario_adm").html(responseText);
    });
}

// Funcion mostrar formulario usuario dentro del modal de administrador
function formulario_usuario(){
    var url="../form/usuario.php";
    $.post(url, function (responseText){
        $("#formulario_adm").html(responseText);
    });
}