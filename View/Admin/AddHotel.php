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
    <title>Add Hotel</title>
    <link rel="stylesheet" href="../Assets/index.css">
</head>
<!-- Msg box success -->
<div class="s-messageBox">
    <label>
        <input type="checkbox" class="alertCheckbox" autocomplete="off" />
        <div class="alert success">
            <span class="alertClose">X</span>
            <span class="alertText">Hotel Added
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

<body>
    <div>
        <div class="AddEmpForm">
            <?php
            if (!isset($_SESSION['AddHotelError'])) {
                $_SESSION['AddHotelError'] = "";
            }
            include("Header.php");
            include("../Admin/AdminPanelMenu.php");
            ?>
            <div class="AdminDash">
                <fieldset
                    style=" border: 4px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
                    <legend style="text-align: left">
                        <h1 align="center">Add Hotel</h1>
                    </legend>
                </fieldset>
                <div class="" align="center">
                    <div>
                        <form method="POST" action="../../Controller/Admin/AddHotelAction.php"
                            onsubmit="return addHotelCheck()">
                            <div>
                                <table align="center" style="text-align: left">
                                    <tr>
                                        <td><label for="Hotel_Name">Hotel Name</label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="Hotel_Name" id="Hotel_Name"></Input></td>
                                        <td>*</td>
                                        <td>
                                            <p class="ErrorMsg" id="HotelErr"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="Location">Location </label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="Location" id="Location"></Input></td>
                                        <td>*</td>
                                        <td>
                                            <p class="ErrorMsg" id="LocationErr"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="Description">Description </label></td>
                                        <td>:</td>
                                        <td><input type="text" name="Description" id="Description"></td>

                                    </tr>
                                    <tr>
                                        <td><label for="Image">Image URL</label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="Image" id="Image"></Input></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <p style="color:red; font-weight:500">
                                                <?php if (!empty($_SESSION['AddHotelError'])) {
                                                    if($_SESSION['AddHotelError'] == "Hotel Added Successfully"){ ?>
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
                                                    echo $_SESSION['AddHotelError'];
                                                    unset($_SESSION['AddHotelError']);
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