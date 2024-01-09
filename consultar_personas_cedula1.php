<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<script language="javascript">
<!--
function validar(){

if(document.form1.cedula.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('cedula').value)){
				alert('Solo puede ingresar numeros en la cedula !!!');
				return false;
		   		}
				}

		   if(document.form1.cedula.value==""){
		   alert("DEBE INGRESAR UNA CEDULA");
		   return false;
		   }
		  
		  
		 
   }
   
//-->
</script>
<body>
<form id="form1" name="form1" onSubmit="return validar()"  method="get" action="consultar_personas_cedula2.php">
  <p>
    <label></label>
  </p>
  <table width="217" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FF0000" bgcolor="#FFFFFF">
    <tr>
      <th colspan="2" scope="col">Consulta por Cedula </th>
    </tr>
    <tr>
      <td width="78"><div align="right">Cedula:</div></td>
      <td width="123"><label>
        <input name="cedula" type="text" id="cedula" size="9" maxlength="9" />
        </label>      </td>
    </tr>
    <tr>
      <td colspan="2">
        <div align="center">
          <input type="submit" name="Submit" value="Buscar" />
		  <input type="hidden" name="link" value="link31" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
