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
        height: 30px;
        width: 90%;
        margin: auto;
        padding-top: 1rem;
        padding-bottom: 1rem;
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
        <div style="border: 1px solid black">

        </div>

        <Button class="NavBtn">Home</Button>
        <Button class="NavBtn">About</Button>
        <Button class="NavBtn" style=" margin-left: 60%;"><a href="UserLogin.php">Login</a></Button>
        <Button class="NavBtn"><a href="UserLogout.php">Logout</a>
            <?php session_destroy();
            ?>
        </Button>
    </div>
    <div class="Body">
        <?php
        $username = $_SESSION['username'];
        echo "Welcome," . $username ?>

    </div>
</body>

</html>