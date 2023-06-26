<?php
require_once "../database/database.php";
require_once "structures/Category.php";

class DAOCategory
{
    private $database;
    private $READ_CATEGORIES = "SELECT * FROM categories";

    private $SELECT_BY_ID = "SELECT * FROM categories WHERE category_id = ?";

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

    public function GetById($category_id): Category
    {
        try {
            $statement = $this->database->prepare($this->READ_CATEGORIES);
            $statement->bindValue(1, $category_id);

            $statement->execute();
            $result = $statement->fetch();
            if ($result) {
                return new Category($result["category_id"], $result["name"], $result["description"], $result["created"]);
            } else {
                return new Category(null, null, null, null);
            }
        } catch (Exception $ex) {
            return new Category(null, null, null, null);
        }
    }
}

?>