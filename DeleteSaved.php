<?php
session_start();
if ($_REQUEST['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['Saved'])) {
        $toDelete = $_GET['Saved'];
        setcookie($toDelete, '', time() - 3600);
        header('location: MyBookings,php');
    }
}
?>