<?php
require_once "../database/database.php";
require_once "structures/Item_Order.php";
require_once "../utils/validation.php";

class DAOItemOrder
{
    private $database;

    private $SELECT_BY_ORDER = "SELECT io.created as io_created, i.item_id, i.name as i_name, i.description as i_desc, c.category_id, c.name as c_name, 
    c.description as c_desc, c.created as c_created, picture_url, price, i.quantity as i_quantity, io.quantity as io_quantity, memo
    FROM items_orders io
    INNER JOIN items i ON io.item_id = i.item_id
    INNER JOIN categories c ON i.category_id = c.category_id 
    WHERE order_id = ?";

    private $INSERT = "INSERT INTO items_orders(created, order_id, item_id, quantity, memo)
    VALUES(CURRENT_TIMESTAMP, ?, ?, ?, ?)";

    private $DELETE_BY_ORDER = "DELETE FROM items_orders WHERE order_id = ?";

    public function __construct()
    {
        $this->database = Database::createInstance();
    }

    public function GetByOrder($order_id): array
    {
        try {
            $statement = $this->database->prepare($this->SELECT_BY_ORDER);
            $statement->bindValue(1, validate($order_id));

            $statement->execute();
            $result = $statement->fetchAll();
            $items_orders = [];

            foreach ($result as $row) {
                $category = new Category($row["category_id"], $row["c_name"], $row["c_desc"], $row["c_created"]);
                $item = new Item($row["item_id"], $row["i_name"], $row["i_desc"], $category, $row["picture_url"], $row["price"], $row["i_quantity"]);
                $items_orders[] = new Item_Order($row["io_created"], $item, $row["io_quantity"], $row["memo"]);
            }
            return $items_orders;
        } catch (Exception $ex) {
            return [];
        }
    }

    public function Create($order_id, $item_id, $quantity)
    {
        try {
            $statement = $this->database->prepare($this->INSERT);
            $statement->bindValue(1, $order_id);
            $statement->bindValue(2, $item_id);
            $statement->bindValue(3, $quantity);
            $statement->bindValue(4, "Order No. $order_id, Item No. $item_id, Quantity $quantity");

            $result = $statement->execute();
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            return false;
        }
    }

    public function DeleteByOrder($order_id)
    {
        try {
            $statement = $this->database->prepare($this->DELETE_BY_ORDER);
            $statement->bindValue(1, $order_id);

            $result = $statement->execute();
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            return false;
        }
    }
}

?>