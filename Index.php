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
    <style>
    .NavBar {
        vertical-align: ;
        border: 1px black solid;
        background-color: #497174;
        height: 100px;
        width: 90%;
        margin: auto;
        /* padding-top: 1rem; */
        /* padding-bottom: 1rem; */
    }


    .logo {
        border: 1px black solid;
        height: 80px;
        width: 200px;
    }

    .logo img {
        height: 80px;
        width: 200px;
    }

    .Body {
        border: 1px black solid;
        height: 800px;
        width: 90%;
        margin: auto;
        margin-top: 10px;
    }

    .NavBtn {
        /* background-color: black; */
        border-color: white;
        text-align: center;
        text-decoration: None;
        height: 30px;
        width: 100px;
        cursor: pointer;

    }

    .is {
        height: 30px;
        width: auto;
    }
    </style>
</head>

<body>
    <div class="NavBar">
        <div class="logo">

            <img src="logo.png" alt="logo">
        </div>

        <div>
            <Button class="NavBtn">Home</Button>
            <Button class="NavBtn">About</Button>
            <Button class="NavBtn" style=" margin-left: 60%;"><a href="UserLogin.php">Login</a></Button>
            <Button class="NavBtn"><a href="UserLogout.php">Logout</a></Button>

        </div>
    </div>
    <div class="Body">
        <?php

        echo "Welcome," . $_SESSION['username'] ?>

    </div>
</body>

</html>