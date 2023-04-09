<?php
function deleteUser($id)
{
    require_once('../../Model/Connection.php');
    $stmt = $con->prepare("DELETE FROM users WHERE User_Id=?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    $stmt->close();
    $con->close();

    return $result;
}

function deleteHotel($id)
{
    require_once('../../Model/Connection.php');
    $stmt = $con->prepare("DELETE FROM hotels WHERE Hotel_Id=?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    $stmt->close();
    $con->close();

    return $result;
}

function deletePack($id)
{
    require_once('../../Model/Connection.php');
    $stmt = $con->prepare("DELETE FROM packages WHERE Package_Id=?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    $stmt->close();
    $con->close();

    return $result;
}


?>