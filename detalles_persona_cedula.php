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


$cedula=$_GET["cedula"];
mysql_select_db($database_consejo, $consejo);
$query_persona = "SELECT * FROM persona where cedula='$cedula'";
$persona = mysql_query($query_persona, $consejo) or die(mysql_error());
$row_persona = mysql_fetch_assoc($persona);
$totalRows_persona = mysql_num_rows($persona);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
.negrita {	font-weight: bold;
}
</style>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="417" align="center" class="bordes">
  <tr valign="baseline">
    <td colspan="2" align="center" nowrap="nowrap" bgcolor="#CCCCCC" class="negrita">Detalle de Personas</td>
  </tr>
  <tr valign="baseline">
    <td width="153" align="right" nowrap="nowrap" class="negrita">Nombres de la Persona:</td>
    <td width="252"><?php echo $row_persona['nombre']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="negrita">Apellidos de la Persona:</td>
    <td><?php echo $row_persona['apellido']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="negrita">Cedula de la Persona:</td>
    <td><?php echo $row_persona['cedula']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="negrita">Telefono de Domicilio:</td>
    <td><?php echo $row_persona['telefono']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="negrita">Celular de la Persona:</td>
    <td><?php echo $row_persona['celular']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" valign="middle" class="negrita">Direccion:</td>
    <td><?php echo $row_persona['direccion']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="negrita">Sexo:</td>
    <td><label for="sexo"><?php echo $row_persona['sexo']; ?></label></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="center" nowrap="nowrap" bgcolor="#CCCCCC">
    <a href="consultar_personas_cedula2.php?cedula=<?php echo $cedula; ?>">
    <input type="submit" value="Atras" />
    </a>
    </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($persona);
?>
