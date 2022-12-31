<?php
session_start();
if (isset($_SESSION["au"]) || isset($_SESSION["u"])) {
    echo ("loggin out!");
    $_SESSION["au"] = "";
    $_SESSION["u"] = "";
    session_destroy();
} 