<?php
session_start();
include("Connection.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $firstName = sanitize($_POST['firstName']);
    $lastName = sanitize($_POST['lastName']);
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);


    $chkUsername = "select * from users where Username = '$username'";
    $result1 = mysqli_query($con, $chkUsername);
    $isValid = false;
    $usernameValidity = false;

    //check if username is valid or not
    if (mysqli_num_rows($result1) > 0) {
        $_SESSION['AddEmpError'] = "Username is taken, try again";
        header("Location: AddEmployee.php");
        exit();
    } else if (mysqli_num_rows($result1) == 0) {
        $usernameValidity = true;
    }
    //checks if fields are filled or not
    if (
        empty($username) && empty($password) && empty($firstName) && empty($lastName)
    ) {
        $_SESSION['AddEmpError'] = "Please some valid information";
        header("Location: AddEmployee.php");
        exit();

    } else if (empty($firstName)) {
        $_SESSION['AddEmpError'] = "Please insert first name";
        header("Location: AddEmployee.php");
        exit();
    } else if (empty($lastName)) {
        $_SESSION['AddEmpError'] = "Please insert last name";
        header("Location: AddEmployee.php");
        exit();
    } else if (empty($username)) {
        $_SESSION['AddEmpError'] = "Please Enter a User Name";
        header("Location: AddEmployee.php");
        exit();
    } else if (empty($password)) {
        $_SESSION['AddEmpError'] = "Password cannot be empty";
        header("Location: AddEmployee.php");
        exit();
    } else if (
        !empty($username) && !empty($password) && !empty($firstName) && !empty($lastName)
    ) {
        $isValid = true;
    }


    if (
        !empty($username) && !empty($password) && !is_numeric($username) && !empty($firstName) && !empty($lastName)
        && $isValid === true && $usernameValidity = true
    ) {
        $insert = "insert into Users (Username,Password,Firstname,Lastname,Role) values ('$username','$password','$firstName','$lastName', 'employee')";
        mysqli_query($con, $insert);
        $_SESSION['AddEmpError'] = "Employee Added Successfully";
        header("Location: AddEmployee.php");
    }
    //  else if (
//     empty($username) || empty($password) || is_numeric($username) || empty($firstName) || empty($lastName) ||
//     $isValid === false || $usernameValidity === false
// ) {
//     $_SESSION['AddEmpError'] = "Please enter some valid information!";
//     header("Location: AddEmployee.php");
// }
}

function sanitize($data)
{
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}
?>