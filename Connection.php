<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "GhureBerai";

if (!$con = mysqli_connect($host, $user, $pass, $database)) {

    die("connection failed!");
}
?>