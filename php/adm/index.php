<?php 
    session_start(); 
    if(!isset($_SESSION['usuario'])) 
    {
        header('Location: ../../index.html'); 
        exit();
    }
    $UserSession=$_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon" />
	<title>Administrador</title>
	<link rel="stylesheet" href="../../css/estilos.css">
	<link rel="stylesheet" href="../../css/menu.css">
	<link rel="stylesheet" href="../../css/ventanas.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <script src="../../js/jquery-1.12.4.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script type="text/javascript" src="ajaxupload.js"></script>
    <script src="../../js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="../../js/funciones.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="../../js/funcion_adm.js" type="text/javascript" charset="utf-8" async defer></script>

</head>
<body>

<!-- Navbar desde la migracion -->
<nav class="navbar navbar-inverse" style="border-radius: 0;">
    <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" onclick="PaginaPrincipal();return false">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#" onclick="tablaUnidad(0);return false" >Unidad</a></li>
                <li><a href="#" onclick="tablaUsuario(0);return false">Usuarios</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $UserSession; ?> | Administrador <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="#" onclick="PaginaPrincipal();return false">Recargar</a></li>
            <li><a href="#" onclick="kat();return false">Informacion</a></li>
            <li><a href="#" onclick="ventana3(1); return false">Errores</a></li>
            <li><a href="#" onclick="ventana3(2); return false">Herramientas</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="../verif/logout.php">Cerrar sesion</a></li>
            </ul>
            </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--  end navbar -->

	<section id="cuerpo">
		
	</section>

<div class="ventana">
    <div class="trabajador">
        <div class="cont1">
            <div class="titulo3">
            <span style="font-size: 20px;">Ingresar nuevo dato</span>
            </div>
            <div class="cerrar">
                <a href="javascript:cerrarventana();" title="Cerrar ventana"><img src="../../img/cerrar.png" ></a>
            </div>
        </div>
        <hr>
        <div id="formulario"></div>
    </div>        
</div>

<div class="ventana1">
    <div class="trabajador">
        <div class="cont1">
            <div class="titulo3">
            <span style="font-size: 20px;">Editar datos</span>
            </div>
            <div class="cerrar">
                <a href="javascript:cerrarventana1();" title="Cerrar ventana"><img src="../../img/cerrar.png" ></a>
            </div>
        </div>
        <hr>
        <div id="formulario1"></div>
    </div> 
</div>
<div class="ventana2">
    <div class="trabajador">
        <div class="cont1">
            <div class="titulo3">
            <span style="font-size: 20px;">Ver informacion</span>
            </div>
            <div class="cerrar">
                <a href="javascript:cerrarventana2();" title="Cerrar ventana"><img src="../../img/cerrar.png" ></a>
            </div>
    	</div>
    	<hr>
    	<div id="formulario2"></div>
    </div>
</div> 
<div class="ventana3">
    <div class="trabajador">
        <div class="cont1">
            <div class="titulo3">
            <span style="font-size: 20px;">Opciones</span>
            </div>
            <div class="cerrar">
                <a href="javascript:cerrarventana3();" title="Cerrar ventana"><img src="../../img/cerrar.png" ></a>
            </div>
        </div>
        <hr>
        <div id="formulario3"></div>
    </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body" id="formulario_adm">
                    ...
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="../../js/jquery-1.12.4.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script type="text/javascript" src="ajaxupload.js"></script>
    <script src="../../js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="../../js/funciones.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="../../js/funcion_adm.js" type="text/javascript" charset="utf-8" async defer></script>
<body onload="javascript:PaginaPrincipal();CargarImagen();">
</body>
</html>