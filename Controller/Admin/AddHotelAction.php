<?php
session_start();
// include("Connection.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $Hotel_Name = sanitize($_POST['Hotel_Name']);
    $Location = sanitize($_POST['Location']);
    $Description = sanitize($_POST['Description']);
    $Img_url = sanitize($_POST['Image']);
    $now = new DateTime();
    $CurrentTime = $now->format('Y-m-d H:i:s');

    //Moved to Model
    // $CheckHotel = "SELECT * FROM hotels WHERE Hotel_Name = '" . $Hotel_Name . "'";
    // $result = mysqli_query($con, $CheckHotel);
    require_once('../../Model/Admin/HotelModel.php');
    $result = checkHotel($Hotel_Name);
    $isValid = false;
    $HotelNameValid = false;
    //Get from model
    if (!$result) {
        $_SESSION['AddHotelError'] = "This Hotel already exists";
        header("Location: ../../View/Admin/AddHotel.php");
        exit();
    } else {
        $HotelNameValid = true;
    }

    //checks if fields are filled or not
    if (
        empty($Hotel_Name) && empty($Location)
    ) {
        $_SESSION['AddHotelError'] = "Please fill all the required fields";
        header("Location: ../../View/Admin/AddHotel.php");
        exit();
    } else if (empty($Hotel_Name)) {
        $_SESSION['AddHotelError'] = "Hotel Name cannot be empty";
        header("Location: ../../View/Admin/AddHotel.php");
        exit();
    } else if (empty($Location)) {
        $_SESSION['AddHotelError'] = "Location cannot be empty";
        header("Location: ../../View/Admin/AddHotel.php");
        exit();
    } else if (
        !empty($Hotel_Name) && !empty($Location)
    ) {
        $isValid = true;
    }


    if (
        !empty($Hotel_Name) && !is_numeric($Hotel_Name) && !empty($Location) && !is_numeric($Location)
        && $isValid === true && $HotelNameValid == true
    ) {
        //Call Model
        $result = insertHotel($Hotel_Name, $Location, $Description, $Img_url, $CurrentTime);
        if ($result) {
            $_SESSION['AddHotelError'] = "Hotel Added Successfully";
            header("Location: ../../View/Admin/AddHotel.php");
        }
    }
}

function sanitize($data)
{
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}