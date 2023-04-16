<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require('../Controller/ProfileUpdateController.php');
$user_data = UserData();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Update Profile</title>
    <style>
    #btnupt p {
        color: white;
        font-size: 20px;
    }

    #btnupt button {
        height: 30px;
    }

    #updateBox {
        width: 750px;
    }
    </style>
</head>

<body>
    <?php
    include('Header.php');
    ?>
    <div class="ppage profile-page">
        <div id="updateBox" class="box reg" align="center">
            <fieldset style=" border: 6px solid #dc9e4a; border-bottom: none; border-left: none; border-right: none;">
                <legend style="text-align: center">
                    <h1 align="center">Update Information</h1>
                </legend>
            </fieldset><br>
            <form method="post" action="../Controller/ProfileUpdateController.php" onsubmit="return updateProfileChk()">
                <table align="center" style="text-align: left">
                    <tr>
                        <td><label for="fname">First Name</label></td>
                        <td>:</td>
                        <td><Input type="text" name="firstName" id="firstName"
                                value="<?php echo $user_data['Firstname'] ?>"></Input>
                        </td>
                        <td>
                            <?php
                            if (isset($_SESSION['fnameError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['fnameError'] . "</p>";
                                // unset($_SESSION['fnameError']);
                            }
                            ?>
                            <p class="ErrorMsg" id="fnameErr"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="lname">Last Name</label></td>
                        <td>:</td>
                        <td><Input type="text" name="lastName" id="lastName"
                                value="<?php echo $user_data['Lastname'] ?>"></Input>
                        </td>
                        <td>
                            <?php
                            if (isset($_SESSION['lnameError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['lnameError'] . "</p>";
                                // unset($_SESSION['lnameError']);
                            }
                            ?>
                            <p class="ErrorMsg" id="lnameErr"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="dob">Date of Birth</label></td>
                        <td>:</td>
                        <td><input type="date" name="dob" id="dob" value="<?php
                        $dob = date('Y-m-d', strtotime($user_data['Dob']));
                        echo $dob;
                        ?>"></td>
                        <td>

                            <?php
                            if (isset($_SESSION['dobError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['dobError'] . "</p>";
                                // unset($_SESSION['dobError']);
                            }
                            ?>
                            <p class="ErrorMsg" id="dobErr"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="email">Email </label></td>
                        <td>:</td>
                        <td><Input type="text" name="email" id="email"
                                value="<?php echo $user_data['Email'] ?>"></Input></td>
                        <td>
                            <?php
                            if (isset($_SESSION['emailError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['emailError'] . "</p>";
                                // unset($_SESSION['emailError']);
                            }
                            ?>
                            <p class="ErrorMsg" id="emailErr"></p>
                        </td>

                    </tr>
                    <tr>
                        <td><label for="phone">Phone/Mobile</label></td>
                        <td>:</td>
                        <td><input type="text" name="phone" id="phone" value="<?php echo $user_data['Phone'] ?>"></td>
                        <td>
                            <?php
                            if (isset($_SESSION['phnError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['phnError'] . "</p>";
                                // unset($_SESSION['phnError']);
                            }
                            ?>
                            <p class="ErrorMsg" id="phnErr"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="address">Address</label></td>
                        <td>:</td>
                        <td><input type="text" name="address" id="address" value="<?php echo $user_data['Address'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="Username">Username </label></td>
                        <td>:</td>
                        <td><Input type="text" name="username" id="username"
                                value="<?php echo $user_data['Username'] ?>"></Input>
                        <td>
                            <?php
                            if (isset($_SESSION['usernameError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['usernameError'] . "</p>";
                                // unset($_SESSION['usernameError']);
                            }
                            ?>
                            <p class="ErrorMsg" id="usernameErr"></p>
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="CurrPassword">Current Password </label></td>
                        <td>:</td>
                        <td><input type="Password" name="CurrPassword" id="CurrPassword"></td>
                        <td>

                            <p class="ErrorMsg" id="currPassErr"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="NewPassword">New Password </label></td>
                        <td>:</td>
                        <td><input type="Password" name="NewPassword" id="NewPassword"></td>
                        <td>
                            <p class="ErrorMsg" id="newPassErr"></p>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p class="ErrorMsg">

                                <?php if (isset($_SESSION['UpdateError'])){
                                    echo $_SESSION['UpdateError'];
                                }
                                unset($_SESSION['UpdateError']);
                                ?>
                            </p>
                        </td>
                    </tr>

                </table>
                <div id="btnupt">
                    <button id="update-btn" class="button btn-crud" name=" submit" type="submit" value="Update">
                        <p>Update</p>
                    </button><br><br><br>

                </div>
            </form>
        </div>
    </div>
    <?php
    include('Footer.php');
    ?>
    <script src="../View/js/Profile.js"></script>
</body>

</html>