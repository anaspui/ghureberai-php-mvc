<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Hotels</title>
    <link rel="stylesheet" href="index.css">
    <style>
        #viewEmp th,
        td,
        tr {
            border: 1px solid black;
            width: 250px;
            text-align: center;
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
                        <h1 align="center">Hotels</h1>
                    </legend>
                </fieldset>
                <table id="viewEmp">
                    <tr>
                        <th>Hotel Id</th>
                        <th>Hotel Name</th>
                        <th>Location</th>
                        <th>Description</th>
                        <th>Created At</th>
                    </tr>
                    <?php
                    include('Connection.php');
                    $sql = "SELECT * FROM hotels";

                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr><td>' . $row["Hotel_Id"] . '</td><td>' . $row["Hotel_Name"] . '</td><td>' . $row["Location"] . '</td><td>' . $row["Description"] . '</td><td>' . $row["Created_at"];


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