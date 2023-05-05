<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    require('../Model/Hotel.php');
    $arr = loadHotels();
    echo json_encode($arr);
}
?>