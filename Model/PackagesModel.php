<?php
function getPackages()
{
    require('Connection.php');
    $sql = "SELECT * FROM packages";
    $result = $con->query($sql);
    return $result;
}
?>