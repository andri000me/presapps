<?php 

$server = "localhost";
$username = "root";
$password = "";
$dbname = "presapps";

$connect = mysqli_connect($server, $username, $password, $dbname);

if(!$connect){ echo "Database tidak ditemukan."; }

?>