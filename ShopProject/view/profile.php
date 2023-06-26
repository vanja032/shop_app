<?php
require_once "../models/structures/User.php";
require_once "../models/structures/Cart.php";
require_once "../controllers/items_controller.php";
require_once "../models/DAOItem.php";

if (!isset($_SESSION))
    session_start();

if (!isset($_SESSION["user"]))
    header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Profile Page</title>
    <link rel="icon" type="image/png" href="media/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript" src="js/utils/jquery.min.js"></script>
    <script type="text/javascript" src="js/cart.js"></script>
</head>

<body class="bg-custom1 d-flex flex-column">

    <?php
    $page = "profile";
    require_once("components/nav.php");
    ?>

    <div class="container py-4 my-4">
        <div class="row">
            <div class="col-12 p-4 col-lg-5 d-flex justify-content-center">
                <img src="<?= ($_SESSION["user"]->profile != "" && $_SESSION["user"]->profile != null) ? $_SESSION["user"]->profile : "media/no-profile.jpg" ?>"
                    class="mx-auto profile_picture rounded-lg">
            </div>
            <div class="col-12 p-4 col-lg-7 d-flex d-lg-block justify-content-center">
                <div>
                    <h2 class="color-custom4">First name: <span class="color-custom1">
                            <?= $_SESSION["user"]->f_name ?>
                        </span>
                    </h2>
                    <h2 class="color-custom4">Last name: <span class="color-custom1">
                            <?= $_SESSION["user"]->l_name ?>
                        </span>
                    </h2>
                    <h2 class="color-custom4">Username: <span class="color-custom1">
                            <?= $_SESSION["user"]->username ?>
                        </span>
                    </h2>
                    <h2 class="color-custom4">Email: <span class="color-custom1">
                            <?= $_SESSION["user"]->email ?>
                        </span>
                    </h2>
                    <h2 class="color-custom4">Role: <span class="color-custom1">
                            <?= $_SESSION["user"]->role->name ?>
                        </span>
                    </h2>
                    <h2 class="color-custom4">Created user: <span class="color-custom1">
                            <?= $_SESSION["user"]->created ?>
                        </span>
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <?php require_once "components/footer.php"; ?>

    <script type="text/javascript" src="js/utils/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <?php require_once "components/toast.php"; ?>
</body>

</html>