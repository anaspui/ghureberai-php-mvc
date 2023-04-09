<?php
function getCustomers()
{
    require('../../Model/Connection.php');
    $sql = "SELECT * FROM users WHERE role = ?";
    $stmt = $con->prepare($sql);
    $role = "customer";
    $stmt->bind_param("s", $role);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

?>