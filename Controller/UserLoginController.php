<?php
session_start();

require_once("../Model/LoginModel.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['LoginError'] = "";
    if (!empty($username) && !empty($password)) {
        if (!empty($username) && !empty($password)) {
            if (validateUser($username, $password)) {
                $_SESSION['role'] = userType($username);
                header('Location: ../View/Index.php');
            }
        }
    } else if (empty($username) && empty($password)) {
        $_SESSION['LoginError'] = "Please enter your username and password.";
        header('Location: ../View/UserLogin.php');
    } else if (empty($username) || empty($password)) {
        if (empty($username)) {
            $_SESSION['LoginError'] = "Please enter your username";
            header("Location: ../View/UserLogin.php");
            exit();
        }
        if (empty($password)) {
            $_SESSION['LoginError'] = "Please enter your password!";
            header("Location: ../View/UserLogin.php");
            exit();
        }
    }
}


?>