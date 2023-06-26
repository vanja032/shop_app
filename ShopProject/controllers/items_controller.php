<?php
require_once "../models/DAOCategory.php";
require_once "../models/DAOItem.php";

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

?>