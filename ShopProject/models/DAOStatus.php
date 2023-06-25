<?php
require_once "../database/database.php";
require_once "structures/Status.php";

class DAOStatus
{
    private $database;

    private $SELECT_ALL = "SELECT status_id, name, description, created FROM statuses";

    private $SELECT_BY_NAME = "SELECT status_id, name, description, created FROM statuses WHERE name = ?";

    private $INSERT = "INSERT INTO statuses(name, description, created) VALUES(?, ?, CURRENT_TIMESTAMP)";

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
            $statuses = [];
            if ($result) {
                foreach ($result as $row) {
                    $statuses[] = new Status($row["status_id"], $row["name"], $row["description"], $row["created"]);
                }
            }
            return $statuses;
        } catch (Exception $ex) {
            return [];
        }
    }

    public function GetByName($status_name): array
    {
        try {
            $statement = $this->database->prepare($this->SELECT_BY_NAME);
            $statement->bindValue(1, $status_name);

            $statement->execute();
            $result = $statement->fetchAll();
            $statuses = [];
            if ($result) {
                foreach ($result as $row) {
                    $statuses[] = new Status($row["status_id"], $row["name"], $row["description"], $row["created"]);
                }
            }
            return $statuses;
        } catch (Exception $ex) {
            return [];
        }
    }

    public function Create($name, $description)
    {
        try {
            $statement = $this->database->prepare($this->INSERT);
            $statement->bindValue(1, $name);
            $statement->bindValue(2, $description);

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