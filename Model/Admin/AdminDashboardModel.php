<?php

function getCustomersNum()
{
    include('../../Model/Connection.php');
    $sql = "SELECT * FROM users Where role = 'customer'";
    $result = mysqli_query($con, $sql);
    $num_rows = mysqli_num_rows($result);
    return $num_rows;
}
function getEmployeesNum()
{
    include('../../Model/Connection.php');
    $sql = "SELECT * FROM users Where role = 'employee'";
    $result = mysqli_query($con, $sql);
    $num_rows = mysqli_num_rows($result);
    return $num_rows;
}
function getHotelsNum()
{
    include('../../Model/Connection.php');
    $sql = "SELECT * FROM hotels";
    $result = mysqli_query($con, $sql);
    $num_rows = mysqli_num_rows($result);
    return $num_rows;
}
function getPackagesNum()
{
    include('../../Model/Connection.php');
    $sql = "SELECT * FROM packages";
    $result = mysqli_query($con, $sql);
    $num_rows = mysqli_num_rows($result);
    return $num_rows;
}
function getTopSellingNum()
{
    include('../../Model/Connection.php');
    $sql = "SELECT * FROM packages WHERE P_sold";
    $result = mysqli_query($con, $sql);
    $num_rows = mysqli_num_rows($result);
    return $num_rows;
}
function getBookingsNum()
{
    include('../../Model/Connection.php');
    $sql = "SELECT * FROM bookings";
    $result = mysqli_query($con, $sql);
    $num_rows = mysqli_num_rows($result);
    return $num_rows;
}
?>