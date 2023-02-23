<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="page">
        <div class="NavBar">
            <div class="logo">
                <img src="logo.png" alt="logo">
            </div>
            <Button class="NavBtn">Home</Button>
            <Button class="NavBtn">About</Button>
            <Button class="NavBtn" style=" margin-left: 60%;"><a href="UserLogin.php">Login</a></Button>
            <Button class="NavBtn"><a href="UserLogout.php">Logout</a></Button>


        </div>
        <!-- 
        <div class="Body">
            <?php

            echo "Welcome," . $_SESSION['username'] ?>

        </div> -->
    </div>
</body>

</html>