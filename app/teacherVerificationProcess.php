<?php
require("../connection.php");

// <!-- if hte passwords are the same in both fields -->
// <!-- if there is a user with nic -->
// <!-- if the vc matches -->
// <!-- then apply new pass in the dbms, then redirect to the sign in -->


$nic = $_POST["nic"];
$vc = $_POST["vc"];
$npass = $_POST["npass"];
$rtpass = $_POST["rtpass"];
$userType = $_POST["ut"];



$userCheck_rs = Database::search("SELECT * FROM teacher WHERE `nic` = '" . $nic . "' ");
$userCheck_num = $userCheck_rs->num_rows;

if ($userCheck_num == 0) {
    echo ("Invalid NIC please try again!");
} else {

    $userCheck2_rs = Database::search("SELECT * FROM teacher WHERE nic = '" . $nic . "' AND verification_code = '" . $vc . "' ");
    $userCheck2_num = $userCheck2_rs->num_rows;

    if ($userCheck2_num == 0) {
        echo ("Verification code is wrong please try again!");
    } else {
        if (empty($npass) || empty($rtpass)) {
            echo ("Password feild is empty");
        } else if ($npass === $rtpass) {
            // verification code regenaration and update
            $newVc = uniqid();
            Database::iud("UPDATE teacher SET verification_code = '" . $newVc . "', password='" . $npass . "', verification_status='1' WHERE nic = '" . $nic . "' ");

            echo ("success");
        } else {
            echo ("Passwords are not similer please try again");
        }
    }
}
