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
    <title>Shop - About Page</title>
    <link rel="icon" type="image/png" href="media/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript" src="js/utils/jquery.min.js"></script>
    <script type="text/javascript" src="js/cart.js"></script>
</head>

<body class="bg-custom1 d-flex flex-column">

    <?php
    $page = "about";
    require_once("components/nav.php");
    ?>

    <div class="container py-4 my-4">
        <h5 class="color-custom4">"Welcome to <span class="color-custom1">Shop App</span>, your ultimate destination for
            all your shopping needs! Our shop
            app is designed to bring you a seamless and convenient shopping experience right at your fingertips.
            <br><br>
            At <span class="color-custom1">Shop App</span>, we believe that shopping should be a joyous and personalized
            experience. Whether you're looking
            for trendy fashion, stylish accessories, or the latest gadgets, we have carefully curated a wide range of
            products to cater to your unique tastes and preferences.
            <br><br>
            With our user-friendly interface, browsing through our extensive catalog is a breeze. Discover new arrivals,
            explore different categories, and find exactly what you're searching for with ease. Our intuitive search
            function and smart filters make it simple to narrow down your choices, ensuring you quickly find the perfect
            item.
            <br><br>
            We take pride in offering high-quality products from trusted brands and independent designers. Every item in
            our collection has been handpicked for its exceptional quality, style, and value. From fashion-forward
            clothing to cutting-edge electronics, each product has been carefully vetted to ensure your utmost
            satisfaction.
            <br><br>
            We understand the importance of customer satisfaction, and our dedicated support team is always ready to
            assist you. If you have any questions, concerns, or need help with your order, don't hesitate to reach out
            to us. Your shopping experience is our top priority, and we strive to provide prompt and friendly assistance
            to make your journey with us seamless and enjoyable.
            <br><br>
            With secure payment options and reliable shipping services, we ensure that your purchases arrive at your
            doorstep swiftly and safely. Our commitment to customer privacy and data security means you can shop with
            confidence, knowing that your personal information is protected.
            <br><br>
            Thank you for choosing <span class="color-custom1">Shop App</span> as your preferred shopping destination.
            We're thrilled to have you on board
            and look forward to serving you with the latest trends, exclusive offers, and an exceptional shopping
            experience. Happy shopping!"
        </h5>
    </div>

    <?php require_once "components/footer.php"; ?>

    <script type="text/javascript" src="js/utils/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <?php require_once "components/toast.php"; ?>
</body>

</html>