<?php
function validateUser($username, $password) {
    require("Connection.php");
    $query = "SELECT * FROM users WHERE Username = ? LIMIT 1;";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = $result->fetch_assoc();
            if ($user_data['Password'] === $password) {
                $_SESSION['User_Id'] = $user_data['User_Id'];
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $user_data['Email'];
                $stmt->close();
                $con->close();
                return true;
            }
        }
    }
    $stmt->close();
    $con->close();
}

function userType($username)
{
    require("Connection.php");
    $query = "SELECT * FROM users WHERE username = ? AND role = ? LIMIT 1;";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ss", $username, $role);

    $role = 'admin';
    $stmt->execute();
    $result2 = $stmt->get_result();

    $role = 'employee';
    $stmt->execute();
    $result3 = $stmt->get_result();

    if ($result2 && mysqli_num_rows($result2) > 0) {
        $role = 'admin';
    } else if ($result3 && mysqli_num_rows($result3) > 0) {
        $role = 'employee';
    } else {
        $role = 'customer';
    }

    $stmt->close();
    $con->close();

    return $role;
}



?>