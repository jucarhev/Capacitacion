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
	<script src="../../js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="ajaxupload.js"></script>
	<script src="../../js/funciones.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body>
	<header>
		<div id="subheader">
			<div id="logosHeader">
                <div id="ImagenLogo"></div>
                <div><img src="../../img/LogoSoft.png" height="96"></div>               
            </div>
			<div id="sesionUser">
                <div id="sesionUser1">
                	<?php echo $UserSession; ?> | Administrador
                </div>
                <div id="sesionUser2">                	
                    <div id="IconoHome1"><a onclick="PaginaPrincipal();return false" style="cursor:pointer;"><img src="../../img/info0.png" title="Recargar el sistema" style="margin-top:4px;"></a></div>
                	<div id="IconoHome1"><a href="#" onclick="kat();return false"><img src="../../img/info1.png" title="Informacion del sistema"></a></div>
                    <div id="IconoHome1"><a href="#" onclick="ventana3(1); return false"><img src="../../img/info2.png" title="Errores"></a></div>
                    <div id="IconoHome1"><a href="#" onclick="ventana3(2); return false"><img src="../../img/Herramientas2.png" title="Herramientas"></a></div>
                    <div id="IconoHome1"><a href="../verif/logout.php"><img src="../../img/info4.png" title="Cerrar Sesion"></a></div>
                </div>
		    </div>
        </div>
	</header><!-- /header -->

	<nav>
		<div id="subnav">
			<div id="Menu-adm">
				<div id="menu">
					<ul class="navi">
						<li><a href="" onclick="PaginaPrincipal();return false" title="Pagina de inicio">Home</a></li>
						<li><a href="" onclick="tablaUnidad(0);return false" title="Unidad">Unidades</a></li>
						<li><a href="" onclick="tablaUsuario(0);return false" title="Usuarios">Usuarios</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
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
<body onload="javascript:PaginaPrincipal();CargarImagen();">
</body>
</html>