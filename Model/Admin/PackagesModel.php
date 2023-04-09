<?php
// session_start();
function getPackages($page)
{
    if ($page == 2) {
        require('../../Model/Connection.php');
        $sql = "SELECT * FROM packages";
        $result = $con->query($sql);
        return $result;
    }
    if ($page == 1) {
        require('../Model/Connection.php');
        $sql = "SELECT * FROM packages";
        $result = $con->query($sql);
        return $result;
    }
}
function getPackage($Package_Id)
{
    require('../../Model/Connection.php');
    $sql = "select * from packages where Package_Id = $Package_Id";
    $result = $con->query($sql);
    return $result;
}
function getHotels()
{
    require('../../Model/Connection.php');
    $sql = "SELECT Hotel_Name FROM hotels";
    $result = $con->query($sql);
    return $result;
}
function validatePkgName($Name)
{
    require('../../Model/Connection.php');
    $chkPkgName = "SELECT * FROM packages WHERE Name = '" . $Name . "'";
    $result = mysqli_query($con, $chkPkgName);
    if (mysqli_num_rows($result) > 0) {
        return false;
    } else {
        return true;
    }
}
function c_validatePkgName($Name)
{
    require('../../Model/Connection.php');
    $chkPkgName = "SELECT * FROM packages WHERE Name = '$Name' AND Package_Id = $Package_Id";
    $result = mysqli_query($con, $chkPkgName);
    return $result;
}
function createPackage($Name, $Hotel_Name, $Description, $Price, $Days, $P_left, $Start_Date, $End_Date, $Img_url)
{
    require('../../Model/Connection.php');
    $insert = "INSERT INTO `packages`(`Name`, `Hotel_Name`, `Description`, `Price`, `Days`, `P_left`, `P_sold`, `Start_Date`, `End_Date`, `Image_url`) VALUES ('$Name','$Hotel_Name','$Description',$Price,$Days,$P_left,0,'$Start_Date','$End_Date','$Img_url')";
    $result = mysqli_query($con, $insert);
    if ($result) {
        return true;
    }
}
function updatePackage($Package_Id, $Name, $Hotel_Name, $Description, $Price, $Days, $P_left, $Start_Date, $End_Date, $Image_url)
{
    require('../../Model/Connection.php');
    $update = "UPDATE `packages` SET `Name`='$Name', `Hotel_Name`='$Hotel_Name', `Description`='$Description', `Price`=$Price, `Days`=$Days, `P_left`=$P_left, `Image_url`='$Image_url', `Start_Date` ='$Start_Date', `End_Date`='$End_Date' WHERE `Package_Id`=$Package_Id";
    $result = mysqli_query($con, $update);
    if ($update) {
        return true;
    } else return false;
}