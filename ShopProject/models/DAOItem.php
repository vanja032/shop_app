<?php
require_once "../database/database.php";
require_once "structures/Item.php";
require_once "../utils/validation.php";

class DAOItem
{
    private $database;

    private $SELECT_ALL = "SELECT item_id, i.name AS i_name, i.description AS i_desc, i.category_id, 
    picture_url, price, quantity, c.name AS c_name, c.description AS c_desc, c.created AS c_created
    FROM items i LEFT JOIN categories c
    ON i.category_id = c.category_id";

    private $SELECT_BY_CATEGORY = "SELECT item_id, i.name AS i_name, i.description AS i_desc, i.category_id, 
    picture_url, price, quantity, c.name AS c_name, c.description AS c_desc, c.created AS c_created
    FROM items i LEFT JOIN categories c
    ON i.category_id = c.category_id
    WHERE i.category_id = ?";

    private $UPDATE_QUANTITY = "UPDATE items SET quantity = ? WHERE item_id = ?";

    public function __construct()
    {
        $this->database = Database::createInstance();
    }

    public function GetAll(): array
    {
        try {
            $statement = $this->database->prepare($this->SELECT_ALL);

            $statement->execute();
            $result = $statement->fetchAll();
            $items = [];

            foreach ($result as $row) {
                $category = new Category($row["category_id"], $row["c_name"], $row["c_desc"], $row["c_created"]);
                $items[] = new Item($row["item_id"], $row["i_name"], $row["i_desc"], $category, $row["picture_url"], $row["price"], $row["quantity"]);
            }
            return $items;
        } catch (Exception $ex) {
            return [];
        }
    }

    public function GetByCategory($category): array
    {
        try {
            $statement = $this->database->prepare($this->SELECT_BY_CATEGORY);
            $statement->bindValue(1, validate($category));

            $statement->execute();
            $result = $statement->fetchAll();
            $items = [];

            if ($result) {
                $category = new Category($result[0]["category_id"], $result[0]["c_name"], $result[0]["c_desc"], $result[0]["c_created"]);
                foreach ($result as $row) {
                    $items[] = new Item($row["item_id"], $row["i_name"], $row["i_desc"], $category, $row["picture_url"], $row["price"], $row["quantity"]);
                }
            }
            return $items;
        } catch (Exception $ex) {
            return [];
        }
    }

    public function UpdateQuantity($item_id, $quantity)
    {
        try {
            $statement = $this->database->prepare($this->UPDATE_QUANTITY);
            $statement->bindValue(1, validate($quantity));
            $statement->bindValue(2, validate($item_id));

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