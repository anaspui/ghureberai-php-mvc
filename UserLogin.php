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

    <style type="text/css">
    * {
        margin: 0;
        padding: 0;
    }

    .page {
        /* background-color: #DDF5F7; */
        /* height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center; */

        /* height: 100vh;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        justify-items: center;
        align-items: center; */

        /* height: 100vh;

        display: flex;
        justify-content: center;
        align-items: center;
        gap: 100px; */


    }

    /* #username {

        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        width: 100%;
    }

    #password {

        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        width: 100%;
    } */
    /* 
    #button {
        margin-left: 160px;
        padding: 10px;
        width: 100px;
        color: white;
        background-color: #22A39F;
        border: none;

    } */

    /* #box {

            background-color: #DDF5F7;
            box-shadow: 1px 1px 30px #434242;
            width: 250px;
            height: 300px;
            padding: 80px;
            border-radius: 10px;
        } */

    /* a:link {
        color: green;
        background-color: transparent;
        text-decoration: none;
    }

    a:visited {
        color: pink;
        background-color: transparent;
        text-decoration: none;
    }

    a:hover {
        color: red;
        background-color: transparent;
        text-decoration: underline;
    }

    a:active {
        color: yellow;
        background-color: transparent;
        text-decoration: underline;
    } */
    </style>

    <div class="page login-page">
        <div>
            <img src="logo.png" alt="logo">
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
                            <th><label for="Username">Username </label></th>
                            <td>:</td>
                            <td><Input type="text" name="username" id="username"></Input></td>
                        </tr>
                        <tr>
                            <th><label for="password">Password </label></th>
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