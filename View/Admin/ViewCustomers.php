<?php
session_start();
if ($_SESSION['role'] !== "admin" && $_SESSION['role'] !== "employee") {
    header('location: ../UserLogin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers</title>
    <link rel="stylesheet" href="../Assets/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<!-- Msg box success -->
<div class="s-messageBox">
    <label>
        <input type="checkbox" class="alertCheckbox" autocomplete="off" />
        <div class="alert success">
            <span class="alertClose">X</span>
            <span class="alertText">Customer Removed
                <br class="clear" /></span>
        </div>
    </label>
</div>
<!-- Msg Box Error -->
<div class="s-messageBox e-messageBox">
    <label>
        <input type="checkbox" class="alertCheckbox" autocomplete="off" />
        <div class="alert error">
            <span class="alertClose">X</span>
            <span class="alertText">Error, Try Again
                <br class="clear" /></span>
        </div>
    </label>
</div>
<!-- end of msg Box -->

<body>
    <div class="page">
        <div class="AdminPage">
            <?php
            include("Header.php");
            include("../Admin/AdminPanelMenu.php");
            ?>
            <div class="AdminDash">
                <fieldset
                    style=" border: 4px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
                    <legend style="text-align: left">
                        <h1 align="center">Customers</h1>
                    </legend>
                </fieldset>
                <table class="customers">
                    <tr>
                        <th>Customer Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th colspan="2">Action</th>
                    </tr>
                    <?php

                    require_once('../../Controller/CustomerController.php');
                    include_once('../../Controller/Admin/DeleteAction.php');
                    $result = viewCustomers();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>
                            <td>' . $row["User_Id"] . '</td>
                            <td>' . $row["Firstname"] . '</td>
                            <td>' . $row["Lastname"] . '</td>
                            <td>' . $row["Username"] . '</td>
                            <td>' . $row["Phone"] . '</td>
                            <td>' . $row["Address"] . '</td>
                            <td><button class="button btn-crud-2"><a href="../../Controller/Admin/DeleteAction.php?deleteid=' . $row["User_Id"] . '"><i class="bi bi-trash-fill"></i></a></button></td>
                            </tr>';
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="8">
                            <p style="color:red; font-weight:500">
                                <?php if (!empty($_SESSION['message'])) {
                                    if($_SESSION['message'] == "Operation completed successfully"){ ?>
                                <script>
                                document.getElementsByClassName("s-messageBox")[0].style.display =
                                    "block";
                                </script>
                                <?php }else {?>

                                <script>
                                document.getElementsByClassName("e-messageBox")[0].style.display =
                                    "block";
                                </script>

                                <?php }
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                } ?>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <?php
        include("../Footer.php");
        ?>
    </div>
</body>

</html>