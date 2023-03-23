<?php
function validateUser($username, $password)
{
    require("Connection.php");
    $query = "select * from users where Username = '$username' limit 1";
    $result = mysqli_query($con, $query);

    if ($result) {
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data['Password'] === $password) {
                $_SESSION['User_Id'] = $user_data['User_Id'];
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $user_data['Email'];
                return true;
            }
        }
    }
    mysqli_close($con);

}

function userType($username)
{
    require("Connection.php");
    $query2 = "SELECT * FROM users WHERE username = '" . $username . "' AND role = 'admin' LIMIT 1;";
    $result2 = mysqli_query($con, $query2);
    $query3 = "SELECT * FROM users WHERE username = '" . $username . "' AND role = 'employee' LIMIT 1;";
    $result3 = mysqli_query($con, $query3);
    if ($result2 && mysqli_num_rows($result2) > 0) {
        $role = 'admin';
    } else if ($result3 && mysqli_num_rows($result3) > 0) {
        $role = 'employee';
    } else {
        $role = 'customer';
    }
    mysqli_close($con);
    return $role;
}


?>