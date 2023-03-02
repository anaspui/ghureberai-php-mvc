<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="index.css">s
</head>

<body>
    <div class="NavBar">
        <div class="navBody">
            <div class="nav-left">
                <div class="logo">
                    <img src="logo.png" alt="logo">
                </div>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li>Book</li>
                    <li>Packages</li>
                    <li>Contact</li>
                    <li><a href="Admin.php">Admin Panel</a></li>
                </ul>
            </div>
            <div class="nav-right">
                <ul>
                    <li>
                        <?php
                        if (isset($_SESSION["username"])) { ?>
                        <p><a href="Profile.php">
                                <?php
                                    echo "Welcome, " . $_SESSION["username"];

                                    ?>
                            </a></p>
                        <?php } else { ?>
                        <Button class="button"><a href="UserLogin.php">Login</a></Button>
                        <?php } ?>

                    </li>
                    <li>
                        <?php
                        if (isset($_SESSION['username'])) {
                            ?>
                        <Button class="button"><a href="UserLogout.php">Logout</a></Button>
                        <?php
                        } ?>

                    </li>

                </ul>

            </div>
        </div>
    </div>
</body>

</html>