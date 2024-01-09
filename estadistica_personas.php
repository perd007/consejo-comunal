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

mysql_select_db($database_consejo, $consejo);
$query_personas = "SELECT count(id_persona) FROM persona";
$personas = mysql_query($query_personas, $consejo) or die(mysql_error());
$row_personas = mysql_fetch_assoc($personas);
$totalRows_personas = mysql_num_rows($personas);

mysql_select_db($database_consejo, $consejo);
$query_masc = "SELECT count(id_persona) FROM persona where sexo='Masculino'";
$masc = mysql_query($query_masc, $consejo) or die(mysql_error());
$row_masc = mysql_fetch_assoc($masc);
$totalRows_masc = mysql_num_rows($masc);

mysql_select_db($database_consejo, $consejo);
$query_feme = "SELECT count(id_persona) FROM persona where sexo='Femenino'";
$feme = mysql_query($query_feme, $consejo) or die(mysql_error());
$row_feme = mysql_fetch_assoc($feme);
$totalRows_feme = mysql_num_rows($feme);




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="277" border="1" align="center" class="bordes">
  <tr>
    <th colspan="2" bgcolor="#CCCCCC" scope="col">Estadistica de Habitantes</th>
  </tr>
  <tr>
    <td width="106">Total Registrado</td>
    <td width="78"><?php echo $row_personas['count(id_persona)']; ?></td>
  </tr>
  <tr>
    <td>Total  Masculino</td>
    <td><?php echo $row_masc['count(id_persona)']; ?></td>
  </tr>
  <tr>
    <td>Total Femenino</td>
    <td><?php echo $row_feme['count(id_persona)']; ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($personas);

mysql_free_result($masc);

mysql_free_result($feme);
?>
