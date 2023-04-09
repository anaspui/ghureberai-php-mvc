<?php
function checkHotel($Hotel_Name)
{
    include_once('../../Model/Connection.php');
    $CheckHotel = "SELECT * FROM hotels WHERE Hotel_Name = '" . $Hotel_Name . "'";
    $result = mysqli_query($con, $CheckHotel);
    if (mysqli_num_rows($result) > 0) {
        return false;
    } else {
        return true;
    }
}
function insertHotel($Hotel_Name, $Location, $Description, $Img_url, $CurrentTime)
{
    require('../../Model/Connection.php');
    $insert = "INSERT INTO `hotels`(`Hotel_Name`, `Location`, `Description`, `Image`, `Created_at`) VALUES ('$Hotel_Name', '$Location', '$Description', '$Img_url', '$CurrentTime');";
    $result = mysqli_query($con, $insert);
    if ($result) {
        return true;
    }
    return false;
}
function getHotelData($Hotel_Id)
{
    require('../../Model/Connection.php');
    $query = "select * from hotels where Hotel_Id = '$Hotel_Id' limit 1";
    $result = mysqli_query($con, $query);
    $hotel_data = mysqli_fetch_assoc($result);
    return $hotel_data;
}

function nameValidity($Hotel_Name, $Hotel_Id)
{
    require('../../Model/Connection.php');
    $chkHotelname = "SELECT * FROM hotels WHERE Hotel_Name = '$Hotel_Name'";
    $result1 = mysqli_query($con, $chkHotelname);

    if (mysqli_num_rows($result1) > 0) {
        $CheckHotel = "select * from hotels where Hotel_Name = '$Hotel_Name' and Hotel_Id = '$Hotel_Id'";
        $result2 = mysqli_query($con, $CheckHotel);
        if (mysqli_num_rows($result2) == 1) {
            return true;
        } else {
            return false;
        }
    } else if (mysqli_num_rows($result1) == 0) {
        return true;
    }
}

function updateHotel($Hotel_Name, $Hotel_Id, $Description, $Location, $Image, $CurrentTime)
{
    require('../../Model/Connection.php');
    $query2 = "UPDATE hotels SET Hotel_Name= '$Hotel_Name', Location='$Location', Description= '$Description', Image='$Image', Created_at='$CurrentTime' WHERE Hotel_Id = '$Hotel_Id'";
    $result = mysqli_query($con, $query2);
    return $result;
}
