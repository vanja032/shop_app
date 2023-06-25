<?php
require_once "../database/database.php";
require_once "structures/User.php";
require_once "DAORole.php";
require_once "../utils/validation.php";

class DAOUser
{
    private $database;
    private $INSERT_USER = "INSERT INTO users (first_name, last_name, username, email, password_hash, profile_picture, role_id, created) 
    VALUES (?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";

    private $FIND_USER = "SELECT u.user_id, u.first_name, u.last_name, u.username, u.email, u.password_hash, 
    u.profile_picture, u.role_id, u.created AS u_created, r.name, r.description, r.created AS r_created
    FROM users u INNER JOIN roles r
    ON u.role_id = r.role_id
    WHERE username = ? OR email = ?";

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

    public function LoginUser($username)
    {
        try {
            $statement = $this->database->prepare($this->FIND_USER);
            $statement->bindValue(1, validate($username));
            $statement->bindValue(2, validate($username));

            $statement->execute();

            if ($result = $statement->fetch()) {
                return $result;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }
}

?>