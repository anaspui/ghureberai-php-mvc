<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <link rel="stylesheet" href="index.css">
    <style>
        #viewEmp th,
        tr {
            /* border-radius: 5px; */
            background-color: #ddf5f7;
            color: #3b577d;
            width: 500px;
            text-align: center;
            border-bottom: 1px solid #3B577D;
            border-right: 1px solid #3B577D;
            ;
        }
    </style>
</head>

<body>
    <?php include('Header.php'); ?>


    <div class="BookBodyControl">
        <div class="BookBox">
            <form action="Hotels.php">

                <input type="text" placeholder="Search...">
                <?php
                include('Connection.php');
                $sql = "SELECT Hotel_Name FROM hotels";
                $result = $con->query($sql);
                echo "<select class='hselect' name='Hotel_Name'>";
                echo "<option value=''>Available Hotels</option>";
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["Hotel_Name"] . "'>" . $row["Hotel_Name"] . "</option>";
                }
                echo "</select>";
                ?>
                <?php
                include('Connection.php');
                $sql = "SELECT DISTINCT Location FROM hotels;";
                $result = $con->query($sql);
                // $die = mysqli_error($con);
                // var_dump($die);
                echo "<select class='hselect' name='Location'>";
                echo "<option value=''>Location</option>";
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["Location"] . "'>" . $row["Location"] . "</option>";
                }
                echo "</select>";
                ?>
                <button type="submit" name="search">Search</button>
            </form>
        </div>
        <div class="BookBoxResult">
            <br>
            <table>
                <tr>
                    <th>Hotel Name</th>
                    <th>Location</th>
                    <th>Description</th>
                </tr>
                <?php
                include('Connection.php');
                if (isset($_GET['search'])) {
                    $hotelName = $_GET['Hotel_Name'];
                    $location = $_GET['Location'];
                    $sql = "SELECT * FROM hotels WHERE Hotel_Name LIKE '%$hotelName%' AND Location LIKE '%$location%'";
                } else {
                    $sql = "SELECT * FROM hotels";
                }
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>
                        <td>' . $row["Hotel_Name"] . '</td>
                        <td>' . $row["Location"] . '</td>
                        <td>' . $row["Description"] . '</td>
                        </tr>';
                    }
                } else {
                    echo "<tr><td colspan='3'>No hotels found</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>



    <?php include('Footer.php'); ?>
</body>

</html>