<?php
session_start();
include("Connection.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $Name = sanitize($_POST['Name']);
    $Hotel_Name = sanitize($_POST['Hotel_Name']);
    $Description = sanitize($_POST['Description']);
    $Price = sanitize($_POST['Price']);
    $Days = sanitize($_POST['Days']);
    $P_left = sanitize($_POST['TotalPackages']);
    $Start_Date = sanitize($_POST['Start_Date']);
    $End_Date = date('Y-m-d', strtotime($Start_Date . ' + ' . $Days . ' days'));
    $Img_url = sanitize($_POST['img']);
    $now = new DateTime();
    $CurrentTime = $now->format('Y-m-d H:i:s');


    $chkPkgName = "SELECT * FROM packages WHERE Name = '" . $Name . "'";
    $result = mysqli_query($con, $chkPkgName);

    // Check if the query executed successfully
    // if ($result === false) {
    //     die("Error executing query: " . mysqli_error($con));
    // }

    $isValid = false;
    $pkgNameValidity = false;

    // Check if Name is valid or not
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['CreatePkgError'] = "This Package Name already exists";
        header("Location: CreatePackage.php");
        exit();
    } else {
        $pkgNameValidity = true;
    }

    //checks if fields are filled or not
    if (
        empty($Hotel_Name) && empty($Name) && empty($Price) && empty($Days) && empty($P_left)
    ) {
        $_SESSION['CreatePkgError'] = "Please fill all the required fields";
        header("Location: CreatePackage.php");
        exit();

    } else if (empty($Name)) {
        $_SESSION['CreatePkgError'] = "Name cannot be empty";
        header("Location: CreatePackage.php");
        exit();
    } else if (empty($Hotel_Name)) {
        $_SESSION['CreatePkgError'] = "Hotel Name cannot be empty";
        header("Location: CreatePackage.php");
        exit();
    } else if (empty($Price)) {
        $_SESSION['CreatePkgError'] = "Price cannot be empty";
        header("Location: CreatePackage.php");
        exit();
    } else if (empty($Days)) {
        $_SESSION['CreatePkgError'] = "Trip Duration cannot be empty";
        header("Location: CreatePackage.php");
        exit();
    } else if (empty($P_left)) {
        $_SESSION['CreatePkgError'] = "Total Package cannot be empty";
        header("Location: CreatePackage.php");
        exit();
    } else if (empty($Start_Date)) {
        $_SESSION['CreatePkgError'] = "Starting Date cannot be empty";
        header("Location: CreatePackage.php");
        exit();
    } else if (
        !empty($Name) && !empty($Hotel_Name) && !empty($Price) && !empty($Days) && !empty($P_left) && !empty($Start_Date)
    ) {
        $isValid = true;
    }


    if (
        !empty($Name) && !empty($Hotel_Name) && !is_numeric($Name) && !empty($Price) && !empty($P_left) && !empty($Days) && !empty($Start_Date)
        && $isValid === true && $pkgNameValidity = true
    ) {
        $insert = "INSERT INTO `packages`(`Name`, `Hotel_Name`, `Description`, `Price`, `Days`, `P_left`, `P_sold`, `Start_Date`, `End_Date`, `Image_url`) VALUES ('$Name','$Hotel_Name','$Description',$Price,$Days,$P_left,0,'$Start_Date','$End_Date','$Img_url')";
        $result = mysqli_query($con, $insert);

        // if ($result === false) {
        //     die("Error executing query: " . mysqli_error($con));
        // }

        $_SESSION['CreatePkgError'] = "Package Added Successfully";
        header("Location: CreatePackage.php");
    } else {
        $_SESSION['CreatePkgError'] = "Please provide valid informations";
        header("Location: CreatePackage.php");
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