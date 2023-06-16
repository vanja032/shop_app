<?php
require_once "../database/database.php";
require_once "structures/User.php";
require_once "DAORole.php";
require_once "../utils/validation.php";

class DAOUser
{
    private $database;
    private $INSERT_USER = "INSERT INTO users (first_name, last_name, username, email, password_hash, profile_picture, role_id, created) VALUES (?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";

    public function __construct()
    {
        $this->database = Database::createInstance();
    }

    public function RegisterUser(User $user, $pass_hash)
    {
        try {
            $role_dao = new DAORole();
            $user_role = $role_dao->GetRole("user");
            $statement = $this->database->prepare($this->INSERT_USER);
            $statement->bindValue(1, validate($user->f_name));
            $statement->bindValue(2, validate($user->l_name));
            $statement->bindValue(3, validate($user->username));
            $statement->bindValue(4, validate($user->email));
            $statement->bindValue(5, validate($pass_hash));
            $statement->bindValue(6, validate($user->profile));
            $statement->bindValue(7, $user_role["role_id"]);

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