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
    $isValid = false;
    $passValid = false;
    $emailValid = false;

    //for checking username
    $checkUserName = "select * from users where Username = '$username' limit 1";
    $result1 = mysqli_query($con, $checkUserName);

    $user_data = mysqli_fetch_assoc($result1);
    if (mysqli_num_rows($result1) == 1 && $user_data['Username'] == $_SESSION['username']) {
        $isValid = true;
    }
    //for checking old password
    $checkOldPass = "SELECT * FROM users WHERE Username = '" . $_SESSION['username'] . "' AND password = '" . $CurrPassword . "' LIMIT 1; ";
    $result2 = mysqli_query($con, $checkOldPass);
    if (mysqli_num_rows($result2) == 1) {
        $passValid = true;
    }
    //for checking email
    $checkEmail = "SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "' AND email = '" . $_SESSION['email'] . "' LIMIT 1;";
    $result3 = mysqli_query($con, $checkEmail);
    if (mysqli_num_rows($result3) == 1) {
        $emailValid = true;
    }

    if (
        !empty($username) && !empty($NewPassword) && !is_numeric($username) && !empty($firstName) && !empty($lastName) &&
        !empty($dob) && !empty($phone) && !empty($email) && !empty($CurrPassword) && $isValid === true && $passValid === true && $emailValid === true
    ) {
        $query2 = "UPDATE users SET password = '" . $NewPassword . "', Username = '" . $username . "' , Firstname = '" . $firstName . "', Lastname = '" . $lastName . "', Dob = '" . $dob . "', Email = '" . $email . "', Phone = $phone, Address = '" . $address . "' WHERE Username = '" . $_SESSION['username'] . "';";
        mysqli_query($con, $query2);
        $_SESSION['username'] = $username;
        header("Location: Profile.php");

    } else if (
        empty($username) || empty($NewPassword) || is_numeric($username) || empty($firstName) || empty($lastName) ||
        empty($dob) || empty($phone) || empty($email) || empty($CurrPassword) || $isValid === false || $passValid === false || $email === false
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