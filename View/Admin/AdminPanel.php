<?php
session_start();
if ($_SESSION['role'] !== "admin" && $_SESSION['role'] !== "employee") {
    header('location: UserLogin.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../Assets/index.css">
</head>

<body>
    <div class="AdminPage">
        <?php
        include("Header.php");
        include('AdminPanelMenu.php');
        include('AdminDashboard.php');
        ?>
    </div>
    <div>
        <?php
        include("Footer.php");
        ?>
    </div>
</body>

</html>