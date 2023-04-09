<?php

function getCustomersNum()
{
    include('../../Model/Connection.php');
    $sql = "SELECT * FROM users Where role = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $role);
    $role = "customer";
    $stmt->execute();
    $result = $stmt->get_result();
    $num_rows = $result->num_rows;
    $stmt->close();
    return $num_rows;
}
function getEmployeesNum()
{
    include('../../Model/Connection.php');
    $sql = "SELECT * FROM users Where role = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $role);
    $role = "employee";
    $stmt->execute();
    $result = $stmt->get_result();
    $num_rows = $result->num_rows;
    $stmt->close();
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
function getHotel()
{
    include('../../Model/Connection.php');
    $sql = "SELECT * FROM hotels";
    $result = mysqli_query($con, $sql);
    return $result;
}
function getTopSellings()
{
    include('../../Model/Connection.php');
    $sql = "SELECT * FROM packages WHERE P_sold ORDER BY P_sold DESC LIMIT 10;";
    $result = mysqli_query($con, $sql);
    return $result;
}
function getBooking()
{
    include('../../Model/Connection.php');
    $sql = "SELECT bookings.*, packages.Name, users.Username
            FROM bookings
            LEFT JOIN packages ON bookings.package_id = packages.package_id
            LEFT JOIN users ON bookings.User_Id = users.User_Id;";
    $result = mysqli_query($con, $sql);
    return $result;
}
?>