<?php
function viewCustomers()
{
    require('../../Model/CustomerModel.php');
    $result = getCustomers();
    return $result;
}
?>