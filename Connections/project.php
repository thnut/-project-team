<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_project = "localhost";
$database_project = "final_project";
$username_project = "root";
$password_project = "";
$project = mysql_pconnect($hostname_project, $username_project, $password_project) or trigger_error(mysql_error(),E_USER_ERROR); 
?>