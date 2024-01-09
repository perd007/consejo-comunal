<?php require_once('Connections/consejo.php');

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0155)http://webcache.googleusercontent.com/search?q=cache:OSe-XuxLYKoJ:www.me.gob.ve/+ministerio+de+educacion+venezuela&cd=1&hl=es&ct=clnk&source=www.google.com -->
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link type="text/css" rel="stylesheet" href="calendario/calendario/dhtmlgoodies_calendar.css?random=20051112" media="screen" />
<SCRIPT type="text/javascript" src="calendario/calendario/dhtmlgoodies_calendar.js?random=20060118"></script>
<!--<base href="http://www.me.gob.ve/index.php">-->
<base href="." />

<script language="JavaScript" src="mm_menu.js"></script>
<style type="text/css">
<!--
.Estilo1 {color: #FFFFFF}
-->
</style>
</head>
<body marginwidth="0" marginheight="0" leftmargin="0" topmargin="0" >

<script language="JavaScript1.2">mmLoadMenus();
ventana=windows.open("principal.php");
</script>
<div style="margin:-1px -1px 0;padding:0;border:1px solid #999;background:#fff"></div>
<div style="position: relative; text-align: right; left: -2px; top: 2px;">
  <!--?xml version="1.0" encoding="utf-8"?-->
  <title> Sistema de Administrativo para Consejos Comunales</title>
  <meta name="description" content="Ministerio del Poder Popular para la Educación" />
  <script type="text/javascript" src="imagenes/stylechanger.js"></script>
  <link href="imagenes/estilos.css" rel="stylesheet" type="text/css" />
  <table width="776" align="center" border="0" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td height="5" colspan="3"></td>
      </tr>
      
      <tr>
        <td height="7" colspan="3"></td>
      </tr>
      <tr>
        <td colspan="3"><img src="imagenes/top.jpg" width="780" /></td>
      </tr>
      <tr>
        <td width="4" height="425" class="fondo" background="imagenes/border_left.jpg"></td>
        <td class="fondo" width="769"><!--  Contenido  -->
            <table border="0" cellpadding="0" cellspacing="0" width="98%">
              <tbody>
                <tr>
                  <td width="746"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                      <tbody>
                        <tr>
                          <td height="542"><table border="0" cellpadding="0" cellspacing="0" width="102%">
                              <tbody>
                                <tr>
                                  <td colspan="3"><map name="Map">
                                      <area shape="rect" coords="0,0,110,58" href="http://www.me.gob.ve/index.php" alt="Inicio" title="Inicio" border="0" />
                                    </map>
                                      <table border="0" cellpadding="0" cellspacing="0" width="97%">
                                        <tbody>
                                          <tr>
                                            <td ><p>
      <img src="imagenes/cintillo.jpg" width="765" height="49" />
      <img src="imagenes/banner_3_copy.png" width="760" height="127" /></p></td>
                                          </tr>
                                        </tbody>
                                    </table></td>
                                </tr>
                                <tr>
                                  <td colspan="3"><!-- Columna de Contenido Izquierda -->
                                      <script type="text/javascript" src="imagenes/functions.js"></script>
                                      <script type="text/javascript" src="imagenes/menu.js"></script>
                                   
                                      <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                        <tbody>
                                          <tr>
                                            <!--	<td class="barra" width="205">
								   	<a href="http://www.portaleducativo.edu.ve" class="bar" target="blank">Portal Educativo</a>
								  	<a href="http://renadit.me.gob.ve" class="bar" target="blank">Renadit</a>
								 		<a href="http://www.ind.gov.ve" class="bar" target="blank">IND</a>
								 		<a href="contenido.php?id_seccion=29" class="bar">Más enlaces...</a>
								  </td>	-->
                                            <td width="141" bgcolor="#FFFFFF" >
                                              <br>                                            </td>
                                            <td width="49" bgcolor="#FFFFFF" ></td>
                                            <td width="564"  align="right" bgcolor="#FFFFFF" >&nbsp;</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                    <!-- Columna de Contenido Izquierda -->                                  </td>
                                </tr>
                                <tr>
                                  <td width="174" valign="top"><!-- Columna de Contenido Izquierda -->
                                      <table border="0" bgcolor="#FFFFFF" width="100" cellpadding="0" cellspacing="0">
                                        <tbody>
                                          <tr>
                                            <td height="5"></td>
                                          </tr>
                                          <tr>
                                            <td><img src="imagenes/fondo_box_top_l.jpg" /></td>
                                          </tr>
                                          <tr>
                                            <td><table border="0" width="100%" cellpadding="0" cellspacing="0" class="boxcolor">
                                                <tbody>
                                                  <tr>
                                                    <td><!-- Busqueda en el ME -->
                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                                          <tbody>
                                                            <tr>
                                                              <td bgcolor="#FF0000">&nbsp;</td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      <!-- Fin Busqueda en el ME -->                                                    </td>
                                                  </tr>
                                                </tbody>
                                            </table></td>
                                          </tr>
                                          <tr>
                                            <td><table border="0" bgcolor="#FF0000" width="98%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                  <tr>
                                                    <td height="5"></td>
                                                  </tr>
                                                  <tr>
                                                    <td valign="top" height="100"><!-- Menu Izquierda -->
                                                        <table  border="0" width="100%" cellpadding="0" cellspacing="0">
                                                          <tbody>
                                                            <tr>
                                                              <td class="menu_main"><a href="registro_personas.php" name="link5" target="contenido"  class="menu_main_link_l Estilo1" > Registro de Habitantes </a></td>
                                                            </tr>
                                                            <tr>
                                                              <td class="menu_main"><a href="consultar_personas.php" target="contenido" name="link4" class="menu_main_link_l Estilo1"  >Consulta de Habitantes</a></td>
                                                            </tr>
                                                            <tr>
                                                              <td class="menu_main"><a href="consultar_personas_cedula1.php" name="link4" target="contenido" class="menu_main_link_l Estilo1" id="link"  >Consulta por Cedula</a></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                              <td class="menu_main"><a href="estadistica_personas.php" target="contenido" name="link4" class="menu_main_link_l Estilo1" id="link4"  >Reporte de Habitantes</a></td>
                                                            </tr>
                                                            <tr>
                                                              <td class="menu_main"><a href="cerrarSesion.php" name="link4" class="menu_main_link_l Estilo1" id="link4"  >Salir del Sistema</a></td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      <!-- Fin Menu Izquierda -->                                                    </td>
                                                  </tr>
                                                </tbody>
                                            </table></td>
                                          </tr>
                                          <tr>
                                            <td><img src="imagenes/fondo_box_bottom_l.jpg" /></td>
                                          </tr>
                                          <tr>
                                            <td height="5"></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    <!-- Fin de Columna de Contenido Izquierda -->                                  </td>
                                  <td width="3"></td>
                                  <td width="593" bgcolor="#FFFFFF" style="padding-top:5px;"><iframe name="contenido" id="contenido"style="display:block" align="left" frameborder="0" scrolling="no"  width="600" height="300"  ></iframe>                                    <!-- Columna de Contenido Central -->
                                      <!-- Fin de Columna de Contenido Central --></td>
                                </tr>
                                <tr>
                                  <td height="123" colspan="3" valign="top"><div align="left"><img src="imagenes/images.jpg" width="494" height="102" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagenes/consejos_comunales1.jpg" width="92" height="102" /></div></td>
                                </tr>
                              </tbody>
                          </table></td>
                        </tr>
                      </tbody>
                  </table></td>
                </tr>
              </tbody>
          </table>
          <!--  Fin del Contenido  -->        </td>
	
        <td width="7" height="425" class="fondo" background="imagenes/border_right.jpg">      </td>
      </tr>
      <tr>
        <td colspan="3"><div align="center"><img src="imagenes/down.jpg" width="780" /></div></td>
      </tr>
      <tr>
        <td colspan="3"><!--  Footer  -->
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td align="center" class="footer"><!-- <a href="mailto://webmaster@me.gob.ve" class="foot">webmaster@me.gob.ve</a> -->                  </td>
                </tr>
              </tbody>
            </table>
          <!-- Fin Footer-->        </td>
      </tr>
    </tbody>
  </table>
</div>
</body></html>