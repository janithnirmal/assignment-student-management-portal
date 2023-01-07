<?php
require "../connection.php";

$nic = $_GET["nic"];
$utype = $_GET["utype"];

$tableName;


if ($utype == "AO") {
    $tableName = "academic_officer";
} else if ($utype == "T") {
    $tableName = "teacher";
} else if ($utype == "S") {
    $tableName = "student";
}

$verificationStatus_rs = Database::search("SELECT * FROM " . $tableName . " WHERE nic = '" . $nic . "' ");
$verificationStatus_data = $verificationStatus_rs->fetch_assoc();


if ($verificationStatus_data["verification_status"] == 1) {
    $newVerificationStatus = 2;
} else if ($verificationStatus_data["verification_status"] == 2) {
    $newVerificationStatus = 1;
}

Database::iud("UPDATE " . $tableName . " SET verification_status = '" . $newVerificationStatus . "' WHERE nic = '" . $nic . "' ");

if ($utype == "AO") {
    echo ("done" . $utype);
} elseif ($utype == "T") {
    echo ("done" . $utype);
} elseif ($utype == "S") {
    echo ("done" . $utype);
} else {
    echo ("Something went wrong");
}
