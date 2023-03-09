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
</head>

<body>
    <?php include('Header.php'); ?>

    <div class="BookBodyControl">
        <div class="BookBox">
            <form action="/search">
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
                $sql = "SELECT Location FROM hotels";
                $result = $con->query($sql);
                echo "<select class='hselect' name='Location'>";
                echo "<option value=''>Location</option>";
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["Location"] . "'>" . $row["Location"] . "</option>";
                }
                echo "</select>";
                ?>
                <button type="submit">Search</button>
            </form>
        </div>
        <div class="BookBoxResult">
        </div>

    </div>


    <?php include('Footer.php'); ?>
</body>

</html>