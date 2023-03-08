<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Selling Packages</title>
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
                        <h1 align="center">Top Selling Packages</h1>
                    </legend>
                </fieldset>
                <table id="viewEmp">
                    <tr>
                        <th>Name</th>
                        <th>Hotel Name</th>
                        <th>Sold</th>
                        <th>Package Left</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    <?php
                    include('Connection.php');
                    $sql = "SELECT * FROM packages WHERE P_sold ORDER BY P_sold DESC;";

                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr><td>' . $row["Name"] . '</td><td>' . $row["Hotel_Name"] . '</td><td>' . $row["P_sold"] . '</td><td>' . $row["P_left"] . '</td><td>' . $row["Created_at"] . '</td><td>' . $row["Updated_at"] . '</td></tr>';


                        }
                    }
                    ?>
                </table>
            </div>
        </div>




        <?php
        include("Footer.php");
        ?>
    </div>
</body>

</html>