<?php
session_start();

require_once("../Model/Connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_SESSION['RegError'] = "";
    $firstName = sanitize($_POST['firstName']);
    $lastName = sanitize($_POST['lastName']);
    $gender = isset($_POST['gender']) ? sanitize($_POST['gender']) : "";
    $dob = sanitize($_POST['dob']);
    $email = sanitize($_POST['email']);
    $phone = sanitize($_POST['phone']);
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);
    $numFormat = "/^(\+?88)?01[3-9]\d{8}$/";
    $usernameFormat = "/^[a-zA-Z0-9_-]{4,16}$/";





    if (
        empty($username) && empty($password) && empty($firstName) && empty($lastName) &&
        empty($gender) && empty($dob) && empty($phone) && empty($email)
    ) {
        $_SESSION['fnameError'] = "First Name is required";
        $_SESSION['lnameError'] = "Last Name is required";
        $_SESSION['genderError'] = "Gender is required";
        $_SESSION['dobError'] = "Please enter your Date of Birth";
        $_SESSION['emailError'] = "Please enter your Email";
        $_SESSION['phnError'] = "Please enter your Phone Number";
        $_SESSION['usernameError'] = "Username is required";
        $_SESSION['passError'] = "Please enter your Password";
        header("location: ../View/UserSignup.php");
        exit();
    } else if (empty($firstName)) {
        $_SESSION['fnameError'] = "First Name is required";
        header("location: ../../View/UserSignup.php");
        exit();
    } else if (empty($lastName)) {
        $_SESSION['lnameError'] = "Last Name is required";
        header("location: ../View/UserSignup.php");
        exit();
    } else if (empty($gender)) {
        $_SESSION['genderError'] = "Gender is required";
        header("location: ../View/UserSignup.php");
        exit();
    } else if (empty($dob)) {
        $_SESSION['dobError'] = "Please enter your Date of Birth";
        header("location: ../View/UserSignup.php");
        exit();
    } else if (empty($email)) {
        $_SESSION['emailError'] = "Please enter your Email";
        header("location: ../View/UserSignup.php");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emailError'] = "Invalid email format";
        header("location: ../View/UserSignup.php");
        exit();
    } else if (empty($phone)) {
        $_SESSION['phnError'] = "Please enter your Phone Number";
        header("location: ../View/UserSignup.php");
        exit();
    } else if (!preg_match($numFormat, $phone)) {
        $_SESSION['phnError'] = "Invalid phone number";
        header("location: ../View/UserSignup.php");
        exit();
    } else if (empty($username)) {
        $_SESSION['usernameError'] = "Username is required";
        header("location: ../View/UserSignup.php");
        exit();
    } else if (!preg_match($usernameFormat, $username)) {
        $_SESSION['usernameError'] = "Invalid User Name!";
        header("location: ../View/UserSignup.php");
        exit();
    } else if (empty($password)) {
        $_SESSION['passError'] = "Please enter your Password";
        header("location: ../View/UserSignup.php");
        exit();
    } else if (
        empty($username) || empty($password) || is_numeric($username) || is_numeric($firstName) || is_numeric($lastName) ||
        empty($gender) || empty($dob) || !is_numeric($phone) || is_numeric($email)
    ) {
        $_SESSION['RegError'] = "Please enter some valid information!";
        header("location: ../View/UserSignup.php");
        exit();
    }
    $chkUsername = "select * from users where username = '$username' limit 1";
    $result1 = mysqli_query($con, $chkUsername);
    $isValid = false;
    //Username and email validation
    if (mysqli_num_rows($result1) > 0) {
        $_SESSION['usernameError'] = "Username is taken, try again";
        header("location: ../View/UserSignup.php");
        exit();
    } else if ($result1 && mysqli_num_rows($result1) === 0) {
        $chkEmail = "select * from users where email = '$email' limit 1";
        $result2 = mysqli_query($con, $chkEmail);
        if ($chkEmail) {
            if ($result2 && mysqli_num_rows($result2) === 0) {
                $isValid = true;
            } else {
                $_SESSION['RegError'] = "You're already registered.";
                header("location: ../View/UserSignup.php");
                exit();
            }
        }
    }

    if (
        !empty($username) && !empty($password) && !is_numeric($username) && !empty($firstName) && !empty($lastName) &&
        !empty($gender) && !empty($dob) && !empty($phone) && !empty($email) && $isValid === true
    ) {
        $query2 = "insert into Users (Username,Password,Firstname,Lastname,Gender,Dob,Email,Phone,Role,Picture) values ('$username','$password','$firstName','$lastName','$gender','$dob','$email', '$phone', 'customer', 'images/default.jpeg')";
        mysqli_query($con, $query2);
        header("Location: ../View/UserLogin.php");
    } else if (
        empty($username) || empty($password) || is_numeric($username) || empty($firstName) || empty($lastName) ||
        empty($gender) || empty($dob) || empty($phone) || empty($email) || $isValid === false
    ) {
        $_SESSION['RegError'] = "Please enter some valid information!";
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