<?php

if (!function_exists('ValidateEmpName')) {
    function ValidateEmpName($username)
    {
        include('../../Model/Connection.php');
        $stmt = $con->prepare("SELECT * FROM users WHERE Username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return false;
        } else {
            return true;
        }
        $stmt->close();
    }
}

if (!function_exists('addEmployee')) {
    function addEmployee($username, $firstName, $lastName, $password)
    {
        include('../../Model/Connection.php');
        $stmt = $con->prepare("INSERT INTO Users (Username, Password, Firstname, Lastname, Role) VALUES (?, ?, ?, ?, 'employee')");
        $stmt->bind_param("ssss", $username, $password, $firstName, $lastName);
        $stmt->execute();
        $stmt->close();
    }
}

if (!function_exists('viewEmployee')) {
    function viewEmployee()
    {
        include('../../Model/Connection.php');
        $stmt = $con->prepare("SELECT * FROM users WHERE role = ?");
        $role = 'employee';
        $stmt->bind_param("s", $role);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($result->num_rows > 0) {
            return $result;
        }
        return 0;
    }
}

if (!function_exists('getEmpData')) {
    function getEmpData($userid)
    {
        include('../../Model/Connection.php');
        $stmt = $con->prepare("SELECT * FROM users WHERE User_Id = ? LIMIT 1");
        $stmt->bind_param("i", $userid);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $user_data = $result->fetch_assoc();
        return $user_data;
    }
}

if (!function_exists('userValidity')) {
    function userValidity($username, $userid)
    {
        include('../../Model/Connection.php');
        $stmt1 = $con->prepare("SELECT * FROM users WHERE Username = ?");
        $stmt1->bind_param("s", $username);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
        $stmt1->close();

        if ($result1->num_rows > 0) {
            $stmt2 = $con->prepare("SELECT * FROM users WHERE Username = ? AND User_Id = ?");
            $stmt2->bind_param("si", $username, $userid);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            $stmt2->close();

            if ($result2->num_rows == 1) {
                return true;
            } else {
                return false;
            }
        } else if ($result1->num_rows == 0) {
            return true;
        }
    }
}

if (!function_exists('update')) {
    function update($username, $password, $firstName, $lastName, $userid)
    {
        include('../../Model/Connection.php');
        
        $stmt = $con->prepare("UPDATE users SET Username=?, Password=?, firstname=?, lastname=? WHERE User_Id=?");
        $stmt->bind_param("ssssi", $username, $password, $firstName, $lastName, $userid);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
}

?>