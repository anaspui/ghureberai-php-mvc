<?php
session_start();
// var_dump($_SESSION);
include('Connection.php');
$Package_Id = $_GET['Package_Id'];
if (isset($_SESSION['User_Id'])) {
    $User_Id = $_SESSION['User_Id'];
    // echo "Package_Id: $Package_Id<br>";
    // echo "User_Id: $User_Id <br>";
    $query1 = "SELECT * FROM `packages` WHERE `Package_Id` = '$Package_Id'";
    $result = mysqli_query($con, $query1);
    $packages = $result->fetch_assoc();
    $Package_Name = $packages['Name'];
    $Start_Date = $packages['Start_Date'];
    $End_Date = $packages['End_Date'];
    $Price = $packages['Price'];

    $query2 = "insert into `bookings`(`Package_Id`, `User_Id`, `Start_Date`, `End_Date`, `Price`) VALUES('$Package_Id', '$User_Id', '$Start_Date', '$End_Date', '$Price')";
    $result2 = mysqli_query($con, $query2);
    if ($result2) {
        header('location: Packages.php');
    } else {
        header('location: Packages.php');
    }
} else {
    setcookie('Saved', $Package_Id, time() + (86400 * 30));
    header('location: MyBookings.php');
}
?>