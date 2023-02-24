<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="index.css">
    <?php
    session_start();
    ?>
</head>

<body>
    <div class="page">
        <div class="NavBar">
            <div class="logo">
                <img src="logo.png" alt="logo">
            </div>
            <Button class="button">Home</Button>
            <Button class="button">About</Button>
            <Button class="button" style=" margin-left: 60%;"><a href="UserLogin.php"></a>Login</Button>
            <Button class="button"><a href="UserLogout.php"></a>Logout</Button>


        </div>
        <!-- 
        <div class="Body">
            <?php

            echo "Welcome," . $_SESSION['username'] ?>

        </div> -->
    </div>
</body>

</html>