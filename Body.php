<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Body</title>
    <link rel="stylesheet" href="index.css">s
</head>

<body>
    <div class="Body">
        <?php

        echo "Welcome," . $_SESSION['username'] ?>
        <?php

        echo "Welcome," . $_SESSION['role'] ?>

    </div>
    <div class="Body">
        <?php

        echo "Welcome," . $_SESSION['username'] ?>

    </div>
</body>

</html>