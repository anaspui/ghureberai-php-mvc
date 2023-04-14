<?php
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }
include('../../Controller/Admin/UpdateEmpAction.php');
userType();
if (isset($_GET['updateid'])) {
    $updateid = $_GET['updateid'];
    $user_data = EmpData($updateid);
}

$username = $user_data['Username'];
$firstName = $user_data['Firstname'];
$lastName = $user_data['Lastname'];
$password = $user_data['Password'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/index.css">
    <title>Update Employee</title>
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


    <div class="">

        <div class="AdminPage">
            <?php
            include('Header.php');
            include('../Admin/AdminPanelMenu.php');
            ?>
            <div class="check ">
                <fieldset
                    style=" border: 6px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
                    <legend style="text-align: center">
                        <h1 align="center">Update Employee</h1>
                    </legend>
                </fieldset><br>


                <form method="POST" action="../../Controller/Admin/UpdateEmpAction.php?updateid=<?php echo $updateid ?>"
                    onsubmit="return UptEmpCheck()">
                    <table align="center" style="text-align: left">
                        <tr>
                            <td><label for="fname">First Name</label></td>
                            <td>:</td>
                            <td><Input type="text" name="firstName" id="firstName"
                                    value="<?php echo $firstName ?>"></Input>
                            </td>
                            <td>
                                <p class="ErrorMsg" id="fnameError"></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="lname">Last Name</label></td>
                            <td>:</td>
                            <td><Input type="text" name="lastName" id="lastName"
                                    value="<?php echo $lastName ?>"></Input>
                            </td>
                            <td>
                                <p class="ErrorMsg" id="lnameError"></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="Username">Username </label></td>
                            <td>:</td>
                            <td><Input type="text" name="username" id="username"
                                    value="<?php echo $username ?>"></Input>
                            </td>
                            <td>
                                <p class="ErrorMsg" id="usernameError"></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="password">Password </label></td>
                            <td>:</td>
                            <td><input type="text" name="password" id="password"></td>
                            <td>
                                <p class="ErrorMsg" id="passwordError"></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p style="color:red; font-weight:500">
                                    <?php if (!empty($_SESSION['UpdateEmpError'])) {
                                        echo $_SESSION['UpdateEmpError'];
                                        unset($_SESSION['UpdateEmpError']);
                                    } ?>
                                </p>
                            </td>
                        </tr>

                    </table>
                    <div>
                        <button class="button" name="submit" type="submit" value="submit">Update</button><br><br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    include('../Footer.php');
    ?>
    <script src="../js/AdminPanel.js"></script>
</body>

</html>