<?php
if ($_SESSION['role'] !== "admin" && $_SESSION['role'] !== "employee") {
    header('location: ../UserLogin.php');
    exit();
}
include('../../Controller/Admin/AdminDashboardController.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Body</title>
    <link rel="stylesheet" href="../Assets/index.css">
</head>

<body>

    <div class="AdminDash">
        <fieldset
            style=" border: 4px solid #75914b; border-bottom: none; border-left: none; border-right: none; width:95%">
            <legend style="text-align: left">
                <h1 align="center">Dashboard</h1>
            </legend>
        </fieldset>


        <?php
        include_once('../../Controller/Admin/AdminDashboardController.php');
        renderDashboardCards();
        ?>
</body>

</html>