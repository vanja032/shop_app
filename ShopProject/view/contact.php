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
    <title>Shop - Contact Page</title>
    <link rel="icon" type="image/png" href="media/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript" src="js/utils/jquery.min.js"></script>
    <script type="text/javascript" src="js/cart.js"></script>
</head>

<body class="bg-custom1 d-flex flex-column">

    <?php
    $page = "contact";
    require_once("components/nav.php");
    ?>

    <div class="container py-4 my-4">
        <h5 class="color-custom4">
            No available contact info
        </h5>
    </div>

    <?php require_once "components/footer.php"; ?>

    <script type="text/javascript" src="js/utils/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <?php require_once "components/toast.php"; ?>
</body>

</html>