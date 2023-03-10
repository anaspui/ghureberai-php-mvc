<?php
include 'Connection.php';
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "select * from users where Username = '$username' limit 1";
    $result = mysqli_query($con, $query);
    $user_data = mysqli_fetch_assoc($result);


    $firstName = $user_data['Firstname'];
    $lastName = $user_data['Lastname'];
    $gender = $user_data['Gender'];
    $dob = $user_data['Dob'];
    $email = $user_data['Email'];
    $phone = $user_data['Phone'];
    $password = $user_data['Password'];
    $Picture = $user_data['Picture'];
} else {
    header('location: Index.php');
}

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
                <img src="<?php echo $Picture ?>" alt="Profile picture" class="profile-pic">
            </div>
            <table align="center" style="text-align: left">
                <tr>
                    <td><label for="fname">First Name</label></td>
                    <td>:</td>
                    <td>
                        <?php echo $firstName ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="lname">Last Name</label></td>
                    <td>:</td>
                    <td>
                        <?php echo $lastName ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="male">Gender </label> </td>
                    <td>:</td>
                    <td>
                        <?php echo $gender ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="dob">Date of Birth</label></td>
                    <td>:</td>
                    <td>
                        <?php echo $dob ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email </label></td>
                    <td>:</td>
                    <td>
                        <?php echo $email ?>
                    </td>

                </tr>
                <tr>
                    <td><label for="phone">Phone/Mobile</label></td>
                    <td>:</td>
                    <td>
                        <?php echo $phone ?>
                    </td>

                </tr>
                <tr>
                    <td><label for="Username">Username </label></td>
                    <td>:</td>
                    <td>
                        <?php echo $username ?>
                    </td>

                </tr>
                <tr>
                    <td><label for="password">Password </label></td>
                    <td>:</td>
                    <td>
                        <?php echo $password ?>
                    </td>
                </tr>


            </table><br>
            <div class="button btn-crud">
                <a href="UpdatePage.php">
                    Update
                </a>
            </div>
        </div>
    </div>
</body>

</html>