<?php
session_start();
include('Connection.php');
if (isset($_SESSION['User_Id'])) {
    $User_Id = $_SESSION['User_Id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>My Bookings</title>
</head>

<body>


    <?php
    include('Header.php');
    ?>
    <div class="PackagesBody">



        <fieldset style=" border: 4px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
            <legend style="text-align: left">
                <h1 align="center">Saved</h1>
            </legend>
        </fieldset>


        <?php
        if (isset($_COOKIE['Saved'])) {
            $Package_Id = $_COOKIE['Saved'];
            $sql = "SELECT * FROM `packages` WHERE `Package_Id` = $Package_Id";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <a href="Packages.php">
                        <div class="PcardContainer">
                                    <div class="Pcard">
                                        <div class="Pcard-header">
                                            <p>' . $row["Name"] . '</p>
                                            </div>
                                            <div class="Pcard-body">
                                            <table>
                                            <tr>
                                                    <th>Hotel</th>
                                                    <td>:</td>
                                                    <td>' . $row["Hotel_Name"] . '</td>
                                                </tr>
                                                <tr>
                                                    <th>Duration</th>
                                                    <td>:</td>
                                                    <td>' . $row["Days"] . ' Days</td>
                                                </tr>
                                                <tr>
                                                    <th>Price</th>
                                                    <td>:</td>
                                                    <td>' . $row["Price"] . ' BDT</td>
                                                </tr>
                                                <tr>
                                                    <th>Time</th>
                                                    <td>:</td>
                                                    <td>' . date('d F', strtotime($row['Start_Date'])) . '</td>
                                                </tr>
                                            </table>
                                        <div class="BookBtn"> <button><a href="DeleteSaved.php?Saved=' . $_COOKIE['Saved'] . '">Remove</a></button></div>
                                    </div>
                             </div>
                        </div>
                        
                        </a>';
                    if (!isset($_SESSION['User_Id'])) {
                        echo '<p style="text-align:center; color:red"><a href="UserLogin.php">Please Sign In Confirm The Trip!</a></p>';
                    }
                }
            }
        }
        ?>




        <?php
        if (isset($User_Id)) { ?>


            <fieldset style=" border: 4px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
                <legend style="text-align: left">
                    <h1 align="center">My Bookings</h1>
                </legend>
            </fieldset>

            <?php
            $sql = "SELECT bookings.*, packages.Name, packages.Hotel_Name, packages.Days
            FROM bookings 
            JOIN packages ON bookings.Package_Id = packages.Package_Id
            WHERE bookings.User_Id = " . $User_Id;
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                <div class="PcardContainer">
                            <div class="Pcard">
                                <div class="Pcard-header">
                                    <p>' . $row["Name"] . '</p>
                                    </div>
                                    <div class="Pcard-body">
                                    <table>
                                    <tr>
                                            <th>Hotel</th>
                                            <td>:</td>
                                            <td>' . $row["Hotel_Name"] . '</td>
                                        </tr>
                                        <tr>
                                            <th>Duration</th>
                                            <td>:</td>
                                            <td>' . $row["Days"] . ' Days</td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td>:</td>
                                            <td>' . $row["Price"] . ' BDT</td>
                                        </tr>
                                        <tr>
                                            <th>Time</th>
                                            <td>:</td>
                                            <td>' . date('d F', strtotime($row['Start_Date'])) . '</td>
                                        </tr>
                                    </table>
                                    </div>
                                </div>
                </div>';
                }
            }
        }
        ?>
    </div>
    <?php
    include('Footer.php');
    ?>



</body>

</html>