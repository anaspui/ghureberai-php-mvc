<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="NavBar">
        <div class="navBody">
            <div class="nav-left">
                <div class="logo">
                    <a href="Index.php"><img src="images/logo.png" alt="logo"> </a>

                </div>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Hotels.php">Hotel</a></li>
                    <li><a href="Packages.php">Packages</a></li>
                    <li><a href="#footer">Contact</a></li>
                    <?php
                    if (isset($_SESSION['username'])) {

                        if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'employee') {
                            ?>
                            <li><a href="AdminPanel.php">Admin Panel</a></li>
                        <?php }
                    } ?>
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

                            </p>
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