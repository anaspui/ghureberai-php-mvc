<?php
session_start();
if ($_SESSION['role'] !== "admin") {
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
    <title>Add Employee</title>
    <link rel="stylesheet" href="../Assets/index.css">
</head>

<body>

    <!-- Msg box success -->
    <div class="s-messageBox">
        <label>
            <input type="checkbox" class="alertCheckbox" autocomplete="off" />
            <div class="alert success">
                <span class="alertClose">X</span>
                <span class="alertText">Employee Added
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
            if (!isset($_SESSION['AddEmpError'])) {
                $_SESSION['AddEmpError'] = "";
            }
            include("Header.php");
            include("../Admin/AdminPanelMenu.php");
            ?>
            <div class="AdminDash">
                <fieldset
                    style=" border: 4px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
                    <legend style="text-align: left">
                        <h1 align="center">Add Employee</h1>
                    </legend>
                </fieldset>
                <div class="" align="center">
                    <div>
                        <form method="POST" action="../../Controller/Admin/AddEmployeeAction.php"
                            onsubmit="return addEmpCheck()">
                            <div>
                                <table align="center" style="text-align: left">
                                    <tr>
                                        <td><label for="fname">First Name</label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="firstName" id="fname"></Input></td>
                                        <td>*</td>
                                        <td>
                                            <p class="ErrorMsg" id="fnameError"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="lname">Last Name</label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="lastName" id="lname"></Input></td>
                                        <td>*</td>
                                        <td>
                                            <p class="ErrorMsg" id="lnameError"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="Username">Username </label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="username" id="username"></Input></td>
                                        <td>*</td>
                                        <td>
                                            <p class="ErrorMsg" id="usernameError"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="password">Password </label></td>
                                        <td>:</td>
                                        <td><input type="text" name="password" id="password"></td>
                                        <td>*</td>
                                        <td>
                                            <p class="ErrorMsg" id="passwordError"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <p style="color:red; font-weight:500">
                                                <?php if (!empty($_SESSION['AddEmpError'])) {
                                                    if($_SESSION['AddEmpError'] == 'Employee Added Successfully'){ ?>

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
                                                    echo $_SESSION['AddEmpError'];
                                                    unset($_SESSION['AddEmpError']);
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
    <script src="../js/AdminPanel.js"></script>
</body>

</html>