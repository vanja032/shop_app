<?php
require_once "../models/structures/User.php";
require_once "../models/structures/Cart.php";
require_once "../controllers/items_controller.php";
require_once "../models/DAOItem.php";

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
    <script type="text/javascript" src="js/cart.js"></script>
</head>

<body class="bg-custom1 d-flex flex-column">

    <?php
    $page = "index";
    require_once("components/nav.php");
    ?>

    <div class="container py-4">
        <h3 class="color-custom4 my-4 px-4 mx-auto col col-xl-10">
            <?= (isset($_SESSION["user"])) ? "Welcome, <span class='color-custom1'>" . $_SESSION['user']->f_name . " " . $_SESSION['user']->l_name . "</span>" : "Not signed in, please sign in to buy items" ?>
        </h3>
        <h1 class="color-custom4 my-4 px-4 mx-auto col col-xl-10">
            Check our new items, go to <a href="shop.php" class="link-custom1">Shop</a>
        </h1>
        <div id="myCarousel" class="carousel slide px-4 mx-auto my-4 py-2 col col-xl-10" data-ride="carousel">
            <?php
            $item_dao = new DAOItem();
            $last_items = $item_dao->GetLast(10);
            ?>
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <?php
                foreach ($last_items as $index => $item) {
                    ?>
                    <li data-target="#myCarousel" data-slide-to="<?= $index ?>"
                        class="<?= ($index == 0) ? 'active' : '' ?>">
                    </li>
                    <?php
                }
                ?>
            </ul>

            <!-- Slides -->
            <div class="carousel-inner rounded-lg">
                <?php
                foreach ($last_items as $index => $item) {
                    ?>
                    <div class="carousel-item <?= ($index == 0) ? 'active' : '' ?> col" alt="Image <?= ($index + 1) ?>"
                        style="background-image: url('<?= $item->image ?>');">
                    </div>
                    <?php
                }
                ?>
            </div>

            <!-- Controls -->
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>

    <?php require_once "components/footer.php"; ?>

    <script type="text/javascript" src="js/utils/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <?php require_once "components/toast.php"; ?>
</body>

</html>