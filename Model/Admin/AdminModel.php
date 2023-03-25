<?php
function deleteUser($id)
{
    include_once('../../Model/Connection.php');
    $query = "delete from users where User_Id=$id";
    $result = mysqli_query($con, $query);
    return $result;
}
function deleteHotel($id)
{
    include_once('../../Model/Connection.php');
    $query = "delete from hotels where Hotel_Id=$id";
    $result = mysqli_query($con, $query);
    return $result;
}
function deletePack($id)
{
    include_once('../../Model/Connection.php');
    $query = "delete from packages where Package_Id=$id";
    $result = mysqli_query($con, $query);
    return $result;
}

?>