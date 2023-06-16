<?php
require_once "../models/DAOUser.php";
require_once "../models/structures/User.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["f_name"]) && isset($_POST["l_name"]) && isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"])) {
        $user = new User(null, $_POST["f_name"], $_POST["l_name"], $_POST["email"], $_POST["username"], "", null, null, null, null);
        $user_dao = new DAOUser();
        $result = $user_dao->RegisterUser($user, $_POST["password"]);

        if ($result) {
            echo json_encode(["status" => 1, "message" => "Successfully registered"]);
        } else {
            echo json_encode(["status" => 0, "message" => "Error occured while registering the user account"]);
        }
    }
}

?>