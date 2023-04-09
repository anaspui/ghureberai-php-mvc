<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// $_SESSION['UpdateError'] = "";

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
    if (checkUsername($data['username']) == true) {
        $isValid = true;
    }else{
        $_SESSION['UpdateError'] = "Username is taken, try again.";
        header("Location: ../View/ProfileUpdate.php");
        exit();
    }
    //for checking old password
    if (passValidity($data['CurrPassword']) == true) {
        $passValid = true;
    }else{
        $_SESSION['UpdateError'] = "Incorrect password";
        header("Location: ../View/ProfileUpdate.php");
        exit();
    }
    //for checking email
    if (emailValidity()) {
        $emailValid = true;
    }

    if (
        !empty($data['username']) && !empty($data['NewPassword']) && !is_numeric($data['username']) &&
        !empty($data['firstName']) && !empty($data['lastName']) && !empty($data['dob']) &&
        !empty($data['phone']) && !empty($data['email']) && !empty($data['CurrPassword']) &&
        $isValid === true && $passValid === true && $emailValid === true
    ) {
        $result = Update($data);
        if ($result) {
            $_SESSION['username'] = $username;
            header("Location: ../View/Profile.php");
        }
        // var_dump($data);


    } else if (
        empty($data['username']) || empty($data['NewPassword']) || is_numeric($data['username']) ||
        empty($data['firstName']) || empty($data['lastName']) || empty($data['dob']) ||
        empty($data['phone']) || empty($data['email']) || empty($data['CurrPassword']) ||
        $isValid === false || $passValid === false || $emailValid === false
    ) {
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