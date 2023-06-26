<?php
require_once "../models/structures/Cart.php";

if (!isset($_SESSION))
    session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && isset($_POST["item_id"]) && isset($_POST["quantity"])) {
        if ($_POST["action"] == "add-to-cart") {
            try {
                $count = 0;
                if (!isset($_SESSION["cart"])) {
                    $cart = new Cart($_POST["item_id"], $_POST["quantity"]);
                    $_SESSION["cart"] = serialize($cart);
                    $count = $cart->Count();
                } else {
                    $cart = unserialize($_SESSION["cart"]);
                    $count = $cart->AddItems($_POST["item_id"], $_POST["quantity"]);
                    $_SESSION["cart"] = serialize($cart);
                }
                echo json_encode(["status" => true, "message" => "Successfully added item to the cart", "items_count" => $count]);
            } catch (Exception $ex) {
                echo json_encode(["status" => false, "message" => "Adding item to the cart failed"]);
            }
        }
    } elseif (isset($_POST["action"]) && isset($_POST["item_id"])) {
        if ($_POST["action"] == "add-to-cart") {
            try {
                $count = 0;
                if (!isset($_SESSION["cart"])) {
                    $cart = new Cart($_POST["item_id"]);
                    $_SESSION["cart"] = serialize($cart);
                    $count = $cart->Count();
                } else {
                    $cart = unserialize($_SESSION["cart"]);
                    $count = $cart->AddItem($_POST["item_id"]);
                    $_SESSION["cart"] = serialize($cart);
                }
                echo json_encode(["status" => true, "message" => "Successfully added item to the cart", "items_count" => $count]);
            } catch (Exception $ex) {
                echo json_encode(["status" => false, "message" => "Adding item to the cart failed"]);
            }
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "clear" && isset($_SESSION["cart"])) {
            unset($_SESSION["cart"]);
            echo json_encode(["status" => true, "items_count" => 0, "message" => "Successfully cleared the cart"]);
        }
    }
}

?>