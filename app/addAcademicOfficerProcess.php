<?php
session_start();
require("../connection.php");

if (isset($_SESSION["au"])) { // user validation

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $nic = $_POST["nic"];
    $email = $_POST["email"];
    $mobile1 = $_POST["mobile1"];
    $mobile2 = $_POST["mobile2"];
    $gender = $_POST["gender"];
    $line1 = $_POST["line1"];
    $line2 = $_POST["line2"];
    $img = $_FILES["img"];
    $city = $_POST["city"];
    $district = $_POST["district"];
    $province = $_POST["province"];

    // validate
    if (empty($fname) || $fname == 0) {
        echo ("Please enter a first name");
    } else if (strlen($fname) > 45) {
        echo ("Maximum Character limit for first name is 45 charactors. Please add a name smaller than that");
    } else if (empty($lname) || $lname == 0) {
        echo ("Please enter a last name");
    } else if (strlen($lname) > 45) {
        echo ("Maximum Character limit for last name is 45 charactors. Please add a name smaller than that");
    } else  if (empty($nic)) {
        echo ("You must enter a nic");
    } else  if (strlen($nic) > 12) {
        echo ("invalid NIC");
    } else  if (empty($email)) {
        echo ("Please add an email");
    } elseif (empty($email)) {
        echo ("Please enter your email !!!");
    } else if (strlen($email) >= 100) {
        echo ("Email must have less than 100 characters");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo ("Invalid email !!!");
    } else if (empty($mobile1)) {
        echo ("Please enter your mobile !!!");
    } else if (strlen($mobile1) != 10) {
        echo ("Mobile must have 10 characters");
    } else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/", $mobile1)) {
        echo ("Invalid mobile !!!");
    } else if (empty($mobile2)) {
        echo ("Please enter your mobile !!!");
    } else if (strlen($mobile2) != 10) {
        echo ("Mobile must have 10 characters");
    } else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/", $mobile2)) {
        echo ("Invalid mobile !!!");
    } else if ($mobile1 == $mobile2) {
        echo ("Mobile No repeated");
    } else {


        // check on dbms before add
        $dbmsCheck1_rs = Database::search("SELECT * FROM academic_officer WHERE nic = '" . $nic . "' ");
        $dbmsCheck1_num = $dbmsCheck1_rs->num_rows;

        $dbmsCheck2_rs = Database::search("SELECT * FROM academic_officer WHERE email = '" . $email . "' ");
        $dbmsCheck2_num = $dbmsCheck2_rs->num_rows;

        if ($dbmsCheck1_num == 1) {
            echo ("There is a user with tha same NIC!!!");
        } else if ($dbmsCheck2_num == 1) {
            echo ("There is a user with tha same Email!!!");
        } else {

            //  add to dbms and store data
            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("Y-m-d H:i:s");

            $verificationCode = uniqid();

            Database::iud("INSERT INTO academic_officer(nic, email, fname, lname, mobile1, mobile2, verification_code, verification_status, line1, line2, city, district, province)
            VALUES ('" . $nic . "', '" . $email . "', '" . $fname . "', '" . $lname . "', '" . $mobile1 . "', '" . $mobile2 . "', '" . $verificationCode . "', '0', '" . $line1 . "', '" . $line2 . "', '" . $city . "', '" . $district . "', '" . $province . "') ");

            // send a verification mail
            

            // return
            echo ("done");
        }
    }
} else {
    echo ("notallowed");
}
