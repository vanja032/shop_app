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
    <title>Shop - Shop Page</title>
    <link rel="icon" type="image/png" href="media/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript" src="js/utils/jquery.min.js"></script>
    <script type="text/javascript" src="js/cart.js"></script>
</head>

<body class="bg-custom1 d-flex flex-column">

    <?php
    $category_dao = new DAOCategory();
    $categories = $category_dao->GetAll();
    ?>

    <?php
    $page = "shop";
    require_once("components/nav.php");
    ?>

    <div class="container-fluid px-auto">
        <div class="row">
            <?php require_once("components/categories_shop.php"); ?>

            <main role="main" class="col ml-sm-auto p-4">
                <?php
                foreach ($items as $item) {
                    ?>
                    <div class="card bg-custom5" style="width: 18rem;">
                        <img class="card-img-top" src="<?= $item->image ?>" alt="Card image cap">
                        <div class="card-body color-custom4">
                            <h5 class="card-title">
                                <?= $item->name ?>
                            </h5>
                            <p class="card-text">
                                <?= substr($item->description, 0, 70) ?>...
                            </p>
                            <p class="card-text color-custom1">
                                Available:
                                <?= ($item->quantity == 1) ? $item->quantity . "pc" : $item->quantity . "pcs" ?>
                            </p>
                            <h6 class="card-text color-custom1">
                                <?= $item->price ?> eur
                            </h6>
                            <div class="input-group w-75 mt-2">
                                <button class="btn btn-outline-secondary color-custom1" type="button"
                                    onclick="decrement(this);">-</button>
                                <input type="number" class="form-control text-center bg-custom2 color-custom1" value="0"
                                    min="0" max="100" onchange="validate_item_number(this);">
                                <button class="btn btn-outline-secondary color-custom1" type="button"
                                    onclick="increment(this);">+</button>
                            </div>
                            <br>
                            <button onclick="add_to_cart(<?= $item->id ?>, 1);" class="btn btn-primary add-to-cart">Add
                                to cart</button>
                        </div>
                    </div>
                    <?php
                }
                ?>
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