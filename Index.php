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
            <div class="navBody">
                <div class="nav-left">
                    <div class="logo">
                        <img src="logo.png" alt="logo">
                    </div>
                    <Button class="button">Home</Button>
                    <Button class="button">Book</Button>
                    <Button class="button">Packages</Button>
                    <Button class="button">Contact</Button>
                </div>
                <div class="nav-right">
                    <Button class="button"><a href="UserLogin.php">Login</a></Button>
                    <?php
                    if (isset($_SESSION['username'])) {
                        ?>
                        <Button class="button"><a href="UserLogout.php">Logout</a></Button>
                        <?php
                    } ?>

                </div>
            </div>



        </div>

        <div class="Body">
            <?php

            echo "Welcome," . $_SESSION['username'] ?>

        </div>
        <div class="Body">
            <?php

            echo "Welcome," . $_SESSION['username'] ?>

        </div>

    </div>
</body>

</html>