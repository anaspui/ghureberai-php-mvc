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
    <title>Top Visited Places</title>
    <link rel="stylesheet" href="../Assets/index.css">
    <style>
        #viewEmp th,
        tr,
        td {
            /* border: 1px solid black; */
            width: 250px;
            text-align: center;
            border-bottom: 1px solid #3B577D;
            border-right: 1px solid #3B577D;
            ;
        }
    </style>
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
                        <h1 align="center">Bookings</h1>
                    </legend>
                </fieldset>
                <table id="viewEmp">
                    <tr>
                        <th>Booking Id</th>
                        <th>Booked By</th>
                        <th>User Id</th>
                        <th>Package Id</th>
                        <th>Package Name</th>
                        <th>Booked At</th>

                    </tr>
                    <?php
                    require('../../Controller/Admin/AdminDashboardController.php');
                    $result = viewBooking();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>
                            <td>' . $row["Booking_Id"] . '</td>
                            <td>' . $row["Username"] . '</td>
                            <td>' . $row["User_Id"] . '</td>
                            <td>' . $row["Package_Id"] . '</td>
                            <td>' . $row["Name"] . '</td>
                            <td>' . $row["Booked_At"] . '</td>
                            </tr>';
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