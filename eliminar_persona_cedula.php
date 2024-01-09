<?php require_once('Connections/consejo.php'); 




$id=$_GET["id"];
//eliminamos el alumno


mysql_select_db($database_conexion, $conexion);
$sql="delete FROM persona where id_persona=$id";
$verificar=mysql_query($sql,$consejo) or die(mysql_error());

if($verificar){
	echo"<script type=\"text/javascript\">alert ('Datos Eliminado'); location.href='consultar_personas_cedula1.php' </script>";
}
else{
	echo"<script type=\"text/javascript\">alert ('Error'); location.href='consultar_personas_cedula1.php' </script>";
	
}//fin de l primer else


?>