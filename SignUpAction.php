<?php
session_start();

include("Connection.php");

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


    if (empty($firstName)) {
        $_SESSION['RegError'] = "First Name is required";
        header("location:UserSignup.php");
        exit();
    } else if (empty($lastName)) {
        $_SESSION['RegError'] = "Last Name is required";
        header("location:UserSignup.php");
        exit();
    } else if (empty($gender)) {
        $_SESSION['RegError'] = "Gender is required";
        header("location:UserSignup.php");
        exit();
    } else if (empty($dob)) {
        $_SESSION['RegError'] = "Please enter your Date of Birth";
        header("location:UserSignup.php");
        exit();
    } else if (empty($email)) {
        $_SESSION['RegError'] = "Please enter your Email";
        header("location:UserSignup.php");
        exit();
    } else if (empty($phone)) {
        $_SESSION['RegError'] = "Please enter your Phone Number";
        header("location:UserSignup.php");
        exit();
    } else if (empty($username)) {
        $_SESSION['RegError'] = "Username is required";
        header("location:UserSignup.php");
        exit();
    } else if (empty($password)) {
        $_SESSION['RegError'] = "Please enter your Password";
        header("location:UserSignup.php");
        exit();
    } else if (
        empty($username) || empty($password) || is_numeric($username) || is_numeric($firstName) || is_numeric($lastName) ||
        empty($gender) || empty($dob) || !is_numeric($phone) || is_numeric($email)
    ) {
        $_SESSION['RegError'] = "Please enter some valid information!";
        header("location:UserSignup.php");
        exit();
    }
    $chkUsername = "select * from users where username = '$username' limit 1";
    $result1 = mysqli_query($con, $chkUsername);
    $isValid = false;
    //Username and email validation
    if (mysqli_num_rows($result1) > 0) {
        $_SESSION['RegError'] = "Username is taken, try again";
        header("location:UserSignup.php");
        exit();
    } else if ($result1 && mysqli_num_rows($result1) === 0) {
        $chkEmail = "select * from users where email = '$email' limit 1";
        $result2 = mysqli_query($con, $chkEmail);
        if ($chkEmail) {
            if ($result2 && mysqli_num_rows($result2) === 0) {
                $isValid = true;
            } else {
                $_SESSION['RegError'] = "You're already registered.";
                header("location:UserSignup.php");
                exit();
            }
        }
    }

    if (
        !empty($username) && !empty($password) && !is_numeric($username) && !empty($firstName) && !empty($lastName) &&
        !empty($gender) && !empty($dob) && !empty($phone) && !empty($email) && $isValid === true
    ) {
        $query2 = "insert into Users (Username,Password,Firstname,Lastname,Gender,Dob,Email,Phone,Role) values ('$username','$password','$firstName','$lastName','$gender','$dob','$email', '$phone', 'customer')";
        mysqli_query($con, $query2);
        header("Location: UserLogin.php");
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