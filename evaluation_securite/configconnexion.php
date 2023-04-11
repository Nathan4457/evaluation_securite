<?php
$dbname = "role_user";
$dbuser = "root";
$dbip = "localhost";
$dbpass = "";

$bdd = new PDO("mysql:host=" . $dbip . ";dbname=" . $dbname . ";charset=utf8", $dbuser, $dbpass);
?>