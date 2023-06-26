<?php
require_once "../models/structures/User.php";
require_once "../models/structures/Cart.php";
require_once "../controllers/items_controller.php";
require_once "../models/DAOOrder.php";

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
    <title>Shop - User orders Page</title>
    <link rel="icon" type="image/png" href="media/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript" src="js/utils/jquery.min.js"></script>
    <script type="text/javascript" src="js/cart.js"></script>
    <script type="text/javascript" src="js/orders.js"></script>
</head>

<body class="bg-custom1 d-flex flex-column">

    <?php
    $page = "my_orders";
    require_once("components/nav.php");
    ?>

    <div class="container py-4 my-4">
        <?php
        $orders_dao = new DAOOrder();
        $user_orders = $orders_dao->GetByUser($_SESSION["user"]);
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="color-custom1">#</th>
                    <th scope="col" class="color-custom1">Items</th>
                    <th scope="col" class="color-custom1">Status</th>
                    <th scope="col" class="color-custom1">Memo</th>
                    <th scope="col" class="color-custom1">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($user_orders as $order) {
                    ?>
                    <tr>
                        <th scope="row" class="color-custom1">
                            <?= $order->id ?>
                        </th>
                        <td class="color-custom4">
                            <?= count($order->items) ?>
                        </td>
                        <td class="status color-custom4">
                            <?php
                            switch (strtolower($order->status->name)) {
                                case "pending":
                                    echo "<span class='warning-color'>" . $order->status->name . "</span>";
                                    break;
                                case "rejected":
                                    echo "<span class='invalid-color'>" . $order->status->name . "</span>";
                                    break;
                                case "canceled":
                                    echo "<span class='inactive-color'>" . $order->status->name . "</span>";
                                    break;
                                case "approved":
                                    echo "<span class='valid-color'>" . $order->status->name . "</span>";
                                    break;
                                default:
                                    echo "<span>" . $order->status->name . "</span>";
                                    break;
                            }
                            ?>
                        </td>
                        <td class="color-custom4">
                            <?= $order->memo ?>
                        </td>
                        <td class="color-custom4">
                            <?php
                            switch (strtolower($order->status->name)) {
                                case "pending":
                                    echo "<button onclick='CancelOrder($order->id, this);' class='btn btn-primary order-action'>Cancel</button>";
                                    break;
                                case "rejected":
                                    echo "<span class='invalid-color'>" . $order->status->name . "</span>";
                                    break;
                                case "canceled":
                                    echo "<span class='inactive-color'>" . $order->status->name . "</span>";
                                    break;
                                case "approved":
                                    echo "<span class='valid-color'>" . $order->status->name . "</span>";
                                    break;
                                default:
                                    echo "<span>" . $order->status->name . "</span>";
                                    break;
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php require_once "components/footer.php"; ?>

    <script type="text/javascript" src="js/utils/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <?php require_once "components/toast.php"; ?>
</body>

</html>