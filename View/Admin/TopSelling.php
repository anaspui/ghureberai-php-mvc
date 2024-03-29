<?php
session_start();
if ($_SESSION['role'] !== "admin" && $_SESSION['role'] !== "employee") {
    header('location: ../UserLogin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Selling Packages</title>
    <link rel="stylesheet" href="../Assets/index.css">

</head>

<body>



    <div class="page">
        <div class="AdminPage">
            <?php
            include("Header.php");
            include("../Admin/AdminPanelMenu.php");
            ?>
            <div class="AdminDash">
                <fieldset
                    style=" border: 4px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
                    <legend style="text-align: left">
                        <h1 align="center">Top Selling Packages</h1>
                    </legend>
                </fieldset>
                <table class="customers">
                    <tr>
                        <th>Name</th>
                        <th>Hotel Name</th>
                        <th>Sold</th>
                        <th>Package Left</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    <?php

                    require('../../Controller/Admin/AdminDashboardController.php');
                    $result = viewTopSelling();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr><td>' . $row["Name"] . '</td><td>' . $row["Hotel_Name"] . '</td><td>' . $row["P_sold"] . '</td><td>' . $row["P_left"] . '</td><td>' . $row["Created_at"] . '</td><td>' . $row["Updated_at"] . '</td></tr>';


                        }
                    }
                    ?>
                </table>
            </div>
        </div>




        <?php
        include("../Footer.php");
        ?>
    </div>
</body>

</html>