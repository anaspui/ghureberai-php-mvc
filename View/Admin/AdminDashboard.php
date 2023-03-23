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
        <div class="cardContainer">
            <a href="ViewCustomers.php">
                <div class="card">
                    <div class="card-header">
                        <h3>Customers</h3>
                    </div>
                    <div class="card-body">
                        <p>
                            <?php
                            echo getCustomers();
                            ?>
                        </p>
                    </div>
                </div>
            </a>
            <?php
            if ($_SESSION['role'] == "admin") {
                ?>
                <a href="ViewEmployee.php">
                    <div class="card">
                        <div class="card-header">
                            <h3>Employees</h3>
                        </div>
                        <div class="card-body">
                            <p>
                                <?php

                                echo getEmployees();
                                ?>
                            </p>
                        </div>
                    </div>
                </a>
            <?php } ?>
            <a href="ViewHotel.php">
                <div class="card">
                    <div class="card-header">
                        <h3>Hotels</h3>
                    </div>
                    <div class="card-body">
                        <p>
                            <?php
                            echo getHotels();
                            ?>
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="cardContainer">
            <a href="ViewPackages.php">
                <div class="card">
                    <div class="card-header">
                        <h3>Packages</h3>
                    </div>
                    <div class="card-body">
                        <p>
                            <?php echo getPackages(); ?>
                        </p>
                    </div>
                </div>
            </a>
            <a href="TopSelling.php">
                <div class="card">
                    <div class="card-header">
                        <h3>Packages Sold</h3>
                    </div>
                    <div class="card-body">
                        <p>
                            <?php echo getTopSelling() ?>
                        </p>
                    </div>
                </div>
            </a>
            <a href="ViewBookings.php">
                <div class="card">
                    <div class="card-header">
                        <h3>Bookings</h3>
                    </div>
                    <div class="card-body">
                        <p>
                            <?php echo getBookings() ?>
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>


    <?php
    include("../Footer.php");
    ?>

</body>

</html>