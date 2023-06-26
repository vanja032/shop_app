<?php
require_once "../database/database.php";
require_once "structures/Status.php";

class DAOStatus
{
    private $database;

    private $SELECT_ALL = "SELECT status_id, name, description, created FROM statuses";

    private $SELECT_BY_NAME = "SELECT status_id, name, description, created FROM statuses WHERE name = LOWER(?)";

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

    public function GetByName($status_name): Status
    {
        try {
            $statement = $this->database->prepare($this->SELECT_BY_NAME);
            $statement->bindValue(1, $status_name);

            $statement->execute();
            $result = $statement->fetch();
            if ($result) {
                return new Status($result["status_id"], $result["name"], $result["description"], $result["created"]);
            } else {
                return new Status(null, null, null, null);
            }
        } catch (Exception $ex) {
            return new Status(null, null, null, null);
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