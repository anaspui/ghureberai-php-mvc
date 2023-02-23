<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
session_start();

include("Connection.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];


    $query1 = "select * from user where username = '$username' limit 1";
    $result = mysqli_query($con, $query1);
    $isValid = false;
    if ($result) {
        if ($result && mysqli_num_rows($result) === 0) {
            $isValid = true;
        } else {
            echo "Username is taken, try again";

        }
    }




    if (!empty($username) && !empty($password) && !is_numeric($username) && $isValid === true) {

        $query2 = "insert into user (username,password) values ('$username','$password')";

        mysqli_query($con, $query2);

        header("Location: UserLogin.php");
        die;
    } else {
        echo "Please enter some valid information!";
    }




}
?>

<body>


    <div class="page">
        <div class="box reg" align="center">
            <img src="logo.png" alt="logo" style="height: 100px"><br><br>

            <fieldset style=" border: 6px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
                <legend style="text-align: center">
                    <h1 align="center">Sign Up</h1>
                </legend>
            </fieldset><br><br>
            <form method="post" action="UserSignup.php">
                <table align="center" style="text-align: left">
                    <tr>
                        <td><label for="fname">First Name</label></td>
                        <td>:</td>
                        <td><Input type="text" name="fname" id="fname"></Input></td>
                    </tr>
                    <tr>
                        <td><label for="lname">Last Name</label></td>
                        <td>:</td>
                        <td><Input type="text" name="lname" id="lname"></Input></td>
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
                    </tr>
                    <tr>
                        <td><label for="date">Date of Birth</label></td>
                        <td>:</td>
                        <td><input type="date" name="date" id="date"></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email </label></td>
                        <td>:</td>
                        <td><Input type="text" name="email" id="email"></Input></td>
                    </tr>
                    <tr>
                        <td><label for="phn">Phone/Mobile</label></td>
                        <td>:</td>
                        <td><input type="text" name="phn" id="phn"></td>
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


                </table>
                <div>
                    <button class="button" name="submit" type="submit" value="Register">Register</button><br><br><br>

                </div>

                <a href=" UserLogin.php">Already have an account?</a>


                <!-- <div style="font-size: 20px;margin: 10px;color: white;">Signup</div> -->
                <!-- <label for="username" style="font-size: 20px;margin: 10px;color: white;">Username:</label>
                <input id="username" type="text" name="username"><br><br>
                <label for="password" style="font-size: 20px;margin: 10px;color: white;">Password:</label>
                <input id="password" type="password" name="password"><br><br>

                <input id="button" type="submit" value="Signup"><br><br>

                <a href="UserLogin.php">Click to Login</a><br><br> -->
            </form>
        </div>
    </div>
</body>

</html>