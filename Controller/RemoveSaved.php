<?php
session_start();
if (isset($_GET['Saved'])) {
    if (isset($_COOKIE['Saved'])) {
        setcookie('Saved', '', time() - 3600);
        header('location: MyBookings.php');
    }
}