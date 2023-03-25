<?php
function getCustomers()
{
    require('../../Model/Connection.php');
    $sql = "SELECT * FROM users WHERE role = 'customer'";
    $result = $con->query($sql);
    return $result;
}
?>