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
</head>

<body>

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        .page {
            background-color: #439A97;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #text {

            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }

        #button {

            padding: 10px;
            width: 100px;
            color: white;
            background-color: #22A39F;
            border: none;
        }

        #box {

            background-color: #434242;
            box-shadow: 1px 1px 30px #434242;
            margin: auto;
            width: 250px;
            height: 300px;
            padding: 80px;
        }

        a:link {
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
        }
    </style>

    <div class="page">
        <div id="box">

            <form method="post" action="UserLogin.php">
                <div style="font-size: 20px;margin: 10px;color: white;">Login</div>

                <input id="text" type="text" name="username"><br><br>
                <input id="text" type="password" name="password"><br><br>

                <input id="button" type="submit" value="Login"><br><br>

                <a href="UserSignup.php">Click to Signup</a><br><br>
            </form>
        </div>
    </div>
</body>

</html>