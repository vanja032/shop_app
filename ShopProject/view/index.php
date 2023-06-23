<?php
require_once "../models/structures/User.php";
require_once "../controllers/items_controller.php";

if (!isset($_SESSION))
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Home Page</title>
    <link rel="icon" type="image/png" href="media/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript" src="js/utils/jquery.min.js"></script>
    <!-- <script type="module" src="js/login.js"></script> -->
</head>

<body class="bg-custom1 d-flex flex-column">

    <?php
    $page = "home";
    require_once("components/nav.php");
    ?>

    <div class="flex-grow-1"></div>
    <footer class="footer">
        <div class="row py-4 px-5 m-0">
            <div class="col-md-3 text-center py-2 d-flex align-items-center justify-content-center">
                <img src="media/logo.png" class="page-logo" alt="Shop footer Logo">
            </div>
            <div class="col text-center py-2 d-flex align-items-center justify-content-center">
                <p class="copyright m-0">
                    <span class="cp-symbol">&copy; 2023 Shop App company.</span> All rights reserved.
                </p>
            </div>
            <div class="col-md-3 text-center py-2 d-flex align-items-center justify-content-center">
                <div class="social-icons">
                    <a href="#" target="_blank" class="px-2"><i class="fab fa-facebook"></i></a>
                    <a href="#" target="_blank" class="px-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank" class="px-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" target="_blank" class="px-2"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="js/utils/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>

</html>