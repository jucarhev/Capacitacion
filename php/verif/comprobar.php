<?php
include ("../conf/conf.php");
$UserName=$_POST["UserName"];
$UserPass=$_POST["UserPass"];
$adm="Administrador";
$jc="Jefe de capacitacion";
$jd="Jefe de departamento";
$result=$con->query("SELECT * FROM usuario WHERE user='$UserName';");
if ($row=$result->fetch_array()) 
{
	if ($row["password"]==$UserPass) {
		if ($row["type"]==$adm) {
			session_start();
			$_SESSION['user']=$UserName;
			header("Location: ../adm/index.php");
		}
		if ($row["type"]==$jc) {
			session_start();
			$_SESSION['user']=$UserName;
			header("Location: ../jeca/index.php");
		}
		if ($row["type"]==$jd) {
			session_start();
			$_SESSION['user']=$UserName;
			header("Location: ../jede/index.php");
		}	
   }
    else
   {
    ?>
     <script languaje="javascript">
      alert("Usuario o password incorrecta");
      location.href = "../../index.html";
     </script>
    <?php
   }
}
else
{
?>
 <script languaje="javascript">
  alert("Usuario o password incorrecta");
  location.href = "../../index.html";
 </script>
<?php       
}
mysql_free_result($result);
mysql_close();
?>