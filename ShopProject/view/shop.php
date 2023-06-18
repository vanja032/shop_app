<?php
require_once "../models/structures/User.php";
require_once "../models/DAOCategory.php";

if (!isset($_SESSION))
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Shop Page</title>
    <link rel="icon" type="image/png" href="media/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript" src="js/utils/jquery.min.js"></script>
    <!-- <script type="module" src="js/login.js"></script> -->
</head>

<body class="bg-custom1 d-flex flex-column">

    <?php
    $category_dao = new DAOCategory();
    $categories = $category_dao->GetAll();
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-custom2 py-3 px-5">
        <a class="navbar-brand" href="shop.php"><img class="page-logo pr-4" src="media/logo.png" style="height: 50px;">
            Shop App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topMenu"
            aria-controls="topMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse my-4 my-lg-1" id="topMenu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item px-2">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item px-2 active">
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item dropdown d-lg-none">
                    <a class="nav-link px-2 dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">All categories</a>

                        <?php
                        foreach ($categories as $category) {
                            ?>
                            <a class="dropdown-item" href="#">
                                <?= $category->name ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <?php
                if (!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
                    ?>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <?php
                }
                ?>
                <?php
                if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link px-2 dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                            User <i class="fa fa-user-circle" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-profile">
                            <a class="dropdown-item" href="#">Profile</a>
                            <?php
                            if (strtolower($_SESSION["user"]->role->name) === "user") {
                                ?>
                                <a class="dropdown-item" href="#">My orders</a>
                                <?php
                            }
                            ?>
                            <a class="dropdown-item" href="#">Dashboard</a>
                            <a class="dropdown-item"
                                href="../controllers/logout_controller.php?action=logout&location=shop">Logout</a>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </nav>

    <div class="container-fluid px-auto">
        <div class="row">
            <nav class="col-md-2 d-none d-lg-block sidebar py-4">
                <div class="sidebar-sticky d-flex flex-column">
                    <ul class="nav flex-column">
                        <li class="nav-item py-2">
                            <a class="nav-link active" href="#">
                                All categories
                            </a>
                        </li>
                        <?php
                        foreach ($categories as $category) {
                            ?>
                            <li class="nav-item py-2">
                                <a class="nav-link" href="#">
                                    <?= $category->name ?>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <div class="flex-grow-1"></div>
                </div>
            </nav>

            <main role="main" class="col ml-sm-auto px-0">

            </main>
        </div>
    </div>
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