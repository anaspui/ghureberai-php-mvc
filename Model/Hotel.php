<?php

function loadHotels(){
    include('../Model/Connection.php');
    $sql = "SELECT Hotel_Name, Location, Description
    FROM hotels;";
    $result = $con->query($sql);
    while($row = $result->fetch_assoc()){
        $arr[] = array(
            'Hotel_Name' => $row['Hotel_Name'],
            'Location' => $row['Location'],
            'Description' => $row['Description']
        );
    }
    return $arr; 
}

// include('../Model/Connection.php');
// $sql = "SELECT Hotel_Name, Location, Description
// FROM hotels;";
// $result = $con->query($sql);
// while($row = $result->fetch_assoc()){
//     $arr[] = array(
//         'Hotel_Name' => $row['Hotel_Name'],
//         'Location' => $row['Location'],
//         'Description' => $row['Description']
//     );
// }
// echo json_encode($arr);
?>