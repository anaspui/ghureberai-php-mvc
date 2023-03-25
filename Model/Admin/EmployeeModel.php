<?php

if (!function_exists('ValidateEmpName')) {
    function ValidateEmpName($username)
    {
        include('../../Model/Connection.php');
        $chkUsername = "select * from users where Username = '$username'";
        $result1 = mysqli_query($con, $chkUsername);
        if (mysqli_num_rows($result1) > 0) {
            return false;
        } else if (mysqli_num_rows($result1) == 0) {
            return true;
        }
    }
}
if (!function_exists('addEmployee')) {
    function addEmployee($username, $firstName, $lastName, $password)
    {
        include('../../Model/Connection.php');
        $insert = "insert into Users (Username,Password,Firstname,Lastname,Role) values ('$username','$password','$firstName','$lastName', 'employee')";
        mysqli_query($con, $insert);
    }
}
if (!function_exists('viewEmployee')) {
    function viewEmployee()
    {
        include('../../Model/Connection.php');
        $sql = "SELECT * FROM users WHERE role = 'employee'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            // $row = $result->fetch_assoc();
            return $result;
        }
        return 0;
    }
}
if (!function_exists('getEmpData')) {
    function getEmpData($userid)
    {
        include('../../Model/Connection.php');
        $query = "select * from users where User_Id = '$userid' limit 1";
        $result = mysqli_query($con, $query);
        $user_data = mysqli_fetch_assoc($result);
        return $user_data;
    }
}
if (!function_exists('userValidity')) {
    function userValidity($username, $userid)
    {
        include('../../Model/Connection.php');
        $chkUsername = "select * from users where Username = '$username'";
        $result1 = mysqli_query($con, $chkUsername);
        if (mysqli_num_rows($result1) > 0) {
            $chkUsername2 = "select * from users where Username = '$username' and User_Id = '$userid'";
            $result2 = mysqli_query($con, $chkUsername2);
            if (mysqli_num_rows($result1) == 1) {
                return true;
            } else {
                return false;
            }
        } else if (mysqli_num_rows($result1) == 0) {
            return true;
        }
    }
}
if (!function_exists('update')) {
    function update($username, $password, $firstName, $lastName, $userid)
    {
        include('../../Model/Connection.php');
        $query2 = "UPDATE users SET Username= '$username', Password='$password', firstName= '$firstName', Lastname='$lastName' WHERE User_Id = $userid";
        $result = mysqli_query($con, $query2);
        if ($result) {
            return true;
        }
    }
}
?>