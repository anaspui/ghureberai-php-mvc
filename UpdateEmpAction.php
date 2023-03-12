<?php
session_start();

include("Connection.php");
$_SESSION['UpdateEmpError'] = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $userid = $_GET['updateid'];
    $firstName = sanitize($_POST['firstName']);
    $lastName = sanitize($_POST['lastName']);
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);
    $isValid = false;


    $chkUsername = "select * from users where Username = '$username'";
    $result1 = mysqli_query($con, $chkUsername);
    $isValid = false;
    $usernameValidity = false;

    //check if username is valid or not
    if (mysqli_num_rows($result1) > 0) {
        $chkUsername2 = "select * from users where Username = '$username' and User_Id = '$userid'";
        $result2 = mysqli_query($con, $chkUsername2);
        if (mysqli_num_rows($result1) == 1) {
            $usernameValidity = true;
        } else {
            $_SESSION['UpdateEmpError'] = "Username is taken, try again";
            header('Location: UpdateEmployee.php?updateid=' . $userid . '');
            exit();
        }
    } else if (mysqli_num_rows($result1) == 0) {
        $usernameValidity = true;
    }

    /////***********************************************////// /////***********************************************////// 
    //old code
    //checks if fields are filled or not
    if (
        empty($username) && empty($password) && empty($firstName) && empty($lastName)
    ) {
        $_SESSION['UpdateEmpError'] = "Please some valid information";
        header('Location: UpdateEmployee.php?updateid=' . $userid . '');
        exit();

    } else if (empty($firstName)) {
        $_SESSION['UpdateEmpError'] = "Please insert first name";
        header('Location: UpdateEmployee.php?updateid=' . $userid . '');
        exit();
    } else if (empty($lastName)) {
        $_SESSION['UpdateEmpError'] = "Please insert last name";
        header('Location: UpdateEmployee.php?updateid=' . $userid . '');
        exit();
    } else if (empty($username)) {
        $_SESSION['UpdateEmpError'] = "Please Enter a User Name";
        header('Location: UpdateEmployee.php?updateid=' . $userid . '');
        exit();
    } else if (empty($password)) {
        $_SESSION['UpdateEmpError'] = "Password cannot be empty";
        header("Location: UpdateEmployee.php?updateid=$userid");
        exit();
    } else if (
        !empty($username) && !empty($password) && !empty($firstName) && !empty($lastName)
    ) {
        $isValid = true;
    }
    //Update database
    if (
        !empty($username) && !empty($password) && !is_numeric($username) && !empty($firstName) && !empty($lastName) && $isValid === true && $usernameValidity === true
    ) {

        $query2 = "UPDATE users SET Username= '$username', Password='$password', firstName= '$firstName', Lastname='$lastName' WHERE User_Id = $userid";
        mysqli_query($con, $query2);
        $_SESSION['UpdateEmpError'] = "Updated Successfully";
        header('Location: UpdateEmployee.php?updateid=' . $userid . '');


    } else if (
        empty($username) || empty($password) || is_numeric($username) || empty($firstName) || empty($lastName) ||
        $isValid === false || $usernameValidity === false
    ) {
        $_SESSION['UpdateEmpError'] = "Please enter some valid information!";
        header('Location: UpdateEmployee.php?updateid=' . $userid . '');
    }
}

function sanitize($data)
{
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}
?>