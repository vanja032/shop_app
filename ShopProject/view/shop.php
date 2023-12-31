<?php
require_once "../models/structures/User.php";
require_once "../models/structures/Cart.php";
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
                <div class="row">
                    <?php
                    foreach ($items as $item) {
                        ?>
                        <div class="card bg-custom5 m-2" style="width: 18rem;">
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
                                    Price:
                                    <?= $item->price ?> eur
                                </h6>
                                <div class="input-group w-75 mt-2 quantity-container">
                                    <button class="btn btn-outline-secondary color-custom1" type="button"
                                        onclick="decrement(this);">-</button>
                                    <input type="number" class="form-control text-center bg-custom2 color-custom1" value="1"
                                        min="1" max="100" onchange="validate_item_number(this);">
                                    <button class="btn btn-outline-secondary color-custom1" type="button"
                                        onclick="increment(this);">+</button>
                                </div>
                                <br>
                                <button onclick="AddToCart(<?= $item->id ?>, this);" class="btn btn-primary add-to-cart">Add
                                    to cart</button>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </main>
        </div>
    </div>

    <?php require_once "components/footer.php"; ?>

    <script type="text/javascript" src="js/utils/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <?php require_once "components/toast.php"; ?>
</body>

</html>