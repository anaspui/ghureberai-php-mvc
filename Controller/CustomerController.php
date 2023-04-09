<?php
function viewCustomers()
{
    include_once('../../Model/CustomerModel.php');
    $result = getCustomers();
    return $result;
}
?>