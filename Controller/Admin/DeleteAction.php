<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['role'] !== "admin" && $_SESSION['role'] !== "employee") {
    header('location: ../../View/UserLogin.php');
    exit();
}


if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    include_once('../../Model/Admin/AdminModel.php');
    $result = deleteUser($id);
    // die($_SESSION['role']);
    if ($result) {
        $_SESSION['message'] = "Operation completed successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['message'] = "Error deleting record";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
if (isset($_GET['deleteHotel'])) {
    $id = $_GET['deleteHotel'];
    include_once('../../Model/Admin/AdminModel.php');
    $result = deleteHotel($id);
    if ($result) {
        $_SESSION['message'] = "Operation completed successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['message'] = "Error deleting record";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
if (isset($_GET['deletePack'])) {
    $id = $_GET['deletePack'];
    include_once('../../Model/Admin/AdminModel.php');
    $result = deletePack($id);
    if ($result) {
        $_SESSION['message'] = "Operation completed successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['message'] = "Error deleting record";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>