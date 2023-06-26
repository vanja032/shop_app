<?php
require_once "../database/database.php";
require_once "structures/Role.php";

class DAORole
{
    private $database;
    private $READ_ROLE = "SELECT role_id FROM roles WHERE name = LOWER(?)";

    public function __construct()
    {
        $this->database = Database::createInstance();
    }

    public function GetRole($role_name)
    {
        try {
            $statement = $this->database->prepare($this->READ_ROLE);
            $statement->bindValue(1, $role_name);

            $statement->execute();
            $result = $statement->fetch();
            return $result;
        } catch (Exception $ex) {
            return null;
        }
    }
}

?>