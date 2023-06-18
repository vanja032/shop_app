<?php

if (!isset($_SESSION))
    session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["action"]) && isset($_GET["location"])) {
        if ($_GET["action"] == "logout") {
            session_unset();
            session_destroy();

            if (!empty($_GET["location"]))
                header("Location: ../view/" . $_GET["location"] . ".php");
            else
                header("Location: ../view/index.php");
        }
    }
}

?>