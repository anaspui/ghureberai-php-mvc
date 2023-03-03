<?php
session_start();

include("Connection.php");
$_SESSION['UpdateError'] = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $firstName = sanitize($_POST['firstName']);
    $lastName = sanitize($_POST['lastName']);
    $dob = sanitize($_POST['dob']);
    $email = sanitize($_POST['email']);
    $phone = sanitize($_POST['phone']);
    $address = sanitize($_POST['address']);
    $username = sanitize($_POST['username']);
    $CurrPassword = sanitize($_POST['CurrPassword']);
    $NewPassword = sanitize($_POST['NewPassword']);


    $chkUsername = "select * from users where username = '$username' limit 1";
    $result1 = mysqli_query($con, $chkUsername);
    $chkEmail = "select * from users where email = '$email' limit 1";
    $result2 = mysqli_query($con, $chkEmail);
    $isValid = false;
    if ($result1) {
        $_SESSION['UpdateError'] = "Username is taken, try again";
        header("Location:UpdatePage.php");
        if ($result1 && mysqli_num_rows($result1) === 0) {
            if ($chkEmail) {
                if ($result2 && mysqli_num_rows($result2) === 0) {
                    $chkPassword = "SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "' AND password = '" . $CurrPassword . "' LIMIT 1; ";
                    $passResult = mysqli_query($con, $chkPassword);
                    if ($passResult) {
                        $isValid = true;
                    }
                } else {
                    $_SESSION['UpdateError'] = "Email is taken, try again";
                    header("Location:UpdatePage.php");
                }
            }
        }


    }


    if (
        !empty($username) && !empty($password) && !is_numeric($username) && !empty($firstName) && !empty($lastName) &&
        !empty($dob) && !empty($phone) && !empty($email) && !empty($CurrPassword) && !empty($NewPassword) && $isValid === true
    ) {
        $query2 = "UPDATE users SET password = '" . $NewPassword . "', Username = '" . $username . "' , Firstname = '" . $firstName . "', Lastname = '" . $lastName . "', Dob = '" . $dob . "', Email = '" . $email . "', Phone = $phone, Address = '" . $address . "' WHERE Username = '" . $_SESSION['username'] . "';
        ";
        mysqli_query($con, $query2);
        $_SESSION[$username] = $username;
        header("Location: Profile.php");

    } else if (
        empty($username) || empty($password) || is_numeric($username) || empty($firstName) || empty($lastName) ||
        empty($dob) || empty($phone) || empty($email) || empty($CurrPassword) || empty($NewPassword) || $isValid === false
    ) {
        $_SESSION['UpdateError'] = "Please enter some valid information!";
        header("Location:UpdatePage.php");
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