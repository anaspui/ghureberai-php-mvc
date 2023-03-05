<?php
session_start();



include("Connection.php");
$_SESSION['AddEmpError'] = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $firstName = sanitize($_POST['firstName']);
    $lastName = sanitize($_POST['lastName']);
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);


    $chkUsername = "select * from users where username = '$username' limit 1";
    $result1 = mysqli_query($con, $chkUsername);
    $isValid = false;
    if ($chkUsername) {
        $_SESSION['AddEmpError'] = "Username is taken, try again";
        if ($result1 && mysqli_num_rows($result1) === 0) {
            $isValid = true;
        } else {
            $_SESSION['AddEmpError'] = "You're already registered.";
            header("Location: AddEmployee.php");
        }

    }

    if (
        !empty($username) && !empty($password) && !is_numeric($username) && !empty($firstName) && !empty($lastName)
        && $isValid === true
    ) {
        $query2 = "insert into Users (Username,Password,Firstname,Lastname,Role) values ('$username','$password','$firstName','$lastName', 'employee')";
        mysqli_query($con, $query2);
        header("Location: AddEmployee.php");
        die;
    } else if (
        empty($username) || empty($password) || is_numeric($username) || empty($firstName) || empty($lastName) ||
        $isValid === false
    ) {
        $_SESSION['AddEmpError'] = "Please enter some valid information!";
        header("Location: AddEmployee.php");
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