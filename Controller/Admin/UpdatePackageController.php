<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['role'] !== "admin" && $_SESSION['role'] !== "employee") {
    header('location: UserLogin.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Package_Id = $_GET['updateid'];
    $Name = $_POST['Name'];
    $Hotel_Name = $_POST['Hotel_Name'];
    $Description = $_POST['Description'];
    $Price = $_POST['Price'];
    $Days = $_POST['Days'];
    $P_left = $_POST['TotalPackages'];
    $Start_Date = $_POST['Start_Date'];
    $End_Date = date('Y-m-d', strtotime($Start_Date . ' + ' . $Days . ' days'));
    $Image_url = $_POST['img'];

    require('../../Model/Admin/PackagesModel.php');
    $result = validatePkgName($Name);


    $isValid = false;
    $pkgNameValidity = false;

    // Check if Name is valid or not
    if ($result == false) {
        $result1 = c_validatePkgName($Name);
        if ($result1) {
            $pkgNameValidity = true;
            die($result1);
        }
    } else {
        $pkgNameValidity = true;
    }

    //checks if fields are filled or not
    if (
        empty($Hotel_Name) && empty($Name) && empty($Price) && empty($Days) && empty($P_left)
    ) {
        $_SESSION['updatePackError'] = "Please fill all the required fields";
        header("Location: ../../View/Admin/UpdatePackage.php?updatePack=$Package_Id");
        exit();
    } else if (empty($Name)) {
        $_SESSION['updatePackError'] = "Name cannot be empty";
        header("Location: ../../View/Admin/UpdatePackage.php?updatePack=$Package_Id");
        exit();
    } else if (empty($Hotel_Name)) {
        $_SESSION['updatePackError'] = "Hotel Name cannot be empty";
        header("Location: ../../View/Admin/UpdatePackage.php?updatePack=$Package_Id");
        exit();
    } else if (empty($Price)) {
        $_SESSION['updatePackError'] = "Price cannot be empty";
        header("Location: ../../View/Admin/UpdatePackage.php?updatePack=$Package_Id");
        exit();
    } else if (empty($Days)) {
        $_SESSION['updatePackError'] = "Trip Duration cannot be empty";
        header("Location: ../../View/Admin/UpdatePackage.php?updatePack=$Package_Id");
        exit();
    } else if (empty($Start_Date)) {
        $_SESSION['CreatePkgError'] = "Starting Date cannot be empty";
        header("Location: ../../View/Admin/UpdatePackage.php?updatePack=$Package_Id");
        exit();
    } else if (empty($P_left)) {
        $_SESSION['updatePackError'] = "Total Package cannot be empty";
        header("Location: ../../View/Admin/UpdatePackage.php?updatePack=$Package_Id");
        exit();
    } else if (
        !empty($Name) && !empty($Hotel_Name) && !empty($Price) && !empty($Days) && !empty($P_left) && !empty($Start_Date)
    ) {
        $isValid = true;
    }


    if (
        !empty($Name) && !empty($Hotel_Name) && !is_numeric($Name) && !empty($Price) && !empty($P_left) && !empty($Days) && is_numeric($Price)
        && is_numeric($P_left) && is_numeric($Days) && !empty($Start_Date) && $isValid === true && $pkgNameValidity = true
    ) {
        $result = updatePackage($Package_Id, $Name, $Hotel_Name, $Description, $Price, $Days, $P_left, $Start_Date, $End_Date, $Image_url);
        if ($result) {
            $_SESSION['updatePackError'] = "Package Updated Successfully";
            header("Location: ../../View/Admin/UpdatePackage.php?updatePack=$Package_Id");
        } else {
            $_SESSION['updatePackError'] = "Something Went Wrong";
            header("Location: ../../View/Admin/UpdatePackage.php?updatePack=$Package_Id");
        }
    } else {
        $_SESSION['updatePackError'] = "Please provide correct informations";
        header("Location: ./../View/Admin/UpdatePackage.php?updatePack=$Package_Id");
    }
}

function sanitize($data)
{
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}



function getPack($Package_Id)
{
    require_once('../../Model/Admin/PackagesModel.php');
    $result = getPackage($Package_Id);
    return $result;
}
function c_getHotels()
{
    require_once('../../Model/Admin/PackagesModel.php');
    $result = getHotels();
    return $result;
}
