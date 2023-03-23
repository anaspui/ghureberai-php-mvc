<?php
session_start();
if ($_SESSION['role'] !== "admin" && $_SESSION['role'] !== "employee") {
    header('location: UserLogin.php');
    exit();
}
include 'Connection.php';
if (isset($_GET['updateid'])) {
    $Hotel_Id = $_GET['updateid'];
    $query = "select * from hotels where Hotel_Id = '$Hotel_Id' limit 1";
    $result = mysqli_query($con, $query);
    $hotel_data = mysqli_fetch_assoc($result);
}
$Hotel_Name = $hotel_data['Hotel_Name'];
$Location = $hotel_data['Location'];
$Description = $hotel_data['Description'];
$Image_url = $hotel_data['Image'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Update Hotel</title>
    <style>
        .check {
            padding-top: 150px;
            padding-left: 420px;
            align-items: center;
            color: #3B577D;
            text-align: center;
        }

        .check button {
            color: white !important;
            background-color: green;
            align: center;
        }
    </style>
</head>

<body>


    <div class="">

        <div class="AdminPage">
            <?php
            include('Header.php');
            include('AdminPanelMenu.php');
            ?>
            <div class="check ">
                <fieldset
                    style=" border: 6px solid #3B577D; border-bottom: none; border-left: none; border-right: none;">
                    <legend style="text-align: center">
                        <h1 align="center">Update Hotel</h1>
                    </legend>
                </fieldset><br>


                <form method="POST" action="UpdateHotelAction.php?updateid=<?php echo $Hotel_Id ?>">
                    <table align="center" style="text-align: left">
                        <tr>
                            <td><label for="Hotel_Name">Hotel Name</label></td>
                            <td>:</td>
                            <td><Input type="text" name="Hotel_Name" id="Hotel_Name"
                                    value="<?php echo $Hotel_Name ?>"></Input>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="Location">Location</label></td>
                            <td>:</td>
                            <td><Input type="text" name="Location" id="Location"
                                    value="<?php echo $Location ?>"></Input>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="Description">Description </label></td>
                            <td>:</td>
                            <td><Input type="text" name="Description" id="Description"
                                    value="<?php echo $Description ?>"></Input>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="Image">Image URL </label></td>
                            <td>:</td>
                            <td><input type="text" name="Image" id="Image" value="<?php echo $Image_url ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p style="color:red; font-weight:500">
                                    <?php if (!empty($_SESSION['UpdateHotelError'])) {
                                        echo $_SESSION['UpdateHotelError'];
                                        unset($_SESSION['UpdateHotelError']);
                                    } ?>
                                </p>
                            </td>
                        </tr>

                    </table>
                    <div>
                        <button class="button" name="submit" type="submit" value="Update">Update</button><br><br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    include('Footer.php');
    ?>
</body>

</html>