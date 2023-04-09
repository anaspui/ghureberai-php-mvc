<?php

function Book($User_Id, $Package_Id)
{
    include('Connection.php');

    $query1 = "SELECT * FROM `packages` WHERE `Package_Id` = ?";
    $stmt1 = $con->prepare($query1);
    $stmt1->bind_param("i", $Package_Id);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $packages = $result1->fetch_assoc();
    $Package_Name = $packages['Name'];
    $Start_Date = $packages['Start_Date'];
    $End_Date = $packages['End_Date'];
    $Price = $packages['Price'];
    $stmt1->close();

    // INSERTION
    $query2 = "insert into `bookings`(`Package_Id`, `User_Id`, `Start_Date`, `End_Date`, `Price`) VALUES(?, ?, ?, ?, ?)";
    $stmt2 = $con->prepare($query2);
    $stmt2->bind_param("iisss", $Package_Id, $User_Id, $Start_Date, $End_Date, $Price);
    $stmt2->execute();

    $stmt2->close();
    $con->close();
}

?>