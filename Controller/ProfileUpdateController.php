<?php
$_SESSION['UpdateError'] = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $data = array(
        'firstName' => sanitize($_POST['firstName']),
        'lastName' => sanitize($_POST['lastName']),
        'dob' => sanitize($_POST['dob']),
        'email' => sanitize($_POST['email']),
        'phone' => sanitize($_POST['phone']),
        'address' => sanitize($_POST['address']),
        'username' => sanitize($_POST['username']),
        'CurrPassword' => sanitize($_POST['CurrPassword']),
        'NewPassword' => sanitize($_POST['NewPassword'])
    );

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
    include('../Model/ProfileModel.php');
    //for checking username
    if (checkUsername($data['username'])) {
        $isValid = true;
    }
    //for checking old password
    if (passValidity($data['CurrPassword'])) {
        $passValid = true;
    }
    //for checking email
    if (emailValidity()) {
        $emailValid = true;
    }

    if (
        !empty($username) && !empty($NewPassword) && !is_numeric($username) && !empty($firstName) && !empty($lastName) &&
        !empty($dob) && !empty($phone) && !empty($email) && !empty($CurrPassword) && $isValid === true && $passValid === true && $emailValid === true
    ) {
        $result = Update($data);
        if ($result) {
            $_SESSION['username'] = $username;
            header("Location: ../View/Profile.php");
        }


    } else if (
        empty($username) || empty($NewPassword) || is_numeric($username) || empty($firstName) || empty($lastName) ||
        empty($dob) || empty($phone) || empty($email) || empty($CurrPassword) || $isValid === false || $passValid === false || $email === false
    ) {
        session_start();
        $_SESSION['UpdateError'] = "Please enter some valid information!";
        header("Location: ../View/ProfileUpdate.php");
    }
}

function sanitize($data)
{
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}



function UserData()
{
    if (isset($_SESSION['username'])) {
        require('../Model/ProfileModel.php');
        $user_data = getUserData($_SESSION['username']);
        return $user_data;
    } else {
        header('location: Index.php');
    }
}
?>