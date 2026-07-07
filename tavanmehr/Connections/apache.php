<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_apache = "localhost";
$database_apache = "tavanmehr";
$username_apache = "tavanmehr";
$password_apache = "111111";
$apache = mysql_pconnect($hostname_apache, $username_apache, $password_apache) or trigger_error(mysql_error(),E_USER_ERROR); 
?>