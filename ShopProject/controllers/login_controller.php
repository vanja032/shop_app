<?php
require_once "../models/DAOUser.php";
require_once "../models/structures/User.php";

if (!isset($_SESSION))
    session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username_email"]) && isset($_POST["password"])) {
        if (!empty($_POST["username_email"]) && !empty($_POST["password"])) {

            $username = $_POST["username_email"];
            $password = $_POST["password"];
            $user_dao = new DAOUser();
            $result = $user_dao->LoginUser($username);

            if ($result) {
                $password_hash = $result["password_hash"];
                $hash = substr($password_hash, 0, strlen($password_hash) / 2);
                $salt = substr($password_hash, strlen($password_hash) / 2);

                if (hash("sha256", "$password$salt") === $hash) {
                    $role = new Role($result["role_id"], $result["name"], $result["description"], $result["r_created"]);
                    $user = new User(
                        $result["user_id"], $result["first_name"], $result["last_name"], $result["email"], $result["username"],
                        $result["profile_picture"], $result["u_created"],
                        $role
                    );
                    $_SESSION["user"] = $user;

                    echo json_encode(["status" => 1, "message" => "Successfully user login"]);
                } else {
                    echo json_encode(["status" => 0, "message" => "Error occured while loging the user account"]);
                }
            } else {
                echo json_encode(["status" => 0, "message" => "Error occured while loging the user account"]);
            }
        } else {
            echo json_encode(["status" => 0, "message" => "Error occured while loging the user account"]);
        }
    } else {
        echo json_encode(["status" => 0, "message" => "Error occured while loging the user account"]);
    }
}

?>