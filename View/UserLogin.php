<?php
session_start();

if (isset($_COOKIE['remember_me'])) {
  list($username, $password) = explode(':', $_COOKIE['remember_me']);
} else {
  $username = '';
  $password = '';
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="icon" href="logo.svg">
    <link rel="stylesheet" href="./Assets/style.css">
</head>

<body>


    <div class="page login-page">
        <div>
            <img src="../images/logo.png" alt="logo">
            <h3 align="center">You won't miss a thing!</h3>
        </div>
        <div class="box login" align="center">
            <div>
                <fieldset
                    style=" border: 6px solid #dc9e4a; border-bottom: none; border-left: none; border-right: none;">
                    <legend style="text-align: center">
                        <h1 align="center">Sign In</h1>
                    </legend>
                </fieldset> <br><br>
                <form method="post" action="../Controller/UserLoginController.php" onsubmit="return loginCheck()">

                    <table>
                        <tr>
                            <td><label for="Username">Username </label></td>
                            <td>:</td>
                            <td><Input type="text" name="username" id="username"
                                    value="<?php echo htmlspecialchars($username); ?>"></Input></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="ErrorMsg" id="usernameErr"></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="password">Password </label></td>
                            <td>:</td>
                            <td><input type="password" name="password" id="password"
                                    value="<?php echo htmlspecialchars($password); ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="ErrorMsg" id="passErr"></p>
                            </td>
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
                        <tr>
                            <td colspan="3">
                                <label for="remember_me"><input type="checkbox" name="remember_me" id="remember_me"
                                        value="1" <?php 
                                        if(isset($_COOKIE['remember_me'])) echo 'checked';   ?>> Remember
                                    me</label>
                            </td>
                        </tr>
                    </table>
                    <input class="button" type="submit" value="Login"><br><br>
                    <div style="display: flex; justify-content: center;">
                        <a class="link" href="../View/UserSignup.php">Click to Signup
                            <?php $_SESSION['LoginError'] = ""; ?>
                        </a>
                    </div>
                    <br><br>
                </form>
            </div>
        </div>
    </div>
    <script src="../View/js/Login.js"></script>
</body>

</html>