<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['Saved'])) {
        // $toDelete = $_GET['Saved'];
        setcookie('Saved', '', time() - 3600);
        header('location: MyBookings.php');
        // exit();
    }
}
?>