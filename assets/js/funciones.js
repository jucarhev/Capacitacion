function objetoAjax(){
    var xmlhttp=false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }

    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}
// Fin defuncion AJAX ------------------------------------------------------------------------------
function tablaUnidad(limite)
{
    var url="../tabla/unidad.php";
    $.post(url,{limite: limite}, function (responseText){
        $("#cuerpo").html(responseText);
    });
    console.log('tablaUnidad');
}
function tablaUsuario(limite)
{
    var url="../tabla/usuario.php";
    $.post(url,{limite: limite}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function abrirventana(x)
{
    $(".ventana").slideDown('slow');
    if (x == 1) {
        FormUnidad();
    }
    if (x == 2) {
        FormUsuario();
    }   
}
function ventana(x,y){
    $(".ventana1").slideDown('slow');
    if (y == 1) 
    {
        FormUnidadEditar(x);
    }
    if (y == 2) 
    {
        FormUserEditar(x);
    }
    if (y == 3) 
    {
        FormUsuarioDepEdit(x);
    }
    if (y == 4) 
    {
        FormTrabajadorEdit(x);
    }
    if (y == 5) 
    {
        EditarRubro(x);
    }
    if (y == 6) 
    {
        EditarNorma(x);
    }
}
function ventana3(x){
    $(".ventana3").slideDown('slow');
    if (x == 1) {
        Errores();
    }
    if (x == 2) {
        herramientasAdm();
    }
    if (x == 3) {
        ErroresJD();
    }
    if (x == 4) {
        ErroresJc();
    }
    if (x == 5) {
        ventanaCOt();
    }
    if (x == 6) {
        reporte();
    }
}
function reporte(){
    depa=document.getElementById("SesionUsuarioJefeDepa").value;
    unidad=document.getElementById("SesionUsuarioJefeDepaUnidad").value;
    var url="../form/Reporte.php";
    $.post(url,{depa:depa,unidad:unidad}, function (responseText){
        $("#formulario3").html(responseText);
    });
}
function Compilar(){
    unidad=document.getElementById("SesionUsuarioJefeDepaUnidad").value;
    anio=document.getElementById('anioreporte2').value;
    var url="../tabla/prepararReporte.php";
    $.post(url,{anio:anio,unidad:unidad}, function (responseText){
        $("#compilador").html(responseText);
    });
}
function cerrarventana3(){
    $(".ventana3").slideUp('fast');   
}
function verunid(){
    unidad=document.getElementById('idUnidad').value;
    ventana2(unidad,1);
}
function ventana2(x,y){
    $(".ventana2").slideDown('slow');
    if (y == 1) 
    {
        FormUnidadVer(x);
    }
    if (y == 2) 
    {
        FormUsuarioVer(x);
    }
    if (y == 3) 
    {
        FormUsuarioDepVer(x);
    }
    if (y == 4) 
    {
        FormTrabajadorVer(x);
    }
    if (y == 5) 
    {
        ToolsJC();
    }
    if (y == 6) 
    {
        ErroresJC();
    }
}
function FormTrabajadorVer(x){
    var url="../read/trabajador.php";
    $.post(url,{x:x}, function (responseText){
        $("#formulario2").html(responseText);
    });
}
function ToolsJC(x){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    user=document.getElementById('SesionUsuarioJefeDepa').value;
    var url="../util/herramientasJC.php";
    $.post(url,{x:x,unidad:unidad,user:user}, function (responseText){
        $("#formulario2").html(responseText);
    });
}
function cerrarventana(){
    $(".ventana").slideUp('fast');
}
function cerrarventana4(){
    $(".ventana4").slideUp('fast');
}
function cerrarventana1(){
    $(".ventana1").slideUp('fast');
}
function cerrarventana2(){
    $(".ventana2").slideUp('fast');
}
function FormUnidad(){
    var url="../form/unidad.php";
    $.post(url, function (responseText){
        $("#formulario").html(responseText);
    });
}
function FormUnidadVer(x)
{
    var url="../read/unidad.php";
    $.post(url,{x:x}, function (responseText){
        $("#formulario2").html(responseText);
    });
}
function FormUnidadEditar(x){
    var url="../update/unidad.php";
    $.post(url,{x:x}, function (responseText){
        $("#formulario1").html(responseText);
    });
}
function FormUsuario(){
    var url="../form/usuario.php";
    $.post(url, function (responseText){
        $("#formulario").html(responseText);
    });
}
// -+
function GuardarUnidad(){
    res=document.getElementById("mensajeUnidad");
    action="Unidad";

    ud01=document.getElementById("NombreUnidad").value;
    ud02=document.getElementById("CURPUnidad").value;
    ud03=document.getElementById("RFCUnidad").value;
    ud04=document.getElementById("IMSSUnidad").value;
    ud05=document.getElementById("CalleUnidad").value;
    ud06=document.getElementById("ExteriorUnidad").value;
    ud07=document.getElementById("InteriorUnidad").value;
    ud08=document.getElementById("ColoniaUnidad").value;
    ud09=document.getElementById("CPUnidad").value;
    ud10=document.getElementById("LocalidadUnidad").value;
    ud11=document.getElementById("MunicipioUnidad").value;
    ud12=document.getElementById("EstadoUnidad").value;
    ud13=document.getElementById("TelefonoUnidad").value;
    ud14=document.getElementById("EmailUnidad").value;
    ud15=document.getElementById("FaxUnidad").value;
    ud16=document.getElementById("ActividadUnidad").value;

    var datastring = "action="+action+"&ud01="+ud01+"&ud02="+ud02+"&ud03="+ud03+"&ud04="+ud04+"&ud05="+ud05+"&ud06="+ud06+"&ud07="+ud07+"&ud08="+ud08+"&ud09="+ud09+"&ud10="+ud10+"&ud11="+ud11+"&ud12="+ud12+"&ud13="+ud13+"&ud14="+ud14+"&ud15="+ud15+"&ud16="+ud16
    $.ajax({
        url: "../getters/save.php",
        type: 'post',
        datatype: 'json',
        data: datastring,
        success:function(data){
            if (data.success == 'true') {
                alert('ok');
            }
        },
        error:function(data){
            alert('no');
        }
    });
}
function borrardatosunidad(){
    ud01=document.getElementById("NombreUnidad").value="";
    ud02=document.getElementById("CURPUnidad").value="";
    ud03=document.getElementById("RFCUnidad").value="";
    ud04=document.getElementById("IMSSUnidad").value="";
    ud05=document.getElementById("CalleUnidad").value="";
    ud06=document.getElementById("ExteriorUnidad").value="";
    ud07=document.getElementById("InteriorUnidad").value="";
    ud08=document.getElementById("ColoniaUnidad").value="";
    ud09=document.getElementById("CPUnidad").value="";
    ud10=document.getElementById("LocalidadUnidad").value="";
    ud11=document.getElementById("MunicipioUnidad").value="";
    ud12=document.getElementById("EstadoUnidad").value="";
    ud13=document.getElementById("TelefonoUnidad").value="";
    ud14=document.getElementById("EmailUnidad").value="";
    ud15=document.getElementById("FaxUnidad").value="";
    ud16=document.getElementById("ActividadUnidad").value="";
}
function EliminarUnidad(id){
    divResultado = document.getElementById('cargarTablaUnidades'); 
    action="unidad"  
    ajax=objetoAjax();
    var eliminar = confirm("De verdad desea eliminar este dato? :[")
    if ( eliminar ) 
    {
        ajax.open("GET", "../getters/delete.php?id="+id+"&action="+action);

        ajax.onreadystatechange=function() 
        {
            if (ajax.readyState==4) 
            {
                alert(ajax.responseText);
               tablaUnidad(0);
            }
        }
        ajax.send(null)
    }
}
function EditarUnidad(){
    res=document.getElementById("mensajeUnidad");
    action="Unidad";
    id=document.getElementById("id").value;
    ud01=document.getElementById("NombreUnidad").value;
    ud02=document.getElementById("CURPUnidad").value;
    ud03=document.getElementById("RFCUnidad").value;
    ud04=document.getElementById("IMSSUnidad").value;
    ud05=document.getElementById("CalleUnidad").value;
    ud06=document.getElementById("ExteriorUnidad").value;
    ud07=document.getElementById("InteriorUnidad").value;
    ud08=document.getElementById("ColoniaUnidad").value;
    ud09=document.getElementById("CPUnidad").value;
    ud10=document.getElementById("LocalidadUnidad").value;
    ud11=document.getElementById("MunicipioUnidad").value;
    ud12=document.getElementById("EstadoUnidad").value;
    ud13=document.getElementById("TelefonoUnidad").value;
    ud14=document.getElementById("EmailUnidad").value;
    ud15=document.getElementById("FaxUnidad").value;
    ud16=document.getElementById("ActividadUnidad").value;
    logo=document.getElementById('LogoUnidad').value;

    var datastring = "action="+action+"&id="+id+"&ud01="+ud01+"&ud02="+ud02+"&ud03="+ud03+"&ud04="+ud04+"&ud05="+ud05+"&ud06="+ud06+"&ud07="+ud07+"&ud08="+ud08+"&ud09="+ud09+"&ud10="+ud10+"&ud11="+ud11+"&ud12="+ud12+"&ud13="+ud13+"&ud14="+ud14+"&ud15="+ud15+"&ud16="+ud16+"&logo="+logo;
    $.ajax({
        url: "../getters/save.php",
        type: 'post',
        datatype: 'json',
        data: datastring,
        success:function(data){
            alert(data);
            tablaUnidad(0);
        },
        error:function(data){
            alert('no');
        }
    });
}
// -+
function GuardarUsuario(){
    res=document.getElementById("mensajeUnidad");
    action="Usuario";

    NombreUser=document.getElementById("NombreUser").value;
    Nombre=document.getElementById("Nombre").value;
    Pass=document.getElementById("Password").value;
    Unidad=document.getElementById("Unidad").value;

    ajax=objetoAjax();
    ajax.open("POST", "../getters/save.php",true);
    ajax.onreadystatechange=function() 
    {
        if (ajax.readyState==4) 
        {        
            alert(ajax.responseText);
            borrardatosuser();
            tablaUsuario(0);
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&Nombre="+Nombre+"&Pass="+Pass+"&Unidad="+Unidad+"&NombreUser="+NombreUser)
}
function borrardatosuser(){
    NombreUser=document.getElementById("NombreUser").value="";
    Nombre=document.getElementById("Nombre").value="";
    Pass=document.getElementById("Password").value="";
    Unidad=document.getElementById("Unidad").value="";
}
function buscadorP(){
    var buscar=document.getElementById("buscadorUnidad").value;
    var url="../buscar/unidad.php";
    $.post(url,{buscar:buscar}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function FormUserEditar(x){
    var url="../update/usuarios.php";
    $.post(url,{x:x}, function (responseText){
        $("#formulario1").html(responseText);
    });
}
function EditarUsuario()
{
    action="Usuario";
    id=document.getElementById("id").value;
    Nombre=document.getElementById("Nombre").value;
    Usuario=document.getElementById("Usuario").value;
    Pass=document.getElementById("Password").value;
    unidad=document.getElementById("unidad").value;

    var datastring = "action="+action+"&id="+id+"&Nombre="+Nombre+"&Pass="+Pass+"&unidad="+unidad+"&Usuario="+Usuario;
    $.ajax({
        url: "../getters/update.php",
        type: 'post',
        datatype: 'json',
        data: datastring,
        success:function(data){
            alert(data);
            tablaUsuario(0);
        },
        error:function(data){
            alert('no');
        }
    });
}
function ActualizarUserDepa(){
    id=document.getElementById("id").value;
    Departamento=document.getElementById('Departamento').value;
    Nombre=document.getElementById('Nombre').value;
    User=document.getElementById('Usuario').value;
    Pass=document.getElementById('Password').value;
    action="DepaUserJCEdit";

    var datastring = "action="+action+"&id="+id+"&Departamento="+Departamento+"&Nombre="+Nombre+"&User="+User+"&Pass="+Pass;
    $.ajax({
        url: "../getters/update.php",
        type: 'post',
        datatype: 'json',
        data: datastring,
        success:function(data){
            alert(data);
            DepartamentoUser(0);
        },
        error:function(data){
            alert('no');
        }
    });
}
function EliminarUsuario(id){
    divResultado = document.getElementById('cargarTablaUnidades'); 
    action="usuario"  
    ajax=objetoAjax();
    var eliminar = confirm("De verdad desea eliminar este dato? :[")
    if ( eliminar ) 
    {
        ajax.open("GET", "../getters/delete.php?id="+id+"&action="+action);

        ajax.onreadystatechange=function() 
        {
            if (ajax.readyState==4) 
            {
                alert(ajax.responseText);
                tablaUsuario(0);
            }
        }
        ajax.send(null)
    }
}
function buscadorU(){
    var buscar=document.getElementById("buscadorUsuario").value;
    var url="../buscar/usuarios.php";
    $.post(url,{buscar:buscar}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function FormUsuarioVer(x){
    var url="../read/usuario.php";
    $.post(url,{x:x}, function (responseText){
        $("#formulario2").html(responseText);
    });
}
function FormUsuarioDepVer(x){
    var url="../read/DepaUser.php";
    $.post(url,{x:x}, function (responseText){
        $("#formulario2").html(responseText);
    });
}
function FormUsuarioDepEdit(x){
    var url="../update/DepaUser.php";
    $.post(url,{x:x}, function (responseText){
        $("#formulario1").html(responseText);
    });
}
function PaginaPrincipal(){
    var url="principal.php";
    $.post(url, function (responseText){
        $("#cuerpo").html(responseText);
        MAavisos();
    });
}
function kat(){
    alert("Software de Control de Capacitacion.\n Version del copilador: 2.4 Desarrollado por JC");
}
function avisoAdm(){
    aviso=document.getElementById('Aviso').value;
    zona=document.getElementById('avisos');
    action="AdmAviso";
    ajax=objetoAjax();
    ajax.open("POST","../getters/save.php",true);
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4) {
            MAavisos();
            limpiarAvisos();
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&aviso="+aviso)
}
function MAavisos(){
    var url="../msj/avisoadm.php";
    $.post(url, function (responseText){
        $("#avisos").html(responseText);
    });
    galeria();
}
function herramientasAdm() {
    var url="../util/herramientasAdm.php";
    $.post(url, function (responseText){
        $("#formulario3").html(responseText);
    });
}
function Errores(){
    var url="../form/Error.php";
    $.post(url, function (responseText){
        $("#formulario3").html(responseText);
    });
}
function ErroresJD(){
    var url="../form/ErrorJD.php";
    $.post(url, function (responseText){
        $("#formulario3").html(responseText);
    });
}
function GuardarErrorJD(){
    TiEr=document.getElementById('TituloError').value;
    Erro=document.getElementById('Error').value;
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    action="ErrorJD";

    ajax=objetoAjax();    
    ajax.open("POST", "../getters/save.php",true);
    ajax.onreadystatechange=function() 
    {
        if (ajax.readyState==4) 
        {        
            alert( ajax.responseText);
            borrardatoserror();
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&TiEr="+TiEr+"&Erro="+Erro+"&unidad="+unidad)
}
function borrardatoserror(){
    TiEr=document.getElementById('TituloError').value="";
    Erro=document.getElementById('Error').value="";
}
function ErroresJc(){
    var url="../form/ErroresJc.php";
    $.post(url, function (responseText){
        $("#formulario3").html(responseText);
    });
}
function GuardarErroresJc(){
    TiEr=document.getElementById('TituloError').value;
    Erro=document.getElementById('Error').value;
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    action="ErrorJC";

    ajax=objetoAjax();    
    ajax.open("POST", "../getters/save.php",true);
    ajax.onreadystatechange=function() 
    {
        if (ajax.readyState==4) 
        {        
            alert( ajax.responseText);
            borrardatoserror();
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&TiEr="+TiEr+"&Erro="+Erro+"&unidad="+unidad)
}
function kardexjd(){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    busqueda=document.getElementById('buscadorKARDEX').value;
    var url="../buscar/kardexjd.php";
    $.post(url,{unidad:unidad,busqueda: busqueda}, function (responseText){
        $("#kardexjd").html(responseText);
    });
}
function kardexjc2(){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    busqueda=document.getElementById('buscadorKARDEXjc').value;
    var url="../buscar/kardexjc.php";
    $.post(url,{unidad:unidad,busqueda: busqueda}, function (responseText){
        $("#kardexjd").html(responseText);
    });
}
function PaginaPrincipal2(){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    var url="principal.php";
    $.post(url,{unidad:unidad}, function (responseText){
        $("#cuerpo").html(responseText);
    });
    AvisosJCs();
}
function PaginaPrincipal3(){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    var url="principal.php";
    $.post(url,{unidad:unidad}, function (responseText){
        $("#cuerpo").html(responseText);
    });
    AvisosJDs();
}
function DepartamentoUser(limite){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    var url="../tabla/DepartamentoUsuario.php";
    $.post(url,{limite:limite,unidad:unidad}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function abrirventanajc(x){
    $(".ventana").slideDown('slow');
    if (x == 1) {
        depauser();
    } 
    if (x == 2) {
        Frubro();
    }
    if (x == 3) {
        Fnorma();
    }
    if (x == 4) {
        Ftrabajador();
    }
    if (x == 5) {}
}
function Frubro(){
    var url="../form/rubro.php";
    $.post(url, function (responseText){
        $("#formulario").html(responseText);
    });
}
function GuardarRubro(){
    rubro=document.getElementById('rubro').value;
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    action="Rubro";

    ajax=objetoAjax();
    ajax.open("POST","../getters/save.php",true);
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4) {
            alert(ajax.responseText);
            normasrubros(0);        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&rubro="+rubro+"&unidad="+unidad)
}
function borrardatosrubro(){
    rubro=document.getElementById('rubro').value="";
}
function GuardarNorma(){
    Codigon=document.getElementById('Codigon').value;
    Nombren=document.getElementById('Nombren').value;
    rubro=document.getElementById('rubro').value;
    action="Norma";

    ajax=objetoAjax();
    ajax.open("POST","../getters/save.php",true);
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4) {
            alert(ajax.responseText);
            normasrubros(0);
            borrardatosnorma();
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&Codigon="+Codigon+"&Nombren="+Nombren+"&rubro="+rubro)
}
function borrardatosnorma(){
    Codigon=document.getElementById('Codigon').value="";
    Nombren=document.getElementById('Nombren').value="";
}
function Fnorma(){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    var url="../form/norma.php";
    $.post(url,{unidad:unidad}, function (responseText){
        $("#formulario").html(responseText);
    });
}
function Ftrabajador(){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    var url="../form/trabajador.php";
    $.post(url,{unidad:unidad}, function (responseText){
        $("#formulario").html(responseText);
    });
}
function depauser(){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    var url="../form/DepaUser.php";
    $.post(url,{unidad:unidad}, function (responseText){
        $("#formulario").html(responseText);
    });
}
function GuardarUsuarioDepartamento() {
    Departamento=document.getElementById('Departamento').value;
    Nombre=document.getElementById('Nombre').value;
    NombreUser=document.getElementById('NombreUser').value;
    Pass=document.getElementById('Password').value;
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    action="DepaUserJC";
    ajax=objetoAjax();
    ajax.open("POST","../getters/save.php",true);
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4) {
            DepartamentoUser(0);
            alert( ajax.responseText);
            borrardatosdepartamento();
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&Departamento="+Departamento+"&Nombre="+Nombre+"&NombreUser="+NombreUser+"&Pass="+Pass+"&unidad="+unidad)
}
function borrardatosdepartamento(){
    Departamento=document.getElementById('Departamento').value="";
    Nombre=document.getElementById('Nombre').value="";
    NombreUser=document.getElementById('NombreUser').value="";
    Pass=document.getElementById('Password').value="";
}
function kardex(limite){
    unidad=document.getElementById('UnidadSesion').value;
    var url="../tabla/kardex.php";
    $.post(url,{limite:limite,unidad:unidad}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function kardexjc(){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    var url="../tabla/kardexjc.php";
    $.post(url,{unidad:unidad}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function trabajador(limite){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    departamento=document.getElementById('SesionUsuarioJefeDepa').value;
    var url="../tabla/trabajador.php";
    $.post(url,{limite:limite,unidad:unidad,departamento:departamento}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function normasrubros(limite){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    var url="../tabla/RubrosNormas.php";
    $.post(url,{limite:limite,unidad:unidad}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function presupuestado(){
    var url="../tabla/presupuestado.php";
    $.post(url, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function ventanaCOt(){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    departamento=document.getElementById('SesionUsuarioJefeDepartamento').value;
    var url="../form/GeneraFormato.php";
    $.post(url,{unidad:unidad,departamento:departamento}, function (responseText){
        $("#formulario3").html(responseText);
    });
}
function AgregarTrabPres(){
    id=document.getElementById('id').value;
    trabajador=document.getElementById('TrabajadorCurPre').value;
    action="AgregarTrabPres";

    ajax=objetoAjax();
    ajax.open("POST", "../getters/save.php",true);
    ajax.onreadystatechange=function() 
    {
        if (ajax.readyState==4) 
        {        
            alert( ajax.responseText);
            verEmplPres(id);
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&trabajador="+trabajador+"&id="+id)
}
function verEmplPres(id){
    var url="../tabla/EmpleadosPresupuestado.php";
    $.post(url,{id:id}, function (responseText){
        $("#asistpres").html(responseText);
    });
}
function EliminarEmpPre(id){
    idt=document.getElementById('id').value;
    action="EliminarEmpPre"  
    ajax=objetoAjax();
    var eliminar = confirm("De verdad desea eliminar este dato? :[")
    if ( eliminar ) 
    {
        ajax.open("GET", "../getters/delete.php?id="+id+"&action="+action);

        ajax.onreadystatechange=function() 
        {
            if (ajax.readyState==4) 
            {
                alert(ajax.responseText);
                verEmplPres(idt);
            }
        }
        ajax.send(null)
    }
}
function EliminarPL(id){
    Curso=document.getElementById('Curso').value;
    action="EliminarPL"  
    ajax=objetoAjax();
    var eliminar = confirm("De verdad desea eliminar este dato? :[")
    if ( eliminar ) 
    {
        ajax.open("GET", "../getters/delete.php?id="+id+"&action="+action);

        ajax.onreadystatechange=function() 
        {
            if (ajax.readyState==4) 
            {
                alert(ajax.responseText);
                listaasistentes(Curso);
            }
        }
        ajax.send(null)
    }
}
function limpiarTrabajar(){
    dato00=document.getElementById('numerocobro').value="";
    dato01=document.getElementById('numeroficha').value="";
    dato02=document.getElementById('nombre').value="";
    dato03=document.getElementById('apaterno').value="";
    dato04=document.getElementById('amaterno').value="";
    dato05=document.getElementById('curp').value="";
    dato06=document.getElementById('rfc').value="";
    dato07=document.getElementById('sueldo').value="";
    dato08=document.getElementById('departamento').value="";
    dato09=document.getElementById('categoria').value="";
    dato10=document.getElementById('fechanacimiento').value="";
    dato12=document.getElementById('estadocivil').value="";
    dato13=document.getElementById('hijos').value="";
    dato14=document.getElementById('discapacidad').value="";
    dato15=document.getElementById('estado').value="";
    dato16=document.getElementById('municipio').value="";
    dato17=document.getElementById('ocupacion').value="";
    dato18=document.getElementById('estudios').value="";
    dato19=document.getElementById('documentoprobatorio').value="";
    dato20=document.getElementById('aniodocumento').value="";
    dato21=document.getElementById('institucion').value="";
    dato22=document.getElementById('carrera').value="";
    dato23=document.getElementById('imss').value="";
    dato24=document.getElementById('tipotrabajador').value="";
    dato25=document.getElementById('genero').value="";
    dato26=document.getElementById('fechaingreso').value="";
}
function Ntrabajador(){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    dato00=document.getElementById('numerocobro').value;
    dato01=document.getElementById('numeroficha').value;
    dato02=document.getElementById('nombre').value;
    dato03=document.getElementById('apaterno').value;
    dato04=document.getElementById('amaterno').value;
    dato05=document.getElementById('curp').value;
    dato06=document.getElementById('rfc').value;
    dato07=document.getElementById('sueldo').value;
    dato08=document.getElementById('departamento').value;
    dato09=document.getElementById('categoria').value;
    dato10=document.getElementById('fechanacimiento').value;
    dato11="Si";
    dato12=document.getElementById('estadocivil').value;
    dato13=document.getElementById('hijos').value;
    dato14=document.getElementById('discapacidad').value;
    dato15=document.getElementById('estado').value;
    dato16=document.getElementById('municipio').value;
    dato17=document.getElementById('ocupacion').value;
    dato18=document.getElementById('estudios').value;
    dato19=document.getElementById('documentoprobatorio').value;
    dato20=document.getElementById('aniodocumento').value;
    dato21=document.getElementById('institucion').value;
    dato22=document.getElementById('carrera').value;
    dato23=document.getElementById('imss').value;
    dato24=document.getElementById('tipotrabajador').value;
    dato25=document.getElementById('genero').value;
    dato26=document.getElementById('fechaingreso').value;
    action="Trabajador";

    ajax=objetoAjax();
    ajax.open("POST","../getters/save.php",true);
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4) {
            alert(ajax.responseText);
            limpiarTrabajar();
            trabajador(0);
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&unidad="+unidad+"&dato00="+dato00+"&dato01="+dato01+"&dato02="+dato02+"&dato03="+dato03+"&dato04="+dato04+"&dato05="+dato05+"&dato06="+dato06+"&dato07="+dato07+"&dato08="+dato08+"&dato09="+dato09+"&dato10="+dato10+"&dato11="+dato11+"&dato12="+dato12+"&dato13="+dato13+"&dato14="+dato14+"&dato15="+dato15+"&dato16="+dato16+"&dato17="+dato17+"&dato18="+dato18+"&dato19="+dato19+"&dato20="+dato20+"&dato21="+dato21+"&dato22="+dato22+"&dato23="+dato23+"&dato24="+dato24+"&dato25="+dato25+"&dato26="+dato26)
}
/**/
function jdnormasrubros(limite){
    unidad=document.getElementById('UnidadSesion').value;
    var url="../tabla/ConsultaNormasRubros.php";
    $.post(url,{limite:limite,unidad:unidad}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function jdtrabajador(limite){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    departamento=document.getElementById('SesionUsuarioJefeDepartamento').value;
    var url="../tabla/ConsultaTrabajador.php";
    $.post(url,{limite:limite,unidad:unidad,departamento:departamento}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function ventana4(x){
    $(".ventana4").slideDown('slow');
    FCotizacion(x);
}
function FCotizacion(x){
    var url="../form/Cotizaciones.php";
    $.post(url,{x:x}, function (responseText){
        $("#formulario4").html(responseText);
    });
}
function ActualizarCotizacion(){
    id=document.getElementById('id').value;
    nombre=document.getElementById('nombre').value;
    imparte=document.getElementById('imparte').value;
    lugar=document.getElementById('lugar').value;
    Duracion=document.getElementById('duracion').value;
    objetivos=document.getElementById('objetivos').value;
    numpersonas=document.getElementById('numpersonas').value;
    costocurso=document.getElementById('costocurso').value;
    transporte=document.getElementById('transporte').value;
    alimentacion=document.getElementById('alimentacion').value;
    hospedaje=document.getElementById('hospedaje').value;
    otros=document.getElementById('otros').value;
    invpersona=document.getElementById('invpersona').value;
    invtotal=document.getElementById('invtotal').value;
    anio=document.getElementById('anio').value;
    action="ActualizarCotizacion";

    ajax=objetoAjax();
    
    ajax.open("POST", "../getters/update.php",true);
    ajax.onreadystatechange=function() 
    {
        if (ajax.readyState==4) 
        {        
            alert( ajax.responseText);
            document.getElementById('formpres').style.display="none";
            document.getElementById('formpersasist').style.display="block";
            Cotizaciones();
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&anio="+anio+"&lugar="+lugar+"&id="+id+"&nombre="+nombre+"&imparte="+imparte+"&objetivos="+objetivos+"&Duracion="+Duracion+"&numpersonas="+numpersonas+"&costocurso="+costocurso+"&transporte="+transporte+"&alimentacion="+alimentacion+"&hospedaje="+hospedaje+"&otros="+otros+"&invpersona="+invpersona+"&invtotal="+invtotal)
}
function EliminarCursoPres(id){
    action="EliminarCursoPres"  
    ajax=objetoAjax();
    var eliminar = confirm("De verdad desea eliminar este dato? :[")
    if ( eliminar ) 
    {
        ajax.open("GET", "../getters/delete.php?id="+id+"&action="+action);

        ajax.onreadystatechange=function() 
        {
            if (ajax.readyState==4) 
            {
                alert(ajax.responseText);
                Cotizaciones();
            }
        }
        ajax.send(null)
    }
}
function CursosPreoK(){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    depa=document.getElementById('DepartamentoSesion').value;
    anio=document.getElementById('AnioSistemaJD').value;
    var url="../tabla/CotizacionOk.php";
    $.post(url,{unidad:unidad,depa:depa,anio:anio}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function VerCursoP(id){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    depa=document.getElementById('DepartamentoSesion').value;
    var url="../read/VerCotizaciones.php";
    $.post(url,{id:id,unidad:unidad,depa:depa}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function VerCursoP2(id){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    depa=document.getElementById('depacp').value;
    var url="../read/VerCotizaciones.php";
    $.post(url,{id:id,unidad:unidad,depa:depa}, function (responseText){
        $("#CCP").html(responseText);
    });
}
function ventanajd(x){
$(".ventana").slideDown('slow');
    if (x == 1) {
        FormularioCurso();
    } 
    if (x == 2) {
        Frubro();
    }
    if (x == 3) {
        Fnorma();
    }
    if (x == 4) {
        Ftrabajador();
    } 
    if (x==5) {
        FDNC();
    }
    if (x==6) {
        FListas();
    }
}
function ventanajd2(x){
$(".ventana2").slideDown('slow');
    if (x == 1) {
        HerramientasJD();
    } 
    if (x == 2) {
        HerramientasJD();
    }
    if (x == 4) {
        Plananualjd();
    }
    if (x == 5) {
        GraficasJD();
    }
    if (x == 6) {
        ConsultaCursosJD();
    }
}
function ConsultaCursosJD(){
    depa=document.getElementById("DepartamentoSesion").value;
    unidad=document.getElementById("UnidadSesion").value;
    anio=document.getElementById('AnioSistemaJD').value;
    var url="../form/ConsultaCursosJD.php";
    $.post(url,{depa:depa,unidad:unidad,anio:anio}, function (responseText){
        $("#formulario2").html(responseText);
    });
}
function GraficasJD(){
    depa=document.getElementById("DepartamentoSesion").value;
    unidad=document.getElementById("UnidadSesion").value;
    var url="../form/GraficasJD.php";
    $.post(url,{depa:depa,unidad:unidad}, function (responseText){
        $("#formulario2").html(responseText);
    });
}
function Plananualjd(){
    depa=document.getElementById("DepartamentoSesion").value;
    unidad=document.getElementById("UnidadSesion").value;
    var url="../form/plandepartamental.php";
    $.post(url,{depa:depa,unidad:unidad}, function (responseText){
        $("#formulario2").html(responseText);
    });
}
function Cotizaciones(){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    departamento=document.getElementById('SesionUsuarioJefeDepartamento').value;
    anio=document.getElementById('AnioSistemaJD').value;
    var url="../tabla/Cotizacion.php";
    $.post(url,{unidad:unidad,departamento:departamento,anio:anio}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function FormularioCurso(){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    depa=document.getElementById('DepartamentoSesion').value;
    var url="../form/Curso.php";
    $.post(url,{unidad:unidad}, function (responseText){
        $("#formulario").html(responseText);
    });
}
function cursosjd(limite){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    depa=document.getElementById('DepartamentoSesion').value;
    anio=document.getElementById('AnioSistemaJD').value;
    var url="../tabla/jdcurso.php";
    $.post(url,{limite:limite,unidad:unidad,depa:depa,anio:anio}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function Solo_Numerico(variable){
        Numer=parseInt(variable);
        if (isNaN(Numer)){
            return "";
        }
        return Numer;
}
function ValNumero(Control){
    Control.value=Solo_Numerico(Control.value);       
}
function guardarCursoJD(){
    anioCurso01=document.getElementById('anioCurso01').value;
    lugarcurso02=document.getElementById('lugarcurso02').value;
    rubrocurso03=document.getElementById('rubrocurso03').value;
    instructor04=document.getElementById('instructor04').value;
    ncurso05=document.getElementById('ncurso05').value;
    objetivos06=document.getElementById('objetivos06').value;
    planeado09="planeado";
    status10=document.getElementById('status10').value;


    EneroHrs=document.getElementById('EneroHrs').value;
    EneroMin=document.getElementById('EneroMin').value;
    FebreroHrs=document.getElementById('FebreroHrs').value;
    FebreroMin=document.getElementById('FebreroMin').value;
    MarzoHrs=document.getElementById('MarzoHrs').value;
    MarzoMin=document.getElementById('MarzoMin').value;
    AbrilHrs=document.getElementById('AbrilHrs').value;
    AbrilMin=document.getElementById('AbrilMin').value;
    MayoHrs=document.getElementById('MayoHrs').value;
    MayoMin=document.getElementById('MayoMin').value;
    JunioHrs=document.getElementById('JunioHrs').value;
    JunioMin=document.getElementById('JunioMin').value;
    JulioHrs=document.getElementById('JulioHrs').value;
    JulioMin=document.getElementById('JulioMin').value;
    AgostoHrs=document.getElementById('AgostoHrs').value;
    AgostoMin=document.getElementById('AgostoMin').value;
    SeptiembreHrs=document.getElementById('SeptiembreHrs').value;
    SeptiembreMin=document.getElementById('SeptiembreMin').value;
    OctubreHrs=document.getElementById('OctubreHrs').value;
    OctubreMin=document.getElementById('OctubreMin').value;
    NoviembreHrs=document.getElementById('NoviembreHrs').value;
    NoviembreMin=document.getElementById('NoviembreMin').value;
    DiciembreHrs=document.getElementById('DiciembreHrs').value;
    DiciembreMin=document.getElementById('DiciembreMin').value;

    unidadR=document.getElementById('UnidadSesion').value;
    departR=document.getElementById('DepartamentoSesion').value;
    action="CursoNuevo";

    ajax=objetoAjax();
    
    ajax.open("POST", "../getters/save.php",true);
    ajax.onreadystatechange=function() 
    {
        if (ajax.readyState==4) 
        {        
            alert( ajax.responseText);
            cursosjd(0);
            borrardatoscurso();
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("&anioCurso01="+anioCurso01+"&action="+action+"&lugarcurso02="+lugarcurso02+"&rubrocurso03="+rubrocurso03+"&instructor04="+instructor04+"&ncurso05="+ncurso05+"&objetivos06="+objetivos06+"&departR="+departR+"&unidadR="+unidadR+"&planeado09="+planeado09+"&status10="+status10+"&EneroHrs="+EneroHrs+"&EneroMin="+EneroMin+"&FebreroHrs="+FebreroHrs+"&FebreroMin="+FebreroMin+"&MarzoHrs="+MarzoHrs+"&MarzoMin="+MarzoMin+"&AbrilHrs="+AbrilHrs+"&AbrilMin="+AbrilMin+"&MayoHrs="+MayoHrs+"&MayoMin="+MayoMin+"&JunioHrs="+JunioHrs+"&JunioMin="+JunioMin+"&JulioHrs="+JulioHrs+"&JulioMin="+JulioMin+"&AgostoHrs="+AgostoHrs+"&AgostoMin="+AgostoMin+"&SeptiembreHrs="+SeptiembreHrs+"&SeptiembreMin="+SeptiembreMin+"&OctubreHrs="+OctubreHrs+"&OctubreMin="+OctubreMin+"&NoviembreHrs="+NoviembreHrs+"&NoviembreMin="+NoviembreMin+"&DiciembreHrs="+DiciembreHrs+"&DiciembreMin="+DiciembreMin)
}
function borrardatoscurso() {
    lugarcurso02=document.getElementById('lugarcurso02').value="";
    rubrocurso03=document.getElementById('rubrocurso03').value="";
    instructor04=document.getElementById('instructor04').value="";
    ncurso05=document.getElementById('ncurso05').value="";
    objetivos06=document.getElementById('objetivos06').value="";
    EneroHrs=document.getElementById('EneroHrs').value="";
    EneroMin=document.getElementById('EneroMin').value="";
    FebreroHrs=document.getElementById('FebreroHrs').value="";
    FebreroMin=document.getElementById('FebreroMin').value="";
    MarzoHrs=document.getElementById('MarzoHrs').value="";
    MarzoMin=document.getElementById('MarzoMin').value="";
    AbrilHrs=document.getElementById('AbrilHrs').value="";
    AbrilMin=document.getElementById('AbrilMin').value="";
    MayoHrs=document.getElementById('MayoHrs').value="";
    MayoMin=document.getElementById('MayoMin').value="";
    JunioHrs=document.getElementById('JunioHrs').value="";
    JunioMin=document.getElementById('JunioMin').value="";
    JulioHrs=document.getElementById('JulioHrs').value="";
    JulioMin=document.getElementById('JulioMin').value="";
    AgostoHrs=document.getElementById('AgostoHrs').value="";
    AgostoMin=document.getElementById('AgostoMin').value="";
    SeptiembreHrs=document.getElementById('SeptiembreHrs').value="";
    SeptiembreMin=document.getElementById('SeptiembreMin').value="";
    OctubreHrs=document.getElementById('OctubreHrs').value="";
    OctubreMin=document.getElementById('OctubreMin').value="";
    NoviembreHrs=document.getElementById('NoviembreHrs').value="";
    NoviembreMin=document.getElementById('NoviembreMin').value="";
    DiciembreHrs=document.getElementById('DiciembreHrs').value="";
    DiciembreMin=document.getElementById('DiciembreMin').value="";
}
function DNCJD(limite){
    unidad=document.getElementById('UnidadSesion').value;
    departR=document.getElementById('DepartamentoSesion').value;
    anio=document.getElementById('AnioSistemaJD').value;
    var url="../tabla/DNC.php";
    $.post(url,{limite:limite,unidad:unidad,departR:departR,anio:anio}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function DNCArchivados(){
    unidad=document.getElementById('UnidadSesion').value;
    departR=document.getElementById('DepartamentoSesion').value;
    anio=document.getElementById('AnioSistemaJD').value;
    var url="../tabla/DNCTerminado.php";
    $.post(url,{unidad:unidad,departR:departR,anio:anio}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function EliminarDNC(){
    unidad=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('DepartamentoSesion').value;
    anio=document.getElementById('AnioSistemaJD').value;
    curso=document.getElementById('cursoDnc').value;
    alert(curso+" "+anio+" "+depa+" "+unidad);
}
function FDNC(){
    unidad=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('DepartamentoSesion').value;
    var url="../form/DNC.php";
    $.post(url,{unidad:unidad,depa:depa}, function (responseText){
        $("#formulario").html(responseText);
    });
}
function meses(){
    id=document.getElementById('CapacitacionDNC').value;
    var url="../combos/meses.php";
    $.post(url,{id:id}, function (responseText){
        $("#Mesesdnc").html(responseText);
    });
}
function listas(limite){
    unidad=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('DepartamentoSesion').value;
    anio=document.getElementById('AnioSistemaJD').value;
    var url="../tabla/Listas.php";
    $.post(url,{limite:limite,unidad:unidad,depa:depa,anio:anio}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function ListasOk(limite){
    console.log("listasOk");
    unidad=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('DepartamentoSesion').value;
    anio=document.getElementById('AnioSistemaJD').value;
    var url="../tabla/ListasOk.php";
    $.post(url,{limite:limite,unidad:unidad,depa:depa,anio:anio}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function EliminarCurso(id){
    divResultado = document.getElementById('cargarTablaUnidades'); 
    action="Curso"  
    ajax=objetoAjax();
    var eliminar = confirm("De verdad desea eliminar este dato? :[")
    if ( eliminar ) 
    {
        ajax.open("GET", "../getters/delete.php?id="+id+"&action="+action);

        ajax.onreadystatechange=function() 
        {
            if (ajax.readyState==4) 
            {
                alert(ajax.responseText);
                cursosjd(0);
            }
        }
        ajax.send(null)
    }
}
function guardarDNC(){
    a01=document.getElementById('UnidadSesion').value;
    a02=document.getElementById('DepartamentoSesion').value;
    a03=document.getElementById('CapacitacionDNC').value;
    a04=document.getElementById('Mesesdnc').value;
    a05=document.getElementById('Trabajadores').value;
    a06=document.getElementById('CalActDNC').value;
    a07=document.getElementById('CalPlaDNC').value;
    a08=document.getElementById('anioDNC').value; 
    action="DNC";

    ajax=objetoAjax();
    
    ajax.open("POST", "../getters/save.php",true);
    ajax.onreadystatechange=function() 
    {
        if (ajax.readyState==4) 
        {        
            alert( ajax.responseText);
            DNCJD(0);
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&a01="+a01+"&a02="+a02+"&a03="+a03+"&a04="+a04+"&a05="+a05+"&a06="+a06+"&a07="+a07+"&a08="+a08)
}
function FListas(){
    unidad=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('DepartamentoSesion').value;
    var url="../form/Listas.php";
    $.post(url,{unidad:unidad,depa:depa}, function (responseText){
        $("#formulario").html(responseText);
    });
}
function calcularHoras(){
    HI=document.getElementById('HoraInicio').value;
    MI=document.getElementById('MinutoInicio').value;
    HF=document.getElementById('HoraFin').value;
    MF=document.getElementById('MinutoFin').value;
    if (HI <= HF){
        Horas=HF-HI;
        if (MI<MF) {
            Minutos=MF-MI;
            document.getElementById('Duracion').value=Horas+":"+Minutos;
        }
        if (MI > MF) {
            if (Horas != 0) {
                Horas=Horas-1;
                var MiFi=parseInt(MF);
                MiFi=MiFi+60;
                Minutos=MiFi-MI;
                document.getElementById('Duracion').value=Horas+": "+Minutos;
            }
            else{
                alert("Error en sus minutos y horas");
                document.getElementById('Duracion').value="";
            }
        }else{
            Minutos=MF-MI;
            document.getElementById('Duracion').value=Horas+":"+Minutos;
        }
    }
    else
    {
        alert("No puede iniciar antes de empezar");
        document.getElementById('Duracion').value="";
    }
}
function ComboCurso(){
    c=document.getElementById('ComboCursoCambio').value;
    if (c == "Planeada") {
        unidad=document.getElementById('UnidadSesion').value;
        depa=document.getElementById('DepartamentoSesion').value;
        var url="../combos/Cursos.php";
        $.post(url,{unidad:unidad,depa:depa}, function (responseText){
            $("#ComboCurso").html(responseText);
        });
    }
    if (c == "No planeada") {
        unidad=document.getElementById('UnidadSesion').value;
        depa=document.getElementById('DepartamentoSesion').value;
        var url="../util/text.php";
        $.post(url,{unidad:unidad,depa:depa}, function (responseText){
            $("#ComboCurso").html(responseText);
        });
    }
}
function Guardarlistas(){
    unidad=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('DepartamentoSesion').value;
    HoraInicio=document.getElementById('HoraInicio').value;
    MinutoInicio=document.getElementById('MinutoInicio').value;
    HoraFin=document.getElementById('HoraFin').value;
    MinutoFin=document.getElementById('MinutoFin').value;
    Duracion=document.getElementById('Duracion').value;
    FechaInicioLista=document.getElementById('FechaInicioLista').value;
    FechaFinLista=document.getElementById('FechaFinLista').value;
    instructor=document.getElementById('instructor').value;
    MesLista=document.getElementById('MesLista').value;
    statusLista=document.getElementById('statusLista').value;
    CursoLista=document.getElementById('CursoLista').value;
    lugar=document.getElementById('lugarCurso').value;
    plan=document.getElementById('ComboCursoCambio').value;
    action="Listas";

    ajax=objetoAjax();
    
    ajax.open("POST", "../getters/save.php",true);
    ajax.onreadystatechange=function() 
    {
        if (ajax.readyState==4) 
        {        
            alert( ajax.responseText);
            ListasAsistencia(CursoLista,FechaInicioLista);
            listas(0);
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&plan="+plan+"&CursoLista="+CursoLista+"&unidad="+unidad+"&depa="+depa+"&lugar="+lugar+"&HoraInicio="+HoraInicio+"&MinutoInicio="+MinutoInicio+"&HoraFin="+HoraFin+"&MinutoFin="+MinutoFin+"&Duracion="+Duracion+"&FechaInicioLista="+FechaInicioLista+"&FechaFinLista="+FechaFinLista+"&instructor="+instructor+"&MesLista="+MesLista+"&statusLista="+statusLista)
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function ListasAsistencia(curso,FechaInicioLista){
    unidad=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('DepartamentoSesion').value;
    var url="../form/PasedeLista.php";
    $.post(url, {unidad:unidad,depa:depa,curso:curso,FechaInicioLista:FechaInicioLista},function (responseText){
        $("#formulario").html(responseText);
    });
}
function HerramientasJD(){
    unidad=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('DepartamentoSesion').value;
    user=document.getElementById('SesionUsuarioJefeDepa').value;
    var url="../util/herramientasJD.php";
        $.post(url,{unidad:unidad,depa:depa,user:user}, function (responseText){
            $("#formulario2").html(responseText);
        });
}
function EliminarDNC(){
    unid=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('DepartamentoSesion').value;
    cursoDnc=document.getElementById('cursoDnc').value;
    action="DelDNC";
    ajax=objetoAjax();
    var eliminar = confirm("De verdad desea eliminar este dato? :[")
    if ( eliminar ) 
    {
        ajax.open("GET", "../getters/delete.php?cursoDnc="+cursoDnc+"&action="+action+"&unid="+unid+"&depa="+depa);

        ajax.onreadystatechange=function() 
        {
            if (ajax.readyState==4) 
            {
                alert(ajax.responseText);
                DNCJD(0);
            }
        }
        ajax.send(null)
    }
}
function DardealtaDNC(){
    unid=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('DepartamentoSesion').value;
    cursoDnc=document.getElementById('cursoDnc').value;

    action="DNC";

    ajax=objetoAjax();
    
    ajax.open("POST", "../getters/update.php",true);
    ajax.onreadystatechange=function() 
    {
        if (ajax.readyState==4) 
        {        
            alert( ajax.responseText);
            DNCJD(0);
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&unid="+unid+"&cursoDnc="+cursoDnc+"&depa="+depa)
}
function Pasedelista(){
    pasarlista=document.getElementById('pasarlista').value;
    Curso=document.getElementById('Curso').value;
    unidad=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('DepartamentoSesion').value;
    action="PaseLista";

    ajax=objetoAjax();
    
    ajax.open("POST", "../getters/save.php",true);
    ajax.onreadystatechange=function() 
    {
        if (ajax.readyState==4) 
        {        
            alert( ajax.responseText);
            listaasistentes(Curso);
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&Curso="+Curso+"&pasarlista="+pasarlista+"&unidad="+unidad+"&depa="+depa)
}
function listaasistentes(curso){
    unidad=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('DepartamentoSesion').value;
    var url="../util/pasedelista.php";
    $.post(url,{unidad:unidad,depa:depa,curso:curso}, function (responseText){
        $("#paselista").html(responseText);
    });
}
function EliminarLista(id){
    action="DelLista";
    ajax=objetoAjax();
    var eliminar = confirm("De verdad desea eliminar este dato? :[")
    if ( eliminar ) 
    {
        ajax.open("GET", "../getters/delete.php?id="+id+"&action="+action);
        ajax.onreadystatechange=function() 
        {
            if (ajax.readyState==4) 
            {
                alert(ajax.responseText);
                listas(0);
            }
        }
        ajax.send(null)
    }
}
function OkListas(id){
    action="Listas";
    ajax=objetoAjax();
    
    ajax.open("POST", "../getters/update.php",true);
    ajax.onreadystatechange=function() 
    {
        if (ajax.readyState==4) 
        {        
            alert( ajax.responseText);
            listas(0);
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&id="+id)
}
function VerListas(id){
    var url="../read/VerListaI.php";
    $.post(url, {id:id},function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function buscadorListas(){
    anio=document.getElementById('AnioSistemaJD').value;
    buscar=document.getElementById('buscarLista').value;
    unidad=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('DepartamentoSesion').value;
    var url="../buscar/Listas.php";
    $.post(url, {buscar:buscar,unidad:unidad,depa:depa,anio:anio},function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function buscadorListasT()
{
    buscar=document.getElementById('buscarListaT').value;
    anio=document.getElementById('AnioSistemaJD').value;
    unidad=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('DepartamentoSesion').value;
    var url="../buscar/ListasOk.php";
    $.post(url, {buscar:buscar,unidad:unidad,depa:depa,anio:anio},function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function vaciarAvisos(){
    action="vaciarAvisos";
    ajax=objetoAjax();
    var eliminar = confirm("¿De verdad desea vaciar los avisos?")
    if ( eliminar ) 
    {
        ajax.open("GET", "../getters/delete.php?action="+action);
        ajax.onreadystatechange=function() 
        {
            if (ajax.readyState==4) 
            {
                alert(ajax.responseText);
                MAavisos();
            }
        }
        ajax.send(null)
    }
}
function CargarImagen(){
    var url="../util/imagemAdm.php";
        $.post(url, function (responseText){
        $("#ImagenLogo").html(responseText);
    });
}
function vaciarErrores(){
    action="vaciarErrores";
    ajax=objetoAjax();
    var eliminar = confirm("¿De verdad desea vaciar los Errores?")
    if ( eliminar ) 
    {
        ajax.open("GET", "../getters/delete.php?action="+action);
        ajax.onreadystatechange=function() 
        {
            if (ajax.readyState==4) 
            {
                alert(ajax.responseText);
            }
        }
        ajax.send(null)
    }
}
function GuardarError () {
    TiEr=document.getElementById('TituloError').value;
    Erro=document.getElementById('Error').value;
    action="ErrorAdm";

    ajax=objetoAjax();    
    ajax.open("POST", "../getters/save.php",true);
    ajax.onreadystatechange=function() 
    {
        if (ajax.readyState==4) 
        {        
            alert( ajax.responseText);
            listaasistentes(Curso);
            borrardatoserror();;
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&TiEr="+TiEr+"&Erro="+Erro)
}
function cambiarpas(){
    conant=document.getElementById('conant').value;
    conact=document.getElementById('conact').value;
    repact=document.getElementById('repact').value;
    if (conact == repact) {
        action="CambiarPassAdm";

        ajax=objetoAjax();    
        ajax.open("POST", "../getters/update.php",true);
        ajax.onreadystatechange=function() 
        {
            if (ajax.readyState==4) 
            {        
                alert( ajax.responseText);
            }
        }
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("action="+action+"&conant="+conant+"&conact="+conact)
    }
    if (conact != repact) {
        alert("La nueva contraseña no coincide. Intentelo de nuevo");
        conact=document.getElementById('conact').value="";
        repact=document.getElementById('repact').value="";
    }
}
function logosistema(){
    logo=document.getElementById('logotipo').value;
    action="CambiarImagen";
    if (logo != "") {
         ajax=objetoAjax();    
        ajax.open("POST", "../getters/update.php",true);
        ajax.onreadystatechange=function() 
        {
            if (ajax.readyState==4) 
            {        
                alert( ajax.responseText);
                CargarImagen();
            }
        }
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("action="+action+"&logo="+logo)
    }else{
        alert("No hay datos");
    }
}
function galeria(){
    var url="../fotos/galeria.php";
    $.post(url, function (responseText){
        $("#galeria").html(responseText);
    });
}
function EliminarImagen(id){
    action="EliminarImagen";
    ajax=objetoAjax();
    var eliminar = confirm("De verdad desea eliminar este dato? :[")
    if ( eliminar ) 
    {
        ajax.open("GET", "../getters/delete.php?id="+id+"&action="+action);
        ajax.onreadystatechange=function() 
        {
            if (ajax.readyState==4) 
            {
                alert(ajax.responseText);
                galeria();
            }
        }
        ajax.send(null)
    }
}
function CargarImagenJC(){
    unid=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    var url="../util/imagenjc.php";
        $.post(url,{unid:unid}, function (responseText){
        $("#ImagenLogo").html(responseText);
    });
}
function AvisosJCs(){
    Usuario=document.getElementById('SesionUsuarioJefeDepa').value;
    var url="../msj/avisojc.php";
    $.post(url,{Usuario:Usuario}, function (responseText){
        $("#avisos").html(responseText);
    });
}
function AvisosJDs(){
    Usuario=document.getElementById('SesionUsuarioJefeDepa').value;
    unidad=document.getElementById('UnidadSesion').value;
    var url="../msj/avisojd.php";
    $.post(url,{Usuario:Usuario,unidad:unidad}, function (responseText){
        $("#avisos").html(responseText);
    });
}
function avisojc(){
    aviso=document.getElementById('Aviso').value;
    destino=document.getElementById('destino').value;
    unid=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    user=document.getElementById('SesionUsuarioJefeDepa').value;
    action="AdmJC";
    ajax=objetoAjax();
    ajax.open("POST","../getters/save.php",true);
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4) {
            AvisosJCs();
            limpiarAvisos();
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&aviso="+aviso+"&user="+user+"&destino="+destino+"&unid="+unid)
}
function avisojd(){
    aviso=document.getElementById('Aviso').value;
    destino=document.getElementById('destino').value;
    unid=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    user=document.getElementById('SesionUsuarioJefeDepa').value;
    action="AdmJD";
    ajax=objetoAjax();
    ajax.open("POST","../getters/save.php",true);
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4) {
            AvisosJDs();
            limpiarAvisos();
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&aviso="+aviso+"&user="+user+"&destino="+destino+"&unid="+unid)
}
function limpiarAvisos(){
    aviso=document.getElementById('Aviso').value="";
}
function EliminarTrabajador(id){
    action="DelTrabajador";
    ajax=objetoAjax();
    var eliminar = confirm("De verdad desea eliminar este dato? :[")
    if ( eliminar ) 
    {
        ajax.open("GET", "../getters/delete.php?id="+id+"&action="+action);
        ajax.onreadystatechange=function() 
        {
            if (ajax.readyState==4) 
            {
                alert(ajax.responseText);
                trabajador(0);
            }
        }
        ajax.send(null)
    }
}
function buscadorD(){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    var buscar=document.getElementById("buscador").value;
    var url="../buscar/depauser.php";
    $.post(url,{buscar:buscar,unidad:unidad}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function buscadorTrabajador(){
    buscar=document.getElementById('buscaTrabajador').value;
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    var url="../buscar/Trabajador.php";
    $.post(url,{buscar:buscar,unidad:unidad}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function FormTrabajadorEdit(x){
    var url="../update/trabajador.php";
    $.post(url,{x:x}, function (responseText){
        $("#formulario1").html(responseText);
    });
}
function Editartrabajador(){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    dato00=document.getElementById('numerocobro').value;
    dato01=document.getElementById('numeroficha').value;
    dato02=document.getElementById('nombre').value;
    dato03=document.getElementById('apaterno').value;
    dato04=document.getElementById('amaterno').value;
    dato05=document.getElementById('curp').value;
    dato06=document.getElementById('rfc').value;
    dato07=document.getElementById('sueldo').value;
    dato08=document.getElementById('departamento').value;
    dato09=document.getElementById('categoria').value;
    dato10=document.getElementById('fechanacimiento').value;
    dato11="Si";
    dato12=document.getElementById('estadocivil').value;
    dato13=document.getElementById('hijos').value;
    dato14=document.getElementById('discapacidad').value;
    dato15=document.getElementById('estado').value;
    dato16=document.getElementById('municipio').value;
    dato17=document.getElementById('ocupacion').value;
    dato18=document.getElementById('estudios').value;
    dato19=document.getElementById('documentoprobatorio').value;
    dato20=document.getElementById('aniodocumento').value;
    dato21=document.getElementById('institucion').value;
    dato22=document.getElementById('carrera').value;
    dato23=document.getElementById('imss').value;
    dato24=document.getElementById('tipotrabajador').value;
    dato25=document.getElementById('genero').value;
    dato26=document.getElementById('fechaingreso').value;
    id=document.getElementById('id').value;
    action="EditarTrabajador";
    
    var datastring = "action="+action+"&id="+id+"&unidad="+unidad+"&dato00="+dato00+"&dato01="+dato01+"&dato02="+dato02+"&dato03="+dato03+"&dato04="+dato04+"&dato05="+dato05+"&dato06="+dato06+"&dato07="+dato07+"&dato08="+dato08+"&dato09="+dato09+"&dato10="+dato10+"&dato11="+dato11+"&dato12="+dato12+"&dato13="+dato13+"&dato14="+dato14+"&dato15="+dato15+"&dato16="+dato16+"&dato17="+dato17+"&dato18="+dato18+"&dato19="+dato19+"&dato20="+dato20+"&dato21="+dato21+"&dato22="+dato22+"&dato23="+dato23+"&dato24="+dato24+"&dato25="+dato25+"&dato26="+dato26;

    $.ajax({
        url: "../getters/update.php",
        type: 'post',
        datatype: 'json',
        data: datastring,
        success:function(data){
            alert(data);
            trabajador(0);
        },
        error:function(data){
            alert('no');
        }
    });
}
function EliminarRubro(id){
    action="EliminarRubro";
    ajax=objetoAjax();
    var eliminar = confirm("De verdad desea eliminar este dato? :[")
    if ( eliminar ) 
    {
        ajax.open("GET", "../getters/delete.php?id="+id+"&action="+action);

        ajax.onreadystatechange=function() 
        {
            if (ajax.readyState==4) 
            {
                alert(ajax.responseText);
                normasrubros(0);
            }
        }
        ajax.send(null)
    }
}
function EditarRubro(id){
    var url="../update/rubro.php";
    $.post(url,{id:id}, function (responseText){
        $("#formulario1").html(responseText);
    });
}
function EliminarNorma(id){
    action="EliminarNorma";
    ajax=objetoAjax();
    var eliminar = confirm("De verdad desea eliminar este dato? :[")
    if ( eliminar ) 
    {
        ajax.open("GET", "../getters/delete.php?id="+id+"&action="+action);

        ajax.onreadystatechange=function() 
        {
            if (ajax.readyState==4) 
            {
                alert(ajax.responseText);
                normasrubros(0);
            }
        }
        ajax.send(null)
    }
}
function EditarNorma(id){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    var url="../update/norma.php";
    $.post(url,{id:id,unidad:unidad}, function (responseText){
        $("#formulario1").html(responseText);
    });
}
function ActualizarRubro(){
    rubro=document.getElementById('rubro').value;
    id=document.getElementById('id').value;
    action="ActualizarRubro";

    ajax=objetoAjax();
    ajax.open("POST","../getters/update.php",true);
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4) {
            alert(ajax.responseText);
            normasrubros(0);        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&rubro="+rubro+"&id="+id)
}
function EditarNormaJC(){
    id=document.getElementById('id').value;
    Codigon=document.getElementById('Codigon').value;
    Nombren=document.getElementById('Nombren').value;
    rubro=document.getElementById('rubro').value;
    action="EditaNorma";

    ajax=objetoAjax();
    ajax.open("POST","../getters/update.php",true);
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4) {
            alert(ajax.responseText);
            normasrubros(0);
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&Codigon="+Codigon+"&Nombren="+Nombren+"&rubro="+rubro+"&id="+id)
}
function EliminarUsuarioJD(id){
    action="EliminarUsuarioJD";
    ajax=objetoAjax();
    var eliminar = confirm("De verdad desea eliminar este dato? :[")
    if ( eliminar ) 
    {
        ajax.open("GET", "../getters/delete.php?id="+id+"&action="+action);

        ajax.onreadystatechange=function() 
        {
            if (ajax.readyState==4) 
            {
                alert(ajax.responseText);
                DepartamentoUser(0);
            }
        }
        ajax.send(null)
    }
}
function ComboCurso2(){
    unid=document.getElementById('UnidadSesion').value;
    rubro=document.getElementById('rubrocurso03').value;
    
    var url="../combos/cursojd.php";
    $.post(url,{rubro:rubro,unid:unid}, function (responseText){
        $("#jilo").html(responseText);
    });
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function CursoOk(id){
    action="ActualizarCursoOk";

    ajax=objetoAjax();
    ajax.open("POST","../getters/update.php",true);
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4) {
            alert(ajax.responseText);
            cursosjd(0);        
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&id="+id)
}
function CursoPresOkJC(id){
    action="ActualizarCursoPresOk";

    ajax=objetoAjax();
    ajax.open("POST","../getters/update.php",true);
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4) {
            alert(ajax.responseText);
            OkCursosCotizados();        
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&id="+id)
}
function cursosterminador(limite){
    console.log(limite);
    unidad=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('DepartamentoSesion').value;
    anio=document.getElementById('AnioSistemaJD').value;
    var url="../tabla/cursosTerminado.php";
    $.post(url,{limite:limite,unidad:unidad,depa:depa,anio:anio}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function cursosNP(limite){
    unidad=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('DepartamentoSesion').value;
    anio=document.getElementById('AnioSistemaJD').value;
    var url="../tabla/cursosNP.php";
    $.post(url,{limite:limite,unidad:unidad,depa:depa,anio:anio}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function buscadorCurso(){
    buscar=document.getElementById('buscaCurso').value;
    unidad=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('DepartamentoSesion').value;
    var url="../buscar/CursoJD.php";
    $.post(url,{buscar:buscar,unidad:unidad,depa:depa}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function buscadorCursoTerminado(){
    buscar=document.getElementById('buscaCursoTerminado').value;
    unidad=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('DepartamentoSesion').value;
    var url="../buscar/CursosTerminadosJd.php";
    $.post(url,{buscar:buscar,unidad:unidad,depa:depa}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function hola(){
    unidad=document.getElementById('UnidadSesion').value;
    depa=document.getElementById('SesionDepartamentoid').value;
    user=document.getElementById('SesionUsuarioJefeDepa').value;
    var url="../util/aniojd.php";
    $.post(url,{unidad:unidad,depa:depa,user:user}, function (responseText){
        $("#aniodepartamento").html(responseText);
    });
}
function ModificarAnio(){
    id=document.getElementById('id').value;
    anio=document.getElementById('anio').value;
    action="EditaAnio";

    ajax=objetoAjax();
    ajax.open("POST","../getters/update.php",true);
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4) {
            alert(ajax.responseText);
            hola();
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("action="+action+"&anio="+anio+"&id="+id)
}
function CargarImagenJD(){
    unid=document.getElementById('UnidadSesion').value;
    var url="../util/imagenjc.php";
        $.post(url,{unid:unid}, function (responseText){
        $("#ImagenLogo").html(responseText);
    });
}
function DelTraDNC(id){
    action="EliminarTrabajadorDNC";
    ajax=objetoAjax();
    var eliminar = confirm("De verdad desea eliminar este dato?")
    if ( eliminar ) 
    {
        ajax.open("GET", "../getters/delete.php?id="+id+"&action="+action);

        ajax.onreadystatechange=function() 
        {
            if (ajax.readyState==4) 
            {
                alert(ajax.responseText);
                DNCJD(0);
            }
        }
        ajax.send(null)
    }
}
function cursosjc(){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    var url="../util/CursosJC.php";
    $.post(url,{unidad:unidad}, function (responseText){
        $("#cuerpo").html(responseText);
    });
}
function OkCursosCotizados(){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    depa=document.getElementById('depacp').value;
    proceso=document.getElementById('Procesoscp').value;
    if (proceso == "Si") {
        var url="../tabla/ConsultaCursosCotizados.php";
        $.post(url,{unidad:unidad,depa:depa}, function (responseText){
            $("#CCP").html(responseText);
        });
    }
    else{
        var url="../tabla/ConsultaCursosCotizadosOk.php";
        $.post(url,{unidad:unidad,depa:depa}, function (responseText){
            $("#CCP").html(responseText);
        });
    }   
}
function BusquedaAvanzadaCursosJC(){
    unidad=document.getElementById('SesionUsuarioJefeDepaUnidad').value;
    depa=document.getElementById('DepaCursoA').value;
    anio=document.getElementById('anioCursoA').value;
    plan=document.getElementById('planeadoCursoA').value;
    
    var url="../tabla/ConsultaCursosAvanzadosJC.php";
    $.post(url,{unidad:unidad,depa:depa,anio:anio,plan:plan}, function (responseText){
        $("#CCP").html(responseText);
    });
}
function ConsultaTrabajadoresJD(){
    depa=document.getElementById("DepartamentoSesion").value;
    mes=document.getElementById("mesConsulta").value;
    unidad=document.getElementById("UnidadSesion").value;
    anio=document.getElementById('AnioSistemaJD').value;
    var url="../read/ConsultaTrabajadoresJD.php";
    $.post(url,{depa:depa,unidad:unidad,anio:anio,mes:mes}, function (responseText){
        $("#consultajd").html(responseText);
    });
}