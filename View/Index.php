<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../View/Assets/index.css">
</head>

<body>
    <div class="page">
        <?php
        session_start();
        include("Header.php");
        include("Body.php");
        include("Footer.php");
        ?>
    </div>
    <script src="../View/js/chatModal.js"></script>
</body>

</html>