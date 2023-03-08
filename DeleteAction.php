<?php
session_start();
include('Connection.php');


if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $query = "delete from users where User_Id=$id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $_SESSION['message'] = "Operation completed successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['message'] = "Error deleting record";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>