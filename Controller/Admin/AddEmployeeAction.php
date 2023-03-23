<?php
session_start();
require('../../Model/Admin/EmployeeModel.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $firstName = sanitize($_POST['firstName']);
    $lastName = sanitize($_POST['lastName']);
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);



    $isValid = false;
    $usernameValidity = false;

    //check if username is valid or not

    if (ValidateEmpName($username) == false) {
        $_SESSION['AddEmpError'] = "Username is taken, try again";
        header("Location: ../../View/Admin/AddEmployee.php");
        exit();
    } else if (ValidateEmpName($username) == true) {
        $usernameValidity = true;
    }
    //checks if fields are filled or not
    if (
        empty($username) && empty($password) && empty($firstName) && empty($lastName)
    ) {
        $_SESSION['AddEmpError'] = "Please some valid information";
        header("Location: ../../View/Admin/AddEmployee.php");
        exit();

    } else if (empty($firstName)) {
        $_SESSION['AddEmpError'] = "Please insert first name";
        header("Location: ../../View/Admin/AddEmployee.php");
        exit();
    } else if (empty($lastName)) {
        $_SESSION['AddEmpError'] = "Please insert last name";
        header("Location: ../../View/Admin/AddEmployee.php");
        exit();
    } else if (empty($username)) {
        $_SESSION['AddEmpError'] = "Please Enter a User Name";
        header("Location: ../../View/Admin/AddEmployee.php");
        exit();
    } else if (empty($password)) {
        $_SESSION['AddEmpError'] = "Password cannot be empty";
        header("Location: ../../View/Admin/AddEmployee.php");
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
        addEmployee($username, $firstName, $lastName, $password);
        $_SESSION['AddEmpError'] = "Employee Added Successfully";
        header("Location: ../../View/Admin/AddEmployee.php");
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