<?php
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
function addEmployee($username, $firstName, $lastName, $password)
{
    include('../../Model/Connection.php');
    $insert = "insert into Users (Username,Password,Firstname,Lastname,Role) values ('$username','$password','$firstName','$lastName', 'employee')";
    mysqli_query($con, $insert);
}
?>