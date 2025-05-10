<?php 

$hotname = "localhost";
$username = "root";
$port = "3306";
$password = "Paocomqueijo/1";
$database = "ver-o-anuncio";

$connection = mysqli_connect($hotname, $username, $password, $database, $port);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
     
?>