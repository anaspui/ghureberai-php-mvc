<?php
session_start();
if ($_SESSION['role'] !== "admin" && $_SESSION['role'] !== "employee") {
    header('location: UserLogin.php');
    exit();
}
include 'Connection.php';
if (isset($_GET['updatePack'])) {
    $Package_Id = $_GET['updatePack'];
    $query = "select * from packages where Package_Id = $Package_Id";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result);

    $Package_Name = $data['Name'];
    $Hotel_Name = $data['Hotel_Name'];
    $Description = $data['Description'];
    $Price = $data['Price'];
    $Days = $data['Days'];
    $P_left = $data['P_left'];
    $P_sold = $data['P_sold'];
    $Start_Date = $data['Start_Date'];
    $Image_url = $data['Image_url'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Update Hotel</title>
    <style>
        .check {
            padding-top: 150px;
            padding-left: 420px;
            align-items: center;
            color: #3B577D;
            text-align: center;
        }

        .check button {
            color: white !important;
            background-color: green;
            align: center;
        }
    </style>
</head>

<body>


    <div>
        <div class="AddEmpForm">
            <?php

            include("Header.php");
            include("AdminPanelMenu.php");
            ?>
            <div class="AdminDash">
                <fieldset
                    style=" border: 4px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
                    <legend style="text-align: left">
                        <h1 align="center">Update Package</h1>
                    </legend>
                </fieldset>
                <div class="" align="center">
                    <div>
                        <form method="POST" action="UpdatePackageAction.php?updateid=<?php echo $Package_Id ?>">
                            <div>
                                <table align="center" style="text-align: left">
                                    <tr>
                                        <td><label for="Name">Package Name</label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="Name" id="Name"
                                                value="<?php echo $Package_Name; ?>"></Input></td>
                                        <td>
                                            *
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Hotel Name</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            $sql = "SELECT Hotel_Name FROM hotels";
                                            $result = $con->query($sql);
                                            echo "<select class='hselect'name='Hotel_Name'>";
                                            ?>
                                            <option selected="selected">
                                                <?php echo $Hotel_Name; ?>
                                            </option>
                                            <?php
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row["Hotel_Name"] . "'>" . $row["Hotel_Name"] . "</option>";
                                            }
                                            echo "</select>";
                                            ?>
                                        </td>
                                        <td>*</td>
                                    </tr>
                                    <tr>
                                        <td><label for="Description">Description </label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="Description" id="Description"
                                                value="<?php echo $Description; ?>"></Input></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Price">Price </label></td>
                                        <td>:</td>
                                        <td><input type="text" name="Price" id="Price" value="<?php echo $Price; ?>">
                                        </td>
                                        <td>*</td>
                                    </tr>
                                    <tr>
                                        <td><label for="Days">Trip Duration</label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="Days" id="Days"
                                                value="<?php echo $Days; ?>"></Input></td>
                                        <td>*</td>
                                    </tr>
                                    <tr>
                                        <td><label for="TotalPackages">Total Package </label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="TotalPackages" id="TotalPackages"
                                                value="<?php echo $P_left; ?>"></Input></td>
                                        <td>*</td>
                                    </tr>
                                    <tr>
                                        <td><label for="Start_Date">Start Date </label></td>
                                        <td>:</td>
                                        <td><Input type="date" name="Start_Date" id="Start_Date"
                                                value="<?php echo $Start_Date; ?>"></Input></td>
                                        <td>*</td>
                                    </tr>
                                    <tr>
                                        <td><label for="img">Image Link </label></td>
                                        <td>:</td>
                                        <td><input type="text" name="img" id="img" value="<?php echo $Image_url; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <p style="color:red; font-weight:500">
                                                <?php if (!empty($_SESSION['updatePackError'])) {
                                                    echo $_SESSION['updatePackError'];
                                                    unset($_SESSION['updatePackError']);
                                                } ?>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="EmpFormButton">
                                <input class="input-btn" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include('Footer.php');
        ?>
</body>

</html>