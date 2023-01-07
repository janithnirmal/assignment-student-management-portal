<?php
session_start();
require("../connection.php");

$id = $_GET["id"];

if (isset($_SESSION["u"])) {
    Database::iud("UPDATE assignment_answers SET release_status = '1' WHERE id = '" . $id . "' ");
    echo ("Done!");
} else {
    echo ("no access!");
}
