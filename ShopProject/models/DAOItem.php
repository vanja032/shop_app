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

    private $SELECT_CAT = "SELECT item_id, i.name AS i_name, i.description AS i_desc, i.category_id, 
    picture_url, price, quantity, c.name AS c_name, c.description AS c_desc, c.created AS c_created
    FROM items i LEFT JOIN categories c
    ON i.category_id = c.category_id
    WHERE i.category_id = ?";

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
                $items[] = new Item($row["item_id"], $row["i_name"], $row["i_desc"], $row["category_id"], $row["c_name"], $row["c_desc"], $row["c_created"], $row["picture_url"], $row["price"], $row["quantity"]);
            }
            return $items;
        } catch (Exception $ex) {
            return [];
        }
    }

    public function GetCat($category): array
    {
        try {
            $statement = $this->database->prepare($this->SELECT_CAT);
            $statement->bindValue(1, validate($category));

            $statement->execute();
            $result = $statement->fetchAll();
            $items = [];

            foreach ($result as $row) {
                $items[] = new Item($row["item_id"], $row["i_name"], $row["i_desc"], $row["category_id"], $row["c_name"], $row["c_desc"], $row["c_created"], $row["picture_url"], $row["price"], $row["quantity"]);
            }
            return $items;
        } catch (Exception $ex) {
            return [];
        }
    }
}

?>