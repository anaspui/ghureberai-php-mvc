<?php
session_start();
include("Connection.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Package_Id = $_GET['updateid'];
    $Name = $_POST['Name'];
    $Hotel_Name = $_POST['Hotel_Name'];
    $Description = $_POST['Description'];
    $Price = $_POST['Price'];
    $Days = $_POST['Days'];
    $P_left = $_POST['TotalPackages'];
    $Image_url = $_POST['img'];


    $chkPkgName = "SELECT * FROM packages WHERE Name = '" . $Name . "'";
    $result = mysqli_query($con, $chkPkgName);

    $isValid = false;
    $pkgNameValidity = false;

    // Check if Name is valid or not
    if (mysqli_num_rows($result) > 0) {
        $query = "SELECT * FROM packages WHERE Name = '$Name' AND Package_Id = $Package_Id";
        $result1 = mysqli_query($con, $query);
        if ($result1) {
            $pkgNameValidity = true;
        }
    } else {
        $pkgNameValidity = true;
    }

    //checks if fields are filled or not
    if (
        empty($Hotel_Name) && empty($Name) && empty($Price) && empty($Days) && empty($P_left)
    ) {
        $_SESSION['updatePackError'] = "Please fill all the required fields";
        header("Location: UpdatePackage.php?updatePack=$Package_Id");
        exit();

    } else if (empty($Name)) {
        $_SESSION['updatePackError'] = "Name cannot be empty";
        header("Location: UpdatePackage.php?updatePack=$Package_Id");
        exit();
    } else if (empty($Hotel_Name)) {
        $_SESSION['updatePackError'] = "Hotel Name cannot be empty";
        header("Location: UpdatePackage.php?updatePack=$Package_Id");
        exit();
    } else if (empty($Price)) {
        $_SESSION['updatePackError'] = "Price cannot be empty";
        header("Location: UpdatePackage.php?updatePack=$Package_Id");
        exit();
    } else if (empty($Days)) {
        $_SESSION['updatePackError'] = "Trip Duration cannot be empty";
        header("Location: UpdatePackage.php?updatePack=$Package_Id");
        exit();
    } else if (empty($P_left)) {
        $_SESSION['updatePackError'] = "Total Package cannot be empty";
        header("Location: UpdatePackage.php?updatePack=$Package_Id");
        exit();
    } else if (
        !empty($Name) && !empty($Hotel_Name) && !empty($Price) && !empty($Days) && !empty($P_left)
    ) {
        $isValid = true;
    }


    if (
        !empty($Name) && !empty($Hotel_Name) && !is_numeric($Name) && !empty($Price) && !empty($P_left) && !empty($Days) && is_numeric($Price)
        && is_numeric($P_left) && is_numeric($Days) && $isValid === true && $pkgNameValidity = true
    ) {
        $update = "UPDATE `packages` SET `Name`='$Name', `Hotel_Name`='$Hotel_Name', `Description`='$Description', `Price`=$Price, `Days`=$Days, `P_left`=$P_left, `Image_url`='$Img_url' WHERE `Package_Id`=$Package_Id";
        $result = mysqli_query($con, $update);

        $_SESSION['updatePackError'] = "Package Updated Successfully";
        header("Location: UpdatePackage.php?updatePack=$Package_Id");
    } else {
        $_SESSION['updatePackError'] = "Please provide correct data for the fields";
        header("Location: UpdatePackage.php?updatePack=$Package_Id");
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