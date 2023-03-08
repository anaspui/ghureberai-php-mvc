<?php
session_start();
include 'Connection.php';
if (isset($_GET['updateid'])) {
    $userid = $_GET['updateid'];
    $query = "select * from users where User_Id = '$userid' limit 1";
    $result = mysqli_query($con, $query);
    $user_data = mysqli_fetch_assoc($result);
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
    <link rel="stylesheet" href="index.css">
    <title>Update Profile</title>
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
            include('AdminPanelMenu.php');
            ?>
            <div class="check ">
                <fieldset
                    style=" border: 6px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
                    <legend style="text-align: center">
                        <h1 align="center">Update Employee</h1>
                    </legend>
                </fieldset><br>


                <form method="POST" action="UpdateEmpAction.php?updateid=<?php echo $userid ?>">
                    <table align="center" style="text-align: left">
                        <tr>
                            <td><label for="fname">First Name</label></td>
                            <td>:</td>
                            <td><Input type="text" name="firstName" id="firstName"
                                    value="<?php echo $firstName ?>"></Input>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="lname">Last Name</label></td>
                            <td>:</td>
                            <td><Input type="text" name="lastName" id="lastName"
                                    value="<?php echo $lastName ?>"></Input>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="Username">Username </label></td>
                            <td>:</td>
                            <td><Input type="text" name="username" id="username"
                                    value="<?php echo $username ?>"></Input>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="password">Password </label></td>
                            <td>:</td>
                            <td><input type="text" name="password" id="password"></td>
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
                        <button class="button" name="submit" type="submit" value="Update">Update</button><br><br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    include('Footer.php');
    ?>
</body>

</html>