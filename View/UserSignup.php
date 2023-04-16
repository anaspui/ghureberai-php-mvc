<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
    <link rel="stylesheet" href="./Assets/style.css">
    <style>
    .box.reg {
        display: inline-block;
    }
    </style>
</head>

<body>


    <div class="page">
        <div class="box reg" align="center">
            <img src="./Assets/images/logo.png" alt="logo" style="height: 100px"><br><br>
            <fieldset style=" border: 6px solid #dc9e4a; border-bottom: none; border-left: none; border-right: none;">
                <legend style="text-align: center">
                    <h1 align="center">Sign Up</h1>
                </legend>
            </fieldset><br><br>
            <form method="POST" action="../Controller/SignUpAction.php" onsubmit="return checkSignUp()">
                <table align="center" style="text-align: left">
                    <tr>
                        <td><label for="fname">First Name</label></td>
                        <td>:</td>
                        <td><Input type="text" name="firstName" id="fname"></Input></td>
                        <td>
                            <?php
                            if (isset($_SESSION['fnameError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['fnameError'] . "</p>";
                                unset($_SESSION['fnameError']);
                            }
                            ?>
                        </td>
                        <td>
                            <p class="ErrorMsg" id="fnameErr"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="lname">Last Name</label></td>
                        <td>:</td>
                        <td><Input type="text" name="lastName" id="lname"></Input></td>
                        <td>
                            <?php
                            if (isset($_SESSION['lnameError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['lnameError'] . "</p>";
                                unset($_SESSION['lnameError']);
                            }
                            ?>
                        </td>
                        <td>
                            <p class="ErrorMsg" id="lnameErr"></p>
                        </td>
                    </tr>

                    <tr>
                        <td><label for="male">Gender </label> </td>
                        <td>:</td>
                        <td>
                            <input type="radio" id="male" name="gender" value="Male">
                            <label for="Male">Male</label>
                            <input type="radio" id="female" name="gender" value="Female">
                            <label for="Female">Female</label>

                        </td>

                        <td>
                            <?php
                            if (isset($_SESSION['genderError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['genderError'] . "</p>";
                                unset($_SESSION['genderError']);
                            }
                            ?>
                        </td>
                        <td>
                            <p class="ErrorMsg" id="genderErr"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="dob">Date of Birth</label></td>
                        <td>:</td>
                        <td><input type="date" name="dob" id="dob"></td>
                        <td>
                            <?php
                            if (isset($_SESSION['dobError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['dobError'] . "</p>";
                                unset($_SESSION['dobError']);
                            }
                            ?>
                        </td>
                        <td>
                            <p class="ErrorMsg" id="dobErr"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="email">Email </label></td>
                        <td>:</td>
                        <td><Input type="text" name="email" id="email"></Input></td>
                        <td>
                            <?php
                            if (isset($_SESSION['emailError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['emailError'] . "</p>";
                                unset($_SESSION['emailError']);
                            }
                            ?>
                        </td>
                        <td>
                            <p class="ErrorMsg" id="emailErr"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="phone">Phone/Mobile</label></td>
                        <td>:</td>
                        <td><input type="text" name="phone" id="phone"></td>
                        <td>
                            <?php
                            if (isset($_SESSION['phnError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['phnError'] . "</p>";
                                unset($_SESSION['phnError']);
                            }
                            ?>
                        </td>
                        <td>
                            <p class="ErrorMsg" id="phnErr"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="Username">Username </label></td>
                        <td>:</td>
                        <td><Input type="text" name="username" id="username"></Input></td>
                        <td>
                            <?php
                            if (isset($_SESSION['usernameError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['usernameError'] . "</p>";
                                unset($_SESSION['usernameError']);
                            }
                            ?>
                        </td>
                        <td>
                            <p class="ErrorMsg" id="usernameErr"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="password">Password </label></td>
                        <td>:</td>
                        <td><input type="password" name="password" id="password"></td>
                        <td>
                            <?php
                            if (isset($_SESSION['passError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['passError'] . "</p>";
                                unset($_SESSION['passError']);
                            }
                            ?>
                        </td>
                        <td>
                            <a class="ErrorMsg" id="passErr">
                            </a>


                        </td>
                    </tr>

                </table>
                <div>
                    <?php
                    if (isset($_SESSION['RegError'])) {
                        echo "<p style='color: red;'>" . $_SESSION['RegError'] . "</p>";
                        unset($_SESSION['RegError']);
                    }
                    ?>
                    <button class="button" name="submit" type="submit" value="Register">Register</button><br><br><br>

                </div>
                <a class="link" href=" UserLogin.php">Already have an account?
                    <?php $_SESSION['RegError'] = ""; ?>
                </a>
            </form>
        </div>
    </div>
    <script src="../View/js/SingUp.js"></script>
</body>

</html>