<?php
function getUserData($username) {
    require('../Model/Connection.php');
    $query = "SELECT * FROM users WHERE Username = ? LIMIT 1;";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $con->close();

    $user_data = $result->fetch_assoc();
    return $user_data;
}

function checkUsername($username) {
    require('../Model/Connection.php');
    $checkUserName = "SELECT * FROM users WHERE Username = ? LIMIT 1;";
    $stmt = $con->prepare($checkUserName);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $con->close();

    $user_data = $result->fetch_assoc();
    if ($result->num_rows == 1 && $user_data['Username'] == $_SESSION['username']) {
        return true;
    } else if ($result->num_rows == 1 && $user_data['Username'] != $_SESSION['username']) {
        return false;
    }
    return true;
}

function passValidity($password) {
    require('../Model/Connection.php');
    session_start();
    $checkOldPass = "SELECT * FROM users WHERE Username = ? AND password = ? LIMIT 1; ";
    $stmt = $con->prepare($checkOldPass);
    $stmt->bind_param("ss", $_SESSION['username'], $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $con->close();
    if ($result->num_rows == 1) {
        return true;
    } else {
        return false;
    }
}

function emailValidity() {
    require('../Model/Connection.php');
    session_start();
    $checkEmail = "SELECT * FROM users WHERE username = ? AND email = ? LIMIT 1;";
    $stmt = $con->prepare($checkEmail);
    $stmt->bind_param("ss", $_SESSION['username'], $_SESSION['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $con->close();
    if ($result->num_rows == 1) {
        return true;
    } else {
        return false;
    }
}

function Update($data) {
    require('../Model/Connection.php');
    $query = "UPDATE users SET password = ?, Username = ?, Firstname = ?, Lastname = ?, Dob = ?, Email = ?, Phone = ?, Address = ? WHERE Username = ?";

    $stmt = $con->prepare($query);

    $stmt->bind_param("sssssssss", $data['NewPassword'], $data['username'], $data['firstName'], $data['lastName'], $data['dob'], $data['email'], $data['phone'], $data['address'], $_SESSION['username']);

    $result = $stmt->execute();

    $stmt->close();
    $con->close();
    if ($result) {
        return true;
    }
    return false;
}

?>