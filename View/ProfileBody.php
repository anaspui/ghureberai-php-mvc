<?php
require('../Controller/ProfileController.php');
$user_data = UserData();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Body</title>
    <link rel="stylesheet" href="index.css">

</head>

<body>

    <div class="ppage profile-page">
        <div class="box reg" align="center">
            <fieldset style=" border: 6px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
                <legend style="text-align: center">
                    <h1 align="center">Profile Informations</h1>
                </legend>
            </fieldset><br><br>
            <div>
                <img src="<?php
                echo $user_data['Picture'] ?>" alt="Profile picture" class="profile-pic">

            </div>
            <table align="center" style="text-align: left">
                <tr>
                    <td><label for="fname">First Name</label></td>
                    <td>:</td>
                    <td>
                        <?php echo $user_data['Firstname'] ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="lname">Last Name</label></td>
                    <td>:</td>
                    <td>
                        <?php echo $user_data['Lastname'] ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="male">Gender </label> </td>
                    <td>:</td>
                    <td>
                        <?php echo $user_data['Gender'] ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="dob">Date of Birth</label></td>
                    <td>:</td>
                    <td>
                        <?php echo $user_data['Dob'] ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email </label></td>
                    <td>:</td>
                    <td>
                        <?php echo $user_data['Email'] ?>
                    </td>

                </tr>
                <tr>
                    <td><label for="phone">Phone/Mobile</label></td>
                    <td>:</td>
                    <td>
                        <?php echo $user_data['Phone'] ?>
                    </td>

                </tr>
                <tr>
                    <td><label for="Username">Username </label></td>
                    <td>:</td>
                    <td>
                        <?php echo $user_data['Username'] ?>
                    </td>

                </tr>
                <tr>
                    <td><label for="password">Password </label></td>
                    <td>:</td>
                    <td>
                        <?php echo $user_data['Password'] ?>
                    </td>
                </tr>


            </table><br>
            <div id="update-btn" class="button btn-crud">
                <a href="ProfileUpdate.php">
                    Update
                </a>
            </div>
        </div>
    </div>
</body>

</html>