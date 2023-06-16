<?php
require_once "../models/structures/User.php";

if (!isset($_SESSION))
    session_start();

if (!isset($_SESSION["user"]))
    header("Location: login.php");

echo json_encode($_SESSION["user"]);

session_unset();
session_destroy();
?>