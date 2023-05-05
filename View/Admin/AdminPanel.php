<?php
session_start();
if ($_SESSION['role'] !== "admin" && $_SESSION['role'] !== "employee") {
    header('location: ../../View/UserLogin.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../Assets/index.css">
    <script src="https://kit.fontawesome.com/770386d574.js" crossorigin="anonymous"></script>
</head>

<body>
    <div>
        <div class="AdminPage">
            <?php
            include("Header.php");
            include('AdminPanelMenu.php');
            include('AdminDashboard.php');
            ?>
        </div>
    </div>
    <div>
        <?php
        include("../Footer.php");
        ?>
    </div>
    <div>
        <div class="modal-btn-container">
            <button class="chat-btn">
                <i class="far fa-comment" style="color: #ffffff;"></i>
            </button>

            <div class="chat-modal">
                <div class="modal-header">
                    <div id="dismiss-btn">
                        <h1>Support Message</h1>
                        <!-- <button>Dismiss</button> -->
                        <input type="button" value="Dismiss">
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
    <script src="../../View/js/chatModal.js"></script>
</body>

</html>