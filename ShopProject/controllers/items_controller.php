<?php
require_once "../models/DAOCategory.php";
require_once "../models/DAOItem.php";
require_once "../models/structures/Cart.php";

if (!isset($_SESSION))
    session_start();

$items = [];
$category_name = "all";
$item_dao = new DAOItem();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["category"])) {
        switch ($_GET["category"]) {
            case 'all':
                $items = $item_dao->GetAll();
                $category_name = "all";
                break;

            default:
                $items = $item_dao->GetByCategory($_GET["category"]);
                $category_name = $_GET["category"];
                break;
        }
    } else {
        $items = $item_dao->GetAll();
        $category_name = "all";
    }
} else {
    $items = $item_dao->GetAll();
    $category_name = "all";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && isset($_POST["item_id"]) && isset($_POST["quantity"])) {
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

?>