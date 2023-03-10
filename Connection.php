<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "GhureBerai";
// $port = 3306;
$con = mysqli_connect($host, $user, $pass, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>