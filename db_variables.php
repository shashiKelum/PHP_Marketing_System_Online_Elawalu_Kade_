<?php
error_reporting(0);

$server = "localhost";
$username = "root";
$password = "";
$db_name = "safari";

mysql_connect($server, $username, $password);
mysql_select_db($db_name) or die(mysql_error());
