<?php

function UserData()
{
    if (isset($_SESSION['username'])) {
        require('../Model/ProfileModel.php');
        $user_data = getUserData($_SESSION['username']);
        return $user_data;
    } else {
        header('location: Index.php');
    }
}
?>