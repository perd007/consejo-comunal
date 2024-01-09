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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	
	mysql_select_db($database_consejo, $consejo);
$query_persona = "SELECT * FROM persona where cedula='$_POST[cedula]' and id_persona!='$_POST[id_persona]'";
$persona = mysql_query($query_persona, $consejo) or die(mysql_error());
$row_persona = mysql_fetch_assoc($persona);
$totalRows_persona = mysql_num_rows($persona);
	
	if($totalRows_persona>=1){
 echo "<script type=\"text/javascript\">alert ('La cedula ya esta registrada');  location.href='consultar_personas.php' </script>";
  exit;
}
	
	
	
  $updateSQL = sprintf("UPDATE persona SET nombre=%s, apellido=%s, cedula=%s, telefono=%s, celular=%s, direccion=%s, sexo=%s WHERE id_persona=%s",
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['apellido'], "text"),
                       GetSQLValueString($_POST['cedula'], "int"),
                       GetSQLValueString($_POST['telefono'], "text"),
                       GetSQLValueString($_POST['celular'], "text"),
                       GetSQLValueString($_POST['direccion'], "text"),
                       GetSQLValueString($_POST['sexo'], "text"),
                       GetSQLValueString($_POST['id_persona'], "int"));

  mysql_select_db($database_consejo, $consejo);
  $Result1 = mysql_query($updateSQL, $consejo) or die(mysql_error());
    if($Result1){
  echo "<script type=\"text/javascript\">alert ('Datos Modificados');  location.href='consultar_personas.php' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='consultar_personas.php' </script>";
  exit;
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
<script language="javascript">

function validar(){

		if(document.form1.cedula.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('cedula').value)){
				alert('Solo puede ingresar numeros en la cedula !!!');
				return false;
		   		}
				}
		if(document.form1.telefono.value!=""){
			 var filtro = /^(\d)+$/i;
		   	  if (!filtro.test(document.getElementById('telefono').value)){
				alert('Solo puede ingresar numeros en el telefono de domicilio!!!');
				return false;
		   		}
				}
				if(document.form1.celular.value!=""){
			 var filtro = /^(\d)+$/i;
		   	  if (!filtro.test(document.getElementById('celular').value)){
				alert('Solo puede ingresar numeros en el celular!!!');
				return false;
		   		}
				}
				
				
		
				
				if(document.form1.cedula.value==""){
						alert("Debe Ingresar la Cedula de la Persona");
						return false;
				}
				
				
				if(document.form1.nombre.value==""){
						alert("Debe Ingresar el Nombre de la Persona");
						return false;
				}
			
				if(document.form1.apellido.value==""){
						alert("Debe Ingresar el Apellido de la Persona");
						return false;
				}
				
				if(document.form1.direccion.value==""){
						alert("Debe Ingresar la Direccion de la Persona");
						return false;
				}
	
				
		}
</script>
<body>
<form action="<?php echo $editFormAction; ?>" onsubmit="return validar()" method="post" name="form1" id="form1">
  <table width="417" align="center" class="bordes">
    <tr valign="baseline">
      <td colspan="2" align="center" nowrap="nowrap" bgcolor="#CCCCCC" class="negrita">Modificacion  de Avitantes</td>
    </tr>
    <tr valign="baseline">
      <td width="153" align="right" nowrap="nowrap" class="negrita">Nombres de la Persona:</td>
      <td width="252"><input name="nombre" type="text" value="<?php echo $row_persona['nombre']; ?>" size="32" maxlength="30" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="negrita">Apellidos de la Persona:</td>
      <td><input name="apellido" type="text" value="<?php echo $row_persona['apellido']; ?>" size="32" maxlength="30" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="negrita">Cedula de la Persona:</td>
      <td><input name="cedula" type="text" value="<?php echo $row_persona['cedula']; ?>" size="20" maxlength="9" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="negrita">Telefono de Domicilio:</td>
      <td><input name="telefono" type="text" value="<?php echo $row_persona['telefono']; ?>" size="20" maxlength="11" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="negrita">Celular de la Persona:</td>
      <td><input name="celular" type="text" value="<?php echo $row_persona['celular']; ?>" size="20" maxlength="11" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" valign="middle" class="negrita">Direccion:</td>
      <td><textarea name="direccion" cols="40" rows="3" onkeydown="if(this.value.length &gt;= 300){ alert('Has superado el tamaño máximo permitido de este campo'); return false; }"><?php echo $row_persona['direccion']; ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="negrita">Sexo:</td>
      <td><label for="sexo"></label>
        <select name="sexo" id="sexo">
          <option value="Masculino" <?php if (!(strcmp("Masculino", $row_persona['sexo']))) {echo "selected=\"selected\"";} ?>>Masculino</option>
          <option value="Femenino" <?php if (!(strcmp("Femenino", $row_persona['sexo']))) {echo "selected=\"selected\"";} ?>>Femenino</option>
        </select></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="center" nowrap="nowrap" bgcolor="#CCCCCC"><input type="submit" value="Modificar Datos" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id_persona" value="<?php echo $row_persona['id_persona']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($persona);
?>
