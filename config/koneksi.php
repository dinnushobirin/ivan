<?php
$coba = "localhost";
$username = "root";
$password = "";
$database = "ivan";

// Koneksi dan memilih database di server
$con		=mysql_connect($coba,$username,$password) or die("Koneksi gagal");
mysql_select_db($database, $con) or die("Database tidak bisa dibuka");
?>
