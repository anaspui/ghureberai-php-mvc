<?php
session_start();
if ($_SESSION['role'] !== "admin" && $_SESSION['role'] !== "employee") {
    header('location: ../../View/UserLogin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Packages</title>
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
            <span class="alertText">Package Removed
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
            if (!isset($_SESSION['message'])) {
                $_SESSION['message'] = "";
            }
            include("Header.php");
            include("../Admin/AdminPanelMenu.php");
            ?>
            <div class="AdminDash">
                <fieldset
                    style=" border: 4px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
                    <legend style="text-align: left">
                        <h1 align="center">Packages</h1>
                    </legend>
                </fieldset>
                <table class="customers">
                    <tr>
                        <th>Package Name</th>
                        <th>Hotel Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th colspan="2">Action</th>
                    </tr>
                    <?php
                    require('../../Controller/PackagesController.php');
                    include_once('../../Controller/Admin/DeleteAction.php');
                    $page = 2;
                    $result = viewAllPackages($page);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>
                            <td>' . $row["Name"] . '</td>
                            <td>' . $row["Hotel_Name"] . '</td>
                            <td>' . $row["Created_at"] . '</td>
                            <td>' . $row["Updated_at"] . '</td>
                            <td>' . $row["Start_Date"] . '</td>
                            <td>' . $row["End_Date"] . '</td>
                            <td><button class="button btn-crud"><a href="UpdatePackage.php?updatePack=' . $row["Package_Id"] . '"><i class="bi bi-pencil-square"></i></a></button><button class="button btn-crud-2"><a href="../../Controller/Admin/DeleteAction.php?deletePack=' . $row["Package_Id"] . '"><i class="bi bi-trash-fill"></i></a></button></td>
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