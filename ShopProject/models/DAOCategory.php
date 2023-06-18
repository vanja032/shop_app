<?php
require_once "../database/database.php";
require_once "structures/Category.php";

class DAOCategory
{
    private $database;
    private $READ_CATEGORIES = "SELECT * FROM categories";

    public function __construct()
    {
        $this->database = Database::createInstance();
    }

    public function GetAll(): array
    {
        try {
            $statement = $this->database->prepare($this->READ_CATEGORIES);

            $statement->execute();
            $result = $statement->fetchAll();
            $categories = [];
            foreach ($result as $row) {
                $categories[] = new Category($row["category_id"], $row["name"], $row["description"], $row["created"]);
            }
            return $categories;
        } catch (Exception $ex) {
            return [];
        }
    }
}

?>