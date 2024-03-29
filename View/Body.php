<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Body</title>
    <link rel="stylesheet" href="../View/Assets/index.css">
    <script src="https://kit.fontawesome.com/770386d574.js" crossorigin="anonymous"></script>
</head>

<body class="home-body">
    <div class="LandingBody">
        <div class="LandingBox">
            <br><br><br>
            <h1>Experience the magic of travel with GhureBerai's immersive experiences</h1>
            <div class="BookBox2">
                <input type="text" placeholder="Search...">
            </div>
        </div>
    </div>
    <div class="Body">
        <div class="PcardContainer">
            <?php
            include('../Model/Connection.php');
            $sql = "SELECT * FROM packages ORDER BY RAND() LIMIT 3;";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="Pcard">
                                <div class="Pcard-header" style="background-color:#cc4545">
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
                                    <div class="BookBtn"> <button style="background-color:#cc4545"><a href="Packages.php">Check Out!</a></button></div>
                                </div>
                            </div>';
                }
            }
            mysqli_close($con);
            ?>
        </div>
        <fieldset style=" border: 2px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
            <legend style="text-align: center">
                <a href="Packages.php" style="font-size:30px">
                    << See Packages>>
                </a>
            </legend>
        </fieldset>
    </div>
    <div>
        <div class="modal-btn-container">
            <button class="chat-btn">
                <i class="far fa-comment" style="color: #ffffff;"></i>
            </button>

            <div class="chat-modal">
                <div class="modal-header">
                    <div>
                        <h1>Support Message</h1>
                    </div>
                    <div class="modal-control">
                        <!-- <i class="fas fa-minus modal-minus-btn"></i> -->
                        <i class="fas fa-times modal-close-btn"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="chat sender">
                        <div class="container">
                            <p>This is sender</p>
                        </div>
                    </div>
                    <div class="chat receiver">
                        <div class="container">
                            <p>This is receiver</p>
                        </div>
                    </div>
                </div>
                <form class="modal-footer">
                    <input type="text" placeholder="Enter your query" name="chat-box" id="chat-box">
                    <button type="submit">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>