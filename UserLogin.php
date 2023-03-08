<?php
session_set_cookie_params(0);
session_start();


include("Connection.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['LoginError'] = "";

    if (!empty($username) && !empty($password) && !is_numeric($username)) {

        $query = "select * from users where Username = '$username' limit 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['Password'] === $password) {

                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $user_data['Email'];
                    header("Location: Index.php");
                }
                $_SESSION['LoginError'] = "Incorrect username or password!";

            }
            $_SESSION['LoginError'] = "Incorrect username or password!";
        }
        // else {
        //     $_SESSION['LoginError'] = "The Username or Password that you've entered is incorrect.";

        // }

        // echo "wrong username or password!";
    } else if (empty($username) && empty($password)) {
        $_SESSION['LoginError'] = "Please enter your username and password.";
    }
    $query2 = "SELECT * FROM users WHERE username = '" . $username . "' AND role = 'admin' LIMIT 1;";
    $result2 = mysqli_query($con, $query2);
    if ($result2 && mysqli_num_rows($result2) > 0) {
        $_SESSION['role'] = 'admin';
    } else {
        $_SESSION['role'] = 'notAdmin';
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
                            <td><input type="password" name="password" id="password"></td>

                        </tr>
                        <tr>
                            <td colspan="3">
                                <?php if (isset($_SESSION['LoginError'])) { ?>
                                    <p class="error">
                                        <?php echo $_SESSION['LoginError']; ?>
                                    </p>
                                    <?php
                                } ?>
                            </td>
                        </tr>
                    </table>

                    <input class="button" type="submit" value="Login"><br><br>

                    <div style="display: flex; justify-content: center;">
                        <a href="UserSignup.php">Click to Signup
                            <?php $_SESSION['LoginError'] = ""; ?>
                        </a>
                    </div>
                    <br><br>
                </form>
            </div>
        </div>
    </div>
</body>

</html>