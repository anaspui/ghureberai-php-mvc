<?php
session_start();
if ($_SESSION['role'] !== "admin" && $_SESSION['role'] !== "employee") {
    header('location: ../UserLogin.php');
    exit();
}
include('../../Controller/Admin/CreatePkgAction.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Package</title>
    <link rel="stylesheet" href="../Assets/index.css">
</head>

<body>

    <!-- Msg box success -->
    <div class="s-messageBox">
        <label>
            <input type="checkbox" class="alertCheckbox" autocomplete="off" />
            <div class="alert success">
                <span class="alertClose">X</span>
                <span class="alertText">Package Added Successfully
                    <br class="clear" /></span>
            </div>
        </label>
    </div>
    <!-- Msg Box Error -->
    <div class="s-messageBox e-messageBox">
        <label>
            <input type="checkbox" class="alertCheckbox" autocomplete="off" />
            <div class="alert error">
                <span class="alertClose">X</span>
                <span class="alertText">Error, Try Again
                    <br class="clear" /></span>
            </div>
        </label>
    </div>
    <!-- end of msg Box -->

    <div>
        <div class="AddEmpForm">
            <?php
            if (!isset($_SESSION['CreatePkgError'])) {
                $_SESSION['CreatePkgError'] = "";
            }
            include("Header.php");
            include("../Admin/AdminPanelMenu.php");
            ?>
            <div class="AdminDash">
                <fieldset
                    style=" border: 4px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
                    <legend style="text-align: left">
                        <h1 align="center">Create Package</h1>
                    </legend>
                </fieldset>
                <div class="" align="center">
                    <div>

                        <form method="POST" action="../../Controller/Admin/CreatePkgAction.php"
                            onsubmit="return createPackError()">
                            <div>
                                <table align="center" style="text-align: left">
                                    <tr>
                                        <td><label for="Name">Package Name</label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="Name" id="Name"></Input></td>
                                        <td>*</td>
                                        <td>
                                            <p class="ErrorMsg" id="nameError"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Hotel Name</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            $result = getHotelNames();
                                            echo "<select class='hselect'name='Hotel_Name'>";
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row["Hotel_Name"] . "'>" . $row["Hotel_Name"] . "</option>";
                                            }
                                            echo "</select>";
                                            ?>
                                        </td>
                                        <td>*</td>
                                        <td>
                                            <p class="ErrorMsg" id="hotelError"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="Description">Description </label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="Description" id="Description"></Input></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Price">Price </label></td>
                                        <td>:</td>
                                        <td><input type="text" name="Price" id="Price"></td>
                                        <td>*</td>
                                        <td>
                                            <p class="ErrorMsg" id="priceError"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="Days">Trip Duration</label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="Days" id="Days"></Input></td>
                                        <td>*</td>
                                        <td>
                                            <p class="ErrorMsg" id="tripError"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="TotalPackages">Total Package </label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="TotalPackages" id="TotalPackages"></Input></td>
                                        <td>*</td>
                                        <td>
                                            <p class="ErrorMsg" id="tpackError"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="Start_Date">Start Date </label></td>
                                        <td>:</td>
                                        <td><Input type="date" name="Start_Date" id="Start_Date"></Input></td>
                                        <td>*</td>
                                        <td>
                                            <p class="ErrorMsg" id="dateError"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="img">Image Link </label></td>
                                        <td>:</td>
                                        <td><input type="text" name="img" id="img"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <p style="color:red; font-weight:500">
                                                <?php if (!empty($_SESSION['CreatePkgError'])) {
                                                    if($_SESSION['CreatePkgError'] == "Package Added Successfully"){ ?>
                                                <script>
                                                document.getElementsByClassName("s-messageBox")[0].style.display =
                                                    "block";
                                                </script>
                                                <?php }else {?>

                                                <script>
                                                document.getElementsByClassName("e-messageBox")[0].style.display =
                                                    "block";
                                                </script>

                                                <?php }
                                                    print_r($_SESSION['CreatePkgError']);
                                                    unset($_SESSION['CreatePkgError']);
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
        include("../Footer.php");
        ?>
    </div>
    <script src="../../View/js/AdminPanel.js"></script>
</body>

</html>