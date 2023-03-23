<?php
function getUserData($username)
{
    require '../Model/Connection.php';
    $query = "select * from users where Username = '$username' limit 1";
    $result = mysqli_query($con, $query);
    $user_data = mysqli_fetch_assoc($result);
    return $user_data;
}
function checkUsername($username)
{
    require '../Model/Connection.php';
    $checkUserName = "select * from users where Username = '$username' limit 1";
    $result = mysqli_query($con, $checkUserName);

    $user_data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1 && $user_data['Username'] == $_SESSION['username']) {
        $isValid = true;
    }
    return true;
}
function passValidity($password)
{
    require '../Model/Connection.php';
    session_start();
    $checkOldPass = "SELECT * FROM users WHERE Username = '" . $_SESSION['username'] . "' AND password = '" . $CurrPassword . "' LIMIT 1; ";
    $result2 = mysqli_query($con, $checkOldPass);
    if (mysqli_num_rows($result2) == 1) {
        return true;
    } else
        return false;
}
function emailValidity()
{
    require '../Model/Connection.php';
    session_start();
    $checkEmail = "SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "' AND email = '" . $_SESSION['email'] . "' LIMIT 1;";
    $result3 = mysqli_query($con, $checkEmail);
    if (mysqli_num_rows($result3) == 1) {
        return true;
    } else
        return false;
}
function Update($data)
{
    require '../Model/Connection.php';
    $query2 = "UPDATE users SET password = '" . $NewPassword . "', Username = '" . $username . "' , Firstname = '" . $data['firstName'] . "', Lastname = '" . $data['lastName'] . "', Dob = '" . $data['dob'] . "', Email = '" . $data['email'] . "', Phone = '" . $data['phone'] . "', Address = '" . $data['address'] . "' WHERE Username = '" . $_SESSION['username'] . "';";
    $result = mysqli_query($con, $query2);
    if ($result) {
        return true;
    }
    return false;
}
?>