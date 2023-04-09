<?php
function getUserData($username)
{
    require('../Model/Connection.php');
    $query = "select * from users where Username = '$username' limit 1";
    $result = mysqli_query($con, $query);
    $user_data = mysqli_fetch_assoc($result);
    return $user_data;
}
function checkUsername($username)
{
    require('../Model/Connection.php');
    $checkUserName = "select * from users where Username = '$username' limit 1";
    $result = mysqli_query($con, $checkUserName);

    $user_data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1 && $user_data['Username'] == $_SESSION['username']) {
        return true;
    }
    else if (mysqli_num_rows($result) == 1 && $user_data['Username'] != $_SESSION['username']) {
        return false;
    }
    return true;
}
function passValidity($password)
{
    require('../Model/Connection.php');
    session_start();
    $checkOldPass = "SELECT * FROM users WHERE Username = '" . $_SESSION['username'] . "' AND password = '" . $password . "' LIMIT 1; ";
    $result2 = mysqli_query($con, $checkOldPass);
    if (mysqli_num_rows($result2) == 1) {
        return true;
    } else
        return false;
}
function emailValidity()
{
    require('../Model/Connection.php');
    session_start();
    $checkEmail = "SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "' AND email = '" . $_SESSION['email'] . "' LIMIT 1;";
    $result3 = mysqli_query($con, $checkEmail);
    if (mysqli_num_rows($result3) == 1) {
        return true;
    } else
        return false;
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