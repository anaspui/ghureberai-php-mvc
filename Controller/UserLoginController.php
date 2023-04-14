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
                if (isset($_POST['remember_me'])) {
                    // Create a cookie that stores the username and password with a long expiration time
                    $expiry_time = time() + (30 * 24 * 60 * 60); // 30 days
                    setcookie('remember_me', "$username:$password", $expiry_time , "/");
                  }
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