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
    $query="SELECT us.unidad,tipouser, d.departamento,d.id  FROM usuario as us join departamento as d on us.idDepartamento=d.id WHERE usuario='$UserSession'";
    $res=$db->query($query);
    while ($fila=$res->fetch_array()) {
        $tipouser=$fila['tipouser'];
        $unidadUsuario=$fila['unidad'];
        $depauser=$fila['departamento'];
        $idDepartamento=$fila['id'];
    }
    $pagina="Jefe de departamento";
    if ($pagina!=$tipouser) {
        header('Location: ../../index.html'); 
            exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon" />
	<title>Administrador</title>
	<link rel="stylesheet" href="../../assets/css/estilos.css">
	<link rel="stylesheet" href="../../assets/css/menu.css">
	<link rel="stylesheet" href="../../assets/css/ventanas.css">
	<script src="../../assets/js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="../../assets/js/funciones.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body>
	<header>
		<div id="subheader">
			<div id="logosHeader">
                <div id="ImagenLogo"></div>
                <div><img src="../../assets/img/LogoSoft.png" height="96"></div>               
            </div>
			<div id="sesionUser">
                <div id="sesionUser1">
                	<?php echo $UserSession; ?> | Jefe de departamento | <?php echo $unidadUsuario; ?> | <?php echo $depauser; ?>
                </div>
                <div id="sesionUser2">                	
                    <div id="IconoHome1"><a onclick="PaginaPrincipal2();return false" style="cursor:pointer;"><img src="../../assets/img/info0.png" title="Recargar el sistema" style="margin-top:4px;"></a></div>
                	<div id="IconoHome1"><a onclick="kat();return false"><img src="../../assets/img/info1.png" title="Informacion del sistema"></a></div>
                    <div id="IconoHome1"><a onclick="ventana3(3);return false" style="cursor:pointer;"><img src="../../assets/img/info2.png" title="Errores"></a></div>
                    <div id="IconoHome1"><a onclick="ventanajd2(1);return false" style="cursor:pointer;"><img src="../../assets/img/Herramientas2.png" title="Herramientas"></a></div>
                    <div id="IconoHome1"><a href="../verif/logout.php"><img src="../../assets/img/info4.png" title="Cerrar Sesion"></a></div>
                </div>
		    </div>
        </div>
	</header><!-- /header -->
<input type="hidden" id="SesionUsuarioJefeDepa" value="<?php echo $UserSession; ?>">
<input type="hidden" id="SesionUsuarioJefeDepaUnidad" value="<?php echo $unidadUsuario; ?>">
<input type="hidden" id="UnidadSesion" value="<?php echo $unidadUsuario; ?>">
<input type="hidden" id="DepartamentoSesion" value="<?php echo $depauser; ?>">
<input type="hidden" id="SesionUsuarioJefeDepartamento" value="<?php echo $depauser; ?>">
<input type="hidden" id="SesionDepartamentoid" value="<?php echo $idDepartamento; ?>">
	<nav>
		<div id="subnav">
			<div id="Menu-adm">
				<div id="menu">
					<ul>
						<li><a href="" onclick="PaginaPrincipal3();return false">Home</a></li>
                        <li><a href="" onclick="jdnormasrubros(0);return false">Rubros y normas</a></li>
                        <li><a href="" onclick="cursosjd(0);return false">Cursos</a></li>
                        <li><a href="" onclick="Cotizaciones();return false">Cursos presupuestados</a></li>
                        <li><a href="" onclick="DNCJD(0);return false">DNC</a></li>
                        <li><a href="" onclick="listas(0);return false">Listas</a></li>
						<li><a href="" onclick="kardex(0);return false">KARDEX</a></li>						
                        <li><a href="" onclick="jdtrabajador(0);return false">Trabajador</a></li>
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
            <span style="font-size: 20px;">Ingresar dato</span>
            </div>
            <div class="cerrar">
                <a href="javascript:cerrarventana();" title="Cerrar ventana"><img src="../../assets/img/cerrar.png" ></a>
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
                <a href="javascript:cerrarventana1();" title="Cerrar ventana"><img src="../../assets/img/cerrar.png" ></a>
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
            <span style="font-size: 20px;">Herramientas</span>
            </div>
            <div class="cerrar">
                <a href="javascript:cerrarventana2();" title="Cerrar ventana"><img src="../../assets/img/cerrar.png" ></a>
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
                <a href="javascript:cerrarventana3();" title="Cerrar ventana"><img src="../../assets/img/cerrar.png" ></a>
            </div>
        </div>
        <hr>
        <div id="formulario3"></div>
    </div>
</div> 

<div class="ventana4">
    <div class="ventanaGrande">
        <div class="cont1">
            <div class="titulo3">
            <span style="font-size: 20px;">Cotizaci&oacute;n</span>
            </div>
            <div class="cerrar">
                <a href="javascript:cerrarventana4();" title="Cerrar ventana"><img src="../../assets/img/cerrar.png" ></a>
            </div>
        </div>
        <hr>
        <div id="formulario4"></div>
    </div>
</div>


<body onload="javascript:PaginaPrincipal3();javascript:hola();javascript:CargarImagenJD();">
<div id="aniodepartamento"></div>
</body>
</html>