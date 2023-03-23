<?php
session_start();
// var_dump($_SESSION);

$Package_Id = $_GET['Package_Id'];
$User_Id = $_SESSION['User_Id'];

if (isset($_SESSION['User_Id'])) {
    include('../Model/BookPackageModel.php');
    Book($User_Id, $Package_Id);
    header('location: ../View/Packages.php');
} else {
    setcookie('Saved', $Package_Id, time() + (86400 * 30));
    header('location: ../View/MyBookings.php');
}


?>