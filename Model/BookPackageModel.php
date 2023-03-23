<?php

function Book($User_Id, $Package_Id)
{
    include('Connection.php');
    $query1 = "SELECT * FROM `packages` WHERE `Package_Id` = '$Package_Id'";
    $result = mysqli_query($con, $query1);
    $packages = $result->fetch_assoc();
    $Package_Name = $packages['Name'];
    $Start_Date = $packages['Start_Date'];
    $End_Date = $packages['End_Date'];
    $Price = $packages['Price'];

    //INSERTION
    $query2 = "insert into `bookings`(`Package_Id`, `User_Id`, `Start_Date`, `End_Date`, `Price`) VALUES('$Package_Id', '$User_Id', '$Start_Date', '$End_Date', '$Price')";
    $result2 = mysqli_query($con, $query2);
}

?>