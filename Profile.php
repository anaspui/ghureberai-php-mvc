<?php
session_start();
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php include("Header.php"); ?>
    <?php include("ProfileBody.php"); ?>
    <?php include("Footer.php"); ?>
</body>

</html>