<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_consejo = "localhost";
$database_consejo = "consejo";
$username_consejo = "root";
$password_consejo = "root";
$consejo = mysql_pconnect($hostname_consejo, $username_consejo, $password_consejo) or trigger_error(mysql_error(),E_USER_ERROR); 
?>