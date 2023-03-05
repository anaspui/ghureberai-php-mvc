<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Visited Places</title>
    <link rel="stylesheet" href="index.css">
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
                        <h1 align="center">Top Visited Places</h1>
                    </legend>
                </fieldset>
            </div>
        </div>




        <?php
        include("Footer.php");
        ?>
    </div>
</body>

</html>