<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Packages</title>
    <link rel="stylesheet" href="index.css">
    <style>
        #viewEmp th,
        tr,
        td {
            /* border: 1px solid black; */
            width: 250px;
            text-align: center;
            border-bottom: 1px solid #3B577D;
            border-right: 1px solid #3B577D;
            ;
        }
    </style>
</head>

<body>
    <div class="page">
        <div class="AdminPage">
            <?php
            session_start();
            if (!isset($_SESSION['message'])) {
                $_SESSION['message'] = "";
            }
            include("Header.php");
            include("AdminPanelMenu.php");
            ?>
            <div class="AdminDash">
                <fieldset
                    style=" border: 4px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
                    <legend style="text-align: left">
                        <h1 align="center">Packages</h1>
                    </legend>
                </fieldset>
                <table id="viewEmp">
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
                    include('Connection.php');
                    $sql = "SELECT * FROM packages;";

                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>
                            <td>' . $row["Name"] . '</td>
                            <td>' . $row["Hotel_Name"] . '</td>
                            <td>' . $row["Created_at"] . '</td>
                            <td>' . $row["Updated_at"] . '</td>
                            <td>' . $row["Start_Date"] . '</td>
                            <td>' . $row["End_Date"] . '</td>
                            <td><button class="button btn-crud"><a href="UpdatePackage.php?updatePack=' . $row["Package_Id"] . '">Update</a></button></td>
                            <td><button class="button btn-crud-2"><a href="DeleteAction.php?deletePack=' . $row["Package_Id"] . '">Delete</a></button></td>
                            </tr>';
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="8">
                            <p style="color:red; font-weight:500">
                                <?php if (!empty($_SESSION['message'])) {
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
        include("Footer.php");
        ?>
    </div>
</body>

</html>