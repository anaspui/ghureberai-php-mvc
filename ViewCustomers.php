<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers</title>
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
            include("Header.php");
            include("AdminPanelMenu.php");
            ?>
            <div class="AdminDash">
                <fieldset
                    style=" border: 4px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
                    <legend style="text-align: left">
                        <h1 align="center">Customers</h1>
                    </legend>
                </fieldset>
                <table id="viewEmp">
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
                    include('Connection.php');
                    // $conn = mysqli_connect("localhost", "root", "", "GhureBerai");
                    $sql = "SELECT * FROM users WHERE role = 'customer'";

                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>
                            <td>' . $row["User_Id"] . '</td>
                            <td>' . $row["Firstname"] . '</td>
                            <td>' . $row["Lastname"] . '</td>
                            <td>' . $row["Username"] . '</td>
                            <td>' . $row["Phone"] . '</td>
                            <td>' . $row["Address"] . '</td>
                            <td><button class="button btn-crud-2"><a href="DeleteAction.php?deleteid=' . $row["User_Id"] . '">Delete</a></button></td>
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