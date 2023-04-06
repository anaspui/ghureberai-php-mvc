<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/index.css">
    <title>Packages</title>
</head>

<body>

    <div class="PackagesBody">
        <div class="PcardContainer">
            <?php
            include('../Controller/PackagesController.php');
            $page = 1;
            echo showPackages($page);
            ?>

        </div>


    </div>
</body>

</html>