<?php
require("connection.php");

if (isset($_POST["n"]) && isset($_POST["p"]) && isset($_POST["r"]) && isset($_POST["ut"])) {
    $nic = $_POST["n"];
    $password = $_POST["p"];
    $rememberMe = $_POST["r"];
    $userType = $_POST["ut"];

    if (empty($password)) {
        echo ("Please enter the password");
    } else if (strlen($password) > 25 || strlen($password) < 5) {
        echo ("Your password must be in between 5-25");
    } else  if (empty($userType)) {
        echo ("Something went wrong");
    } else {

        if ($userType == "A") { // admin
            $user_rs = Database::search("SELECT * FROM `admin` WHERE nic = '" . $nic . "' AND password='" . $password . "' ");
            $user_num = $user_rs->num_rows;
        } else if ($userType == "AO") { // admin
            $user_rs = Database::search("SELECT * FROM `academic_officer` WHERE nic = '" . $nic . "' AND password='" . $password . "'  ");
            $user_num = $user_rs->num_rows;
        } else if ($userType == "T") { // admin
            $user_rs = Database::search("SELECT * FROM `teacher` WHERE nic = '" . $nic . "' AND password='" . $password . "'  ");
            $user_num = $user_rs->num_rows;
        } else if ($userType == "S") { // admin
            $user_rs = Database::search("SELECT * FROM `student` WHERE nic = '" . $nic . "' AND password='" . $password . "'  ");
            $user_num = $user_rs->num_rows;
        }


        if ($user_num == 1) {
            session_start();
            if ($userType == "A") { // admin
                $_SESSION["au"] = $user_rs->fetch_assoc();
            } else if ($userType == "AO") { // academic officer
                $_SESSION["u"] = $user_rs->fetch_assoc();
            } else if ($userType == "T") { // teacher
                $_SESSION["u"] = $user_rs->fetch_assoc();
            } else if ($userType == "S") { // student
                $_SESSION["u"] = $user_rs->fetch_assoc();
            }

            if ($rememberMe == "true") {
                if ($userType == "A") {
                    setcookie("nic", $nic, time() + (60 * 5)); // 5 min waiting time
                    setcookie("password", $password, time() + (60 * 5)); // 5 min waiting time
                } else {
                    setcookie("nic", $nic, time() + (60 * 60 * 60 * 24 * 365)); // 5 min waiting time
                    setcookie("password", $password, time() + (60 * 60 * 60 * 24 * 365)); // 5 min waiting time
                }
            } else {
                setcookie("nic", "", -1);
                setcookie("password", "", -1);
            }
            echo ("success");
        } else {
            echo ("please enter a valid NIC or Password.");
        }
    }
} else {
    echo ("error1");
}
