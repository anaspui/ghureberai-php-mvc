<?php
function checkHotel($Hotel_Name)
{
    include_once('../../Model/Connection.php');
    $CheckHotel = "SELECT * FROM hotels WHERE Hotel_Name = ?";
    $stmt = $con->prepare($CheckHotel);
    $stmt->bind_param("s", $Hotel_Name);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return false;
    } else {
        return true;
    }
}

function insertHotel($Hotel_Name, $Location, $Description, $Img_url, $CurrentTime)
{
    require('../../Model/Connection.php');
    $insert = "INSERT INTO `hotels`(`Hotel_Name`, `Location`, `Description`, `Image`, `Created_at`) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $insert);
    mysqli_stmt_bind_param($stmt, "sssss", $Hotel_Name, $Location, $Description, $Img_url, $CurrentTime);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if ($result) {
        return true;
    }
    return false;
}

function getHotelData($Hotel_Id)
{
    require('../../Model/Connection.php');
    $query = "SELECT * FROM hotels WHERE Hotel_Id = ? LIMIT 1";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $Hotel_Id);
    $stmt->execute();
    $result = $stmt->get_result();
    $hotel_data = $result->fetch_assoc();
    $stmt->close();
    return $hotel_data;
}


function nameValidity($Hotel_Name, $Hotel_Id)
{
    require('../../Model/Connection.php');
    $chkHotelname = "SELECT * FROM hotels WHERE Hotel_Name = ?";
    $stmt = $con->prepare($chkHotelname);
    $stmt->bind_param("s", $Hotel_Name);
    $stmt->execute();
    $result1 = $stmt->get_result();

    if (mysqli_num_rows($result1) > 0) {
        $CheckHotel = "select * from hotels where Hotel_Name = ? and Hotel_Id = ?";
        $stmt = $con->prepare($CheckHotel);
        $stmt->bind_param("si", $Hotel_Name, $Hotel_Id);
        $stmt->execute();
        $result2 = $stmt->get_result();

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

?>