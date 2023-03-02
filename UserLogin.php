<?php

session_start();

include("Connection.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password) && !is_numeric($username)) {

        $query = "select * from user where username = '$username' limit 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {

                    $_SESSION['username'] = $username;
                    header("Location: Index.php");
                }
            }
        }

        echo "wrong username or password!";
    } else {
        echo "wrong username or password!";
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="icon" href="logo.svg">
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div class="page login-page">
        <div>
            <img src="logo.png" alt="logo">
            <h3 align="center">You won't miss a thing!</h3>
        </div>
        <div class="box login" align="center">
            <div>
                <fieldset
                    style=" border: 6px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
                    <legend style="text-align: center">
                        <h1 align="center">Sign In</h1>
                    </legend>
                </fieldset> <br><br>
                <form method="post" action="UserLogin.php">
                    <!-- <div style="font-size: 20px;margin: 10px;color: white;">Login</div> -->

                    <table>
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

                    <input class="button" type="submit" value="Login"><br><br>

                    <div style="display: flex; justify-content: center;">
                        <a href="UserSignup.php">Click to Signup</a>
                    </div>
                    <br><br>
                </form>
            </div>
        </div>
    </div>
</body>

</html>