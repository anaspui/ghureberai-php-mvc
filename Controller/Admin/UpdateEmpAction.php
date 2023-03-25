<?php
session_start();

include("../../Model/Connection.php");
$_SESSION['UpdateEmpError'] = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $userid = $_GET['updateid'];
    $firstName = sanitize($_POST['firstName']);
    $lastName = sanitize($_POST['lastName']);
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);
    $isValid = false;



    $usernameValidity = false;
    require('../../Model/Admin/EmployeeModel.php');
    //check if username is valid or not
    if (userValidity($username, $userid)) {
        $usernameValidity = true;
    } else {
        $_SESSION['UpdateEmpError'] = "Username is taken, try again";
        header('Location: ../../View/Admin/UpdateEmployee.php?updateid=' . $userid . '');
        exit();
    }

    if (
        empty($username) && empty($password) && empty($firstName) && empty($lastName)
    ) {
        $_SESSION['UpdateEmpError'] = "Please some valid information";
        header('Location: ../../View/Admin/UpdateEmployee.php?updateid=' . $userid . '');
        exit();

    } else if (empty($firstName)) {
        $_SESSION['UpdateEmpError'] = "Please insert first name";
        header('Location: ../../View/Admin/UpdateEmployee.php?updateid=' . $userid . '');
        exit();
    } else if (empty($lastName)) {
        $_SESSION['UpdateEmpError'] = "Please insert last name";
        header('Location: ../../View/Admin/UpdateEmployee.php?updateid=' . $userid . '');
        exit();
    } else if (empty($username)) {
        $_SESSION['UpdateEmpError'] = "Please Enter a User Name";
        header('Location: ../../View/Admin/UpdateEmployee.php?updateid=' . $userid . '');
        exit();
    } else if (empty($password)) {
        $_SESSION['UpdateEmpError'] = "Password cannot be empty";
        header('Location: ../../View/Admin/UpdateEmployee.php?updateid=' . $userid . '');
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
        require('../../Model/Admin/EmployeeModel.php');
        if (update($username, $password, $firstName, $lastName, $userid)) {
            $_SESSION['UpdateEmpError'] = "Updated Successfully";
            header('Location: ../../View/Admin/UpdateEmployee.php?updateid=' . $userid . '');

        }

    } else if (
        empty($username) || empty($password) || is_numeric($username) || empty($firstName) || empty($lastName) ||
        $isValid === false || $usernameValidity === false
    ) {
        $_SESSION['UpdateEmpError'] = "Please enter some valid information!";
        header('Location: ../../View/Admin/UpdateEmployee.php?updateid=' . $userid . '');
    }
}

function sanitize($data)
{
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}

function userType()
{
    if ($_SESSION['role'] !== "admin" && $_SESSION['role'] !== "employee") {
        header('location: ../../View/UserLogin.php');
        exit();
    }
}
function EmpData($updateid)
{
    require('../../Model/Admin/EmployeeModel.php');

    $userid = $updateid;
    $user_data = getEmpData($userid);
    return $user_data;

}
?>