<?php require_once('Connections/consejo.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_per = 15;
$pageNum_per = 0;
if (isset($_GET['pageNum_per'])) {
  $pageNum_per = $_GET['pageNum_per'];
}
$startRow_per = $pageNum_per * $maxRows_per;


$cedula=$_GET["cedula"];


mysql_select_db($database_consejo, $consejo);
$query_per = "SELECT * FROM persona where cedula='$cedula'";
$query_limit_per = sprintf("%s LIMIT %d, %d", $query_per, $startRow_per, $maxRows_per);
$per = mysql_query($query_limit_per, $consejo) or die(mysql_error());
$row_per = mysql_fetch_assoc($per);

if (isset($_GET['totalRows_per'])) {
  $totalRows_per = $_GET['totalRows_per'];
} else {
  $all_per = mysql_query($query_per);
  $totalRows_per = mysql_num_rows($all_per);
}
$totalPages_per = ceil($totalRows_per/$maxRows_per)-1;

$queryString_per = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_per") == false && 
        stristr($param, "totalRows_per") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_per = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_per = sprintf("&totalRows_per=%d%s", $totalRows_per, $queryString_per);

if($totalRows_per<=0){
 		echo "<script type=\"text/javascript\">alert ('No hay Personas Registradas'); location.href='registro_personas.php' </script>";
  		exit;
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
.Estilo1 {
	color: #000000
}
</style>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
<!--

function validar(){

			var valor=confirm('¿Esta seguro de Eliminar esta Persona?');
			if(valor==false){
			return false;
			}
			else{
			return true;
			}
		
}
//-->
</script>
<body>
<table width="541" border="1" align="center" cellpadding="0" cellspacing="0" class="bordes">
  <tr bgcolor="#0000FF">
    <th colspan="6" bgcolor="#CCCCCC" class="Estilo1" scope="col">Consulta de Habitantes por Cedula</th>
  </tr>
  <tr bgcolor="#0000FF">
    <th width="111" bgcolor="#CCCCCC" scope="col"><span class="Estilo1">Cedula</span></th>
    <th width="123" bgcolor="#CCCCCC" scope="col"><span class="Estilo1">Nombres </span></th>
    <th width="124" bgcolor="#CCCCCC" scope="col"><span class="Estilo1">Apellidos</span></th>
    <th width="59" bgcolor="#CCCCCC" scope="col"><span class="Estilo1">Opcion</span></th>
    <th width="51" bgcolor="#CCCCCC" scope="col"><span class="Estilo1">Opcion</span></th>
    <th width="53" bgcolor="#CCCCCC" scope="col"><span class="Estilo1">Opcion</span></th>
  </tr>
 
  <?php do { ?>
    <tr>
      <td><div align="center"><?php echo $row_per['cedula']; ?></div></td>
      <td><div align="center"><?php echo $row_per['nombre']; ?></div></td>
      <td><div align="center"><?php echo $row_per['apellido']; ?></div></td>
      <td><div align="center"><span class="Estilo1"><?php echo "<a href='detalles_persona_cedula.php?cedula=$row_per[cedula]'>Detalle</a>"; ?></span></div></td>
      <td><div align="center"><span class="Estilo1"><? echo "<a href='modificar_persona_cedula.php?cedula=$row_per[cedula]'>Modificar</a>";?></span></div></td>
      <td><div align="center"><span class="Estilo1"><? echo "<a onClick='return validar()' href='eliminar_persona_cedula.php?id=$row_per[id_persona]'>Eliminar</a>"; ?></span></div></td>
    </tr>
    <?php } while ($row_per = mysql_fetch_assoc($per)); ?>
 
</table>
</body>
</html>
<?php
mysql_free_result($per);
?>
