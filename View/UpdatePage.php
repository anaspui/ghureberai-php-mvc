<?php
session_start();
include 'Connection.php';
$username = $_SESSION['username'];
$query = "select * from users where Username = '$username' limit 1";
$result = mysqli_query($con, $query);
$user_data = mysqli_fetch_assoc($result);


$firstName = $user_data['Firstname'];
$lastName = $user_data['Lastname'];
$gender = $user_data['Gender'];
$dob = $user_data['Dob'];
$email = $user_data['Email'];
$address = $user_data['Address'];
$phone = $user_data['Phone'];
$password = $user_data['Password'];
$Picture = $user_data['Picture'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Update Profile</title>
</head>

<body>
    <?php
    include('Header.php');
    ?>
    <div class="ppage profile-page">
        <div class="box reg" align="center">
            <fieldset style=" border: 6px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
                <legend style="text-align: center">
                    <h1 align="center">Update Information</h1>
                </legend>
            </fieldset><br>
            <form method="post" action="UpdateAction.php">
                <table align="center" style="text-align: left">
                    <tr>
                        <td><label for="fname">First Name</label></td>
                        <td>:</td>
                        <td><Input type="text" name="firstName" id="firstName" value="<?php echo $firstName ?>"></Input>
                        </td>
                        <td>
                            <?php
                            if (isset($_SESSION['fnameError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['fnameError'] . "</p>";
                                unset($_SESSION['fnameError']);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="lname">Last Name</label></td>
                        <td>:</td>
                        <td><Input type="text" name="lastName" id="lastName" value="<?php echo $lastName ?>"></Input>
                        </td>
                        <td>
                            <?php
                            if (isset($_SESSION['lnameError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['lnameError'] . "</p>";
                                unset($_SESSION['lnameError']);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="dob">Date of Birth</label></td>
                        <td>:</td>
                        <td><input type="date" name="dob" id="dob" value="<?php echo $dob ?>"></td>
                        <td>
                            <?php
                            if (isset($_SESSION['dobError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['dobError'] . "</p>";
                                unset($_SESSION['dobError']);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="email">Email </label></td>
                        <td>:</td>
                        <td><Input type="text" name="email" id="email" value="<?php echo $email ?>"></Input></td>
                        <td>
                            <?php
                            if (isset($_SESSION['emailError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['emailError'] . "</p>";
                                unset($_SESSION['emailError']);
                            }
                            ?>
                        </td>

                    </tr>
                    <tr>
                        <td><label for="phone">Phone/Mobile</label></td>
                        <td>:</td>
                        <td><input type="text" name="phone" id="phone" value="<?php echo $phone ?>"></td>
                        <td>
                            <?php
                            if (isset($_SESSION['phnError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['phnError'] . "</p>";
                                unset($_SESSION['phnError']);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="address">Address</label></td>
                        <td>:</td>
                        <td><input type="text" name="address" id="address" value="<?php echo $address ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="Username">Username </label></td>
                        <td>:</td>
                        <td><Input type="text" name="username" id="username" value="<?php echo $username ?>"></Input>
                        <td>
                            <?php
                            if (isset($_SESSION['usernameError'])) {
                                echo "<p style='color: red;'>" . $_SESSION['usernameError'] . "</p>";
                                unset($_SESSION['usernameError']);
                            }
                            ?>
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="CurrPassword">Current Password </label></td>
                        <td>:</td>
                        <td><input type="Password" name="CurrPassword" id="CurrPassword"></td>
                    </tr>
                    <tr>
                        <td><label for="NewPassword">New Password </label></td>
                        <td>:</td>
                        <td><input type="Password" name="NewPassword" id="NewPassword"></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p>

                                <?php if (isset($_SESSION['UpdateError']))
                                    echo $_SESSION['UpdateError'];
                                unset($_SESSION['UpdateError']);
                                ?>
                            </p>
                        </td>
                    </tr>

                </table>
                <div class="updatebutton">
                    <button class="updatebutton" name="submit" type="submit" value="Update">Update</button><br><br><br>

                </div>
            </form>
        </div>
    </div>
    <?php
    include('Footer.php');
    ?>
</body>

</html>