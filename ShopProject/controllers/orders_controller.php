<?php
require_once "../models/structures/Cart.php";
require_once "../models/DAOOrder.php";

if (!isset($_SESSION))
    session_start();

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST["action"]) && isset($_POST["item_id"]) && isset($_POST["quantity"])) {
//         if ($_POST["action"] == "add-to-cart") {
//             try {
//                 $count = 0;
//                 if (!isset($_SESSION["cart"])) {
//                     $cart = new Cart($_POST["item_id"]);
//                     $_SESSION["cart"] = serialize($cart);
//                     $count = $cart->Count();
//                 } else {
//                     $cart = unserialize($_SESSION["cart"]);
//                     $count = $cart->AddItem($_POST["item_id"]);
//                     $_SESSION["cart"] = serialize($cart);
//                 }
//                 echo json_encode(["status" => true, "message" => "Successfully added item to the cart", "items_count" => $count]);
//             } catch (Exception $ex) {
//                 echo json_encode(["status" => false, "message" => "Adding item to the cart failed"]);
//             }
//         }
//     }
// }

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "order" && isset($_SESSION["cart"]) && isset($_SESSION["user"])) {
            $user = $_SESSION["user"];
            $cart = unserialize($_SESSION["cart"]);
            $order_dao = new DAOOrder();
            $result = $order_dao->Create($user->id, $cart);
            if ($result) {
                unset($_SESSION["cart"]);
                echo json_encode(["status" => true, "items_count" => 0, "message" => "Successfully ordered items"]);
            } else {
                echo json_encode(["status" => false, "message" => "Ordering items failed"]);
            }
        }
    }
}

?>