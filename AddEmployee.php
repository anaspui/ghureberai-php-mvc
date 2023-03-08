<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>



    <div>
        <div class="AddEmpForm">
            <?php
            session_start();
            if (!isset($_SESSION['AddEmpError'])) {
                $_SESSION['AddEmpError'] = "";
            }
            include("Header.php");
            include("AdminPanelMenu.php");
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
                        <form method="POST" action="AddEmployeeAction.php">
                            <div>
                                <table align="center" style="text-align: left">
                                    <tr>
                                        <td><label for="fname">First Name</label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="firstName" id="fname"></Input></td>
                                    </tr>
                                    <tr>
                                        <td><label for="lname">Last Name</label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="lastName" id="lname"></Input></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Username">Username </label></td>
                                        <td>:</td>
                                        <td><Input type="text" name="username" id="username"></Input></td>
                                    </tr>
                                    <tr>
                                        <td><label for="password">Password </label></td>
                                        <td>:</td>
                                        <td><input type="text" name="password" id="password"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <p style="color:red; font-weight:500">
                                                <?php if (!empty($_SESSION['AddEmpError'])) {
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
        include("Footer.php");
        ?>
    </div>
</body>

</html>