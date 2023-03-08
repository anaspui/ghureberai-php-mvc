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
} else if (isset($_GET['deleteHotel'])) {
    $id = $_GET['deleteHotel'];
    $query = "delete from hotels where Hotel_Id=$id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $_SESSION['message'] = "Operation completed successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['message'] = "Error deleting record";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
} else if (isset($_GET['deletePack'])) {
    $id = $_GET['deletePack'];
    $query = "delete from packages where Package_Id=$id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $_SESSION['message'] = "Operation completed successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['message'] = "Error deleting record";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
} else {
    echo "Error";
}
?>