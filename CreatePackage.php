<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Package</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>



    <div>
        <div class="AddEmpForm">
            <?php
            session_start();
            if (!isset($_SESSION['CreatePkgError'])) {
                $_SESSION['CreatePkgError'] = "";
            }
            include("Header.php");
            include("AdminPanelMenu.php");
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
                        <form method="POST" action="CreatePkgAction.php">
                            <div>
                                <table align="center" style="text-align: left">
                                    <tr>
                                        <td><label for="Name">Package Name</label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="Name" id="Name"></Input></td>
                                        <td>*</td>
                                    </tr>
                                    <tr>
                                        <td>Hotel Name</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            include('Connection.php');
                                            $sql = "SELECT Hotel_Name FROM hotels";
                                            $result = $con->query($sql);
                                            echo "<select class='hselect'name='Hotel_Name'>";
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row["Hotel_Name"] . "'>" . $row["Hotel_Name"] . "</option>";
                                            }
                                            echo "</select>";
                                            ?>
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
                                    </tr>
                                    <tr>
                                        <td><label for="Days">Trip Duration</label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="Days" id="Days"></Input></td>
                                        <td>*</td>
                                    </tr>
                                    <tr>
                                        <td><label for="TotalPackages">Total Package </label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="TotalPackages" id="TotalPackages"></Input></td>
                                        <td>*</td>
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
                                                    echo $_SESSION['CreatePkgError'];
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
        include("Footer.php");
        ?>
    </div>
</body>

</html>