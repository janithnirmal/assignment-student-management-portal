<?php
session_start();
require("../connection.php");

if (isset($_SESSION["u"])) {
    $user = $_SESSION["u"]["nic"];
    $user_rs = Database::search("SELECT * FROM teacher WHERE nic = '" . $user . "' ");
    $user_num = $user_rs->num_rows;

    if ($user_num == 1) {
        if (isset($_GET["mark"]) && isset($_GET["id"])) {
            $mark = $_GET['mark'];
            $id = $_GET['id'];

            Database::iud("UPDATE assignment_answers SET mark = '" . $mark . "', release_status = '0' WHERE id = '" . $id . "' ");
            echo ("Mark Added!");
        } else {
            echo ("Something went wrong!");
        }
    } else {
        echo ("No access!");
    }
} else {
    echo ("wrong URL");
}
