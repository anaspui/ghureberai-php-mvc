<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Packages</title>
</head>

<body>
    <div class="PackagesBody">
        <div class="PcardContainer">
            <?php
            include('Connection.php');
            $sql = "SELECT * FROM packages";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="Pcard">
                                <div class="Pcard-header">
                                    <p>' . $row["Name"] . '</p>
                                </div>
                                <div class="Pcard-body">
                                    <table>
                                    <tr>
                                            <th>Hotel</th>
                                            <td>:</td>
                                            <td>' . $row["Hotel_Name"] . '</td>
                                        </tr>
                                        <tr>
                                            <th>Duration</th>
                                            <td>:</td>
                                            <td>' . $row["Days"] . ' Days</td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td>:</td>
                                            <td>' . $row["Price"] . ' BDT</td>
                                        </tr>
                                        <tr>
                                            <th>Time</th>
                                            <td>:</td>
                                            <td>' . date('d F', strtotime($row['Start_Date'])) . '</td>
                                        </tr>
                                    </table>
                                    <div class="BookBtn"> <button><a href="BookAction.php?Package_Id=' . $row['Package_Id'] . '">Book
                                            Now</a></button></div>
                                </div>
                            </div>';
                }
            }
            ?>

        </div>

    </div>
</body>

</html>