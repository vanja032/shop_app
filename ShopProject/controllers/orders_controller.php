<?php
require_once "../models/structures/Cart.php";
require_once "../models/DAOOrder.php";

if (!isset($_SESSION))
    session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && isset($_POST["order_id"]) && isset($_SESSION["user"])) {
        if ($_POST["action"] == "cancel-order") {
            $order_id = "";
            try {
                $order_id = $_POST["order_id"];
                $order_status = "canceled";
                $orders_dao = new DAOOrder();
                $result = $orders_dao->UpdateUserStatus($order_id, $order_status, $_SESSION["user"]->id);
                if ($result) {
                    echo json_encode(["status" => true, "message" => "Successfully canceled the order No. $order_id", "order_status" => $order_status]);
                } else {
                    echo json_encode(["status" => false, "message" => "Canceling the order No. $order_id failed"]);
                }
            } catch (Exception $ex) {
                echo json_encode(["status" => false, "message" => "Canceling the order No. $order_id failed"]);
            }
        } elseif ($_POST["action"] == "reject-order" && (strtolower($_SESSION["user"]->role->name) == "admin" || strtolower($_SESSION["user"]->role->name) == "manager")) {
            $order_id = "";
            try {
                $order_id = $_POST["order_id"];
                $order_status = "rejected";
                $orders_dao = new DAOOrder();
                $result = $orders_dao->UpdateStatus($order_id, $order_status);
                if ($result) {
                    echo json_encode(["status" => true, "message" => "Successfully rejected the order No. $order_id", "order_status" => $order_status]);
                } else {
                    echo json_encode(["status" => false, "message" => "Rejecting the order No. $order_id failed"]);
                }
            } catch (Exception $ex) {
                echo json_encode(["status" => false, "message" => "Rejecting the order No. $order_id failed"]);
            }
        } elseif ($_POST["action"] == "approve-order" && (strtolower($_SESSION["user"]->role->name) == "admin" || strtolower($_SESSION["user"]->role->name) == "manager")) {
            $order_id = "";
            try {
                $order_id = $_POST["order_id"];
                $order_status = "approved";
                $orders_dao = new DAOOrder();
                $result = $orders_dao->UpdateStatus($order_id, $order_status);
                if ($result) {
                    echo json_encode(["status" => true, "message" => "Successfully approved the order No. $order_id", "order_status" => $order_status]);
                } else {
                    echo json_encode(["status" => false, "message" => "Approving the order No. $order_id failed"]);
                }
            } catch (Exception $ex) {
                echo json_encode(["status" => false, "message" => "Approving the order No. $order_id failed"]);
            }
        }
    }
}

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
        } else {
            echo json_encode(["status" => false, "message" => "Ordering items failed"]);
        }
    }
}

?>