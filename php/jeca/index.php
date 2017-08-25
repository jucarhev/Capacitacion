<?php 
    session_start(); 
    if(!isset($_SESSION['usuario'])) 
    {
        header('Location: ../../index.html'); 
        exit();
    }
    $UserSession=$_SESSION['usuario'];
?>
<?php 
    include("../conf/conf.php");
    $query="SELECT * FROM usuario WHERE usuario='$UserSession'";
    $res=$db->query($query);
    while ($fila=$res->fetch_array()) {
        $tipouser=$fila['tipouser'];
        $unidadUsuario=$fila['unidad'];
    }
    $pagina="Jefe de capacitacion";
    if ($pagina!=$tipouser) {
        header('Location: ../../index.html'); 
            exit();
    }
    $querys="SELECT * FROM unidad WHERE nombre='$unidadUsuario'";
    $res=$db->query($querys);
    while ($fila=$res->fetch_array()) {
        $idUnidad=$fila['id'];
    }
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
                	<?php echo $UserSession; ?> | Jefe de capacitaci&oacute;n | <?php echo $unidadUsuario; ?>
                </div>
                <div id="sesionUser2">                	
                    <div id="IconoHome1"><a onclick="PaginaPrincipal2();return false" style="cursor:pointer;"><img src="../../img/info0.png" title="Recargar el sistema" style="margin-top:4px;"></a></div>
                	<div id="IconoHome1"><a onclick="kat();return false"><img src="../../img/info1.png" title="Informacion del sistema"></a></div>
                    <div id="IconoHome1"><a onclick="ventana3(4); return false"><img src="../../img/info2.png" title="Errores"></a></div>
                    <div id="IconoHome1"><a onclick="ventana2(0,5); return false"><img src="../../img/Herramientas2.png" title="Herramientas"></a></div>
                    <div id="IconoHome1"><a href="../verif/logout.php"><img src="../../img/info4.png" title="Cerrar Sesion"></a></div>
                </div>
		    </div>
        </div>
	</header><!-- /header -->
<input type="hidden" id="SesionUsuarioJefeDepa" value="<?php echo $UserSession; ?>">
<input type="hidden" id="SesionUsuarioJefeDepaUnidad" value="<?php echo $unidadUsuario; ?>">
<input type="hidden" id="idUnidad" value="<?php echo $idUnidad; ?>">
	<nav>
		<div id="subnav">
			<div id="Menu-adm">
				<div id="menu">
					<ul>
						<li><a href="" onclick="PaginaPrincipal2();return false">Home</a></li>
						<li><a href="" onclick="kardexjc();return false">KARDEX</a></li>
						<li><a href="" onclick="DepartamentoUser(0);return false">Departamentos</a></li>
                        <li><a href="" onclick="trabajador(0);return false">Trabajador</a></li>
                        <li><a href="" onclick="normasrubros(0);return false">Rubros y normas</a></li>
                        <li><a href="" onclick="cursosjc();return false">Cursos</a></li>
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
<body onload="javascript:PaginaPrincipal2();javascript:CargarImagenJC();">
</body>
</html>