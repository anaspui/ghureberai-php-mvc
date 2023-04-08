<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$_SESSION['UpdateHotelError'] = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $Hotel_Id = $_GET['updateid'];
    $Hotel_Name = sanitize($_POST['Hotel_Name']);
    $Location = sanitize($_POST['Location']);
    $Description = sanitize($_POST['Description']);
    $Image = sanitize($_POST['Image']);
    $date = new DateTime();
    $CurrentTime = $date->format('Y-m-d H:i:s');
    $isValid = false;
    $NameValidity = false;

    include_once('../../Model/Admin/HotelModel.php');
    $result = nameValidity($Hotel_Name, $Hotel_Id);
    //check if Hotel Name is valid or not
    if ($result) {
        $NameValidity = true;
    } else {
        $_SESSION['UpdateHotelError'] = "Hotel Exists";
        header('Location: ../../View/Admin/UpdateHotel.php?updateid=' . $Hotel_Id . '');
        exit();
    }

    //checks if fields are filled or not
    if (
        empty($Hotel_Name) && empty($Location)
    ) {
        $_SESSION['UpdateHotelError'] = "Please some valid information";
        header('Location: ../../View/Admin/UpdateHotel.php?updateid=' . $Hotel_Id . '');
        exit();
    } else if (empty($Hotel_Name)) {
        $_SESSION['UpdateHotelError'] = "Please insert Hotel name";
        header('Location: ../../View/Admin/UpdateHotel.php?updateid=' . $Hotel_Id . '');
        exit();
    } else if (empty($Location)) {
        $_SESSION['UpdateHotelError'] = "Please insert Hotels Location";
        header('Location: ../../View/Admin/UpdateHotel.php?updateid=' . $Hotel_Id . '');
        exit();
    } else if (
        !empty($Hotel_Name) && !empty($Location)
    ) {
        $isValid = true;
    }
    //Update database
    if (
        !empty($Hotel_Name) && !empty($Location) && !is_numeric($Hotel_Name) && !is_numeric($Location) && $isValid === true && $NameValidity === true
    ) {

        // $query2 = "UPDATE hotels SET Hotel_Name= '$Hotel_Name', Location='$Location', Description= '$Description', Image='$Image', Created_at='$CurrentTime' WHERE Hotel_Id = '$Hotel_Id'";
        // mysqli_query($con, $query2);
        // die(mysqli_error($con));
        include_once('../../Model/Admin/HotelModel.php');
        $result = updateHotel($Hotel_Name, $Hotel_Id, $Description, $Location, $Image, $CurrentTime);
        if ($result) {
            $_SESSION['UpdateHotelError'] = "Updated Successfully";
            header('Location: ../../View/Admin/UpdateHotel.php?updateid=' . $Hotel_Id . '');
        } else {
            $_SESSION['UpdateHotelError'] = "Something Went Wrong";
            header('Location: ../../View/Admin/UpdateHotel.php?updateid=' . $Hotel_Id . '');
        }
    } else if (
        empty($Hotel_Name) || empty($Location) || is_numeric($Hotel_Name) ||
        $isValid === false || $NameValidity === false
    ) {
        $_SESSION['UpdateHotelError'] = "Please enter some valid information!";
        header('Location: ../../View/Admin/UpdateHotel.php?updateid=' . $Hotel_Id . '');
    }
}

function sanitize($data)
{
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}
function getHotel($Hotel_Id)
{
    include_once('../../Model/Admin/HotelModel.php');
    $result = getHotelData($Hotel_Id);
    return $result;
}