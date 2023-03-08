<?php
session_start();

include("Connection.php");
$_SESSION['UpdateHotelError'] = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $Hotel_Id = $_GET['updateid'];
    $Hotel_Name = sanitize($_POST['Hotel_Name']);
    $Location = sanitize($_POST['Location']);
    $Description = sanitize($_POST['Description']);
    $Image = sanitize($_POST['Image']);
    $isValid = false;


    $chkHotelname = "SELECT * FROM hotels WHERE Hotel_Name = '$Hotel_Name'";
    $result1 = mysqli_query($con, $chkHotelname);
    $isValid = false;
    $NameValidity = false;

    //check if Name is valid or not
    if (mysqli_num_rows($result1) > 0) {
        $CheckHotel = "select * from hotels where Hotel_Name = '$Hotel_Name' and Hotel_Id = '$Hotel_Id'";
        $result2 = mysqli_query($con, $CheckHotel);
        if (mysqli_num_rows($result2) == 1) {
            $NameValidity = true;
        } else {
            $_SESSION['UpdateHotelError'] = "Hotel Exists";
            header('Location: UpdateHotel.php?updateid=' . $Hotel_Id . '');
            exit();
        }
    } else if (mysqli_num_rows($result1) == 0) {
        $NameValidity = true;
    }
    //checks if fields are filled or not
    if (
        empty($Hotel_Name) && empty($Location)
    ) {
        $_SESSION['UpdateHotelError'] = "Please some valid information";
        header('Location: UpdateHotel.php?updateid=' . $Hotel_Id . '');
        exit();

    } else if (empty($Hotel_Name)) {
        $_SESSION['UpdateHotelError'] = "Please insert Hotel name";
        header('Location: UpdateHotel.php?updateid=' . $Hotel_Id . '');
        exit();
    } else if (empty($Location)) {
        $_SESSION['UpdateHotelError'] = "Please insert Hotels Location";
        header('Location: UpdateHotel.php?updateid=' . $Hotel_Id . '');
        exit();
    } else if (
        !empty($Hotel_Name) && !empty($Location)
    ) {
        $isValid = true;
    }
    //Update database
    if (
        !empty($Hotel_Name) && !empty($Location) && !is_numeric($Hotel_Name) && $isValid === true && $NameValidity === true
    ) {

        $query2 = "UPDATE hotels SET Hotel_Name= '$Hotel_Name', Location='$Location', Description= '$Description', Image='$Image' WHERE Hotel_Id = $Hotel_Id";
        mysqli_query($con, $query2);
        $_SESSION['UpdateHotelError'] = "Updated Successfully";
        header('Location: UpdateHotel.php?updateid=' . $Hotel_Id . '');


    } else if (
        empty($Hotel_Name) || empty($Location) || is_numeric($Hotel_Name) ||
        $isValid === false || $NameValidity === false
    ) {
        $_SESSION['UpdateHotelError'] = "Please enter some valid information!";
        header('Location: UpdateHotel.php?updateid=' . $Hotel_Id . '');
    }
}

function sanitize($data)
{
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}
?>