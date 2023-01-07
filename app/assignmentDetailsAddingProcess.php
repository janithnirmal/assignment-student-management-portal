<?php

session_start();
require("../connection.php");

$email = $_SESSION["u"]["email"];

$atitle = $_POST["atitle"];
$adescription = $_POST["adescription"];
$adeadline = $_POST["adeadline"];
$grade = $_POST["agrade"];

$teacher = $_SESSION["u"]["nic"];


// validate
if (empty($atitle) || $atitle == 0) {
    echo ("Please enter a Title");
} else if (strlen($atitle) > 250) {
    echo ("Maximum Character limit for title is 45 charactors. Please add a name smaller than that");
} else if (empty($adescription) || $adescription == 0) {
    echo ("Please enter a description");
} else if (strlen($adescription) > 500) {
    echo ("Maximum Character limit for description is 45 charactors. Please add a name smaller than that");
} else {

    // check on dbms before add
    $dbmsCheck1_rs = Database::search("SELECT * FROM assignment WHERE assignment_title = '" . $atitle . "' ");
    $dbmsCheck1_num = $dbmsCheck1_rs->num_rows;




    if ($dbmsCheck1_num == 1) {
        echo ("There is an assignment with the same title!");
    } else {

        //  add to dbms and store data
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        $length = sizeof($_FILES);

        if ($length == 1) {
            $afile = $_FILES["afile"];
            // echo ($afile["type"]);
            $allowed_img_extentions = array("application/x-zip-compressed", "application/octet-stream");

            $file_extention = $afile["type"];

            if (in_array($file_extention, $allowed_img_extentions)) {
                $new_img_extention;

                if ($file_extention == "application/x-zip-compressed") {
                    $new_img_extention = ".zip";
                }
                if ($file_extention == "application/octet-stream") {
                    $new_img_extention = ".rar";
                }

                $file_name = "../dbms/assignments/" . $atitle . "_" . $teacher . $new_img_extention;
                move_uploaded_file($afile["tmp_name"], $file_name);

                Database::iud("INSERT INTO assignment (assignment_title, deadline, assignment_description, added_date, assignment_grade, teacher, assignment_file_location)
                             VALUES ('" . $atitle . "', '" . $adeadline . "', '" . $adescription . "', '" . $date . "', '" . $grade . "', '" . $teacher . "', '" . $file_name . "' ) ");
            } else {
                echo ("invalid image type");
            }

            echo ("saved successfully");
        } else {
            echo ("Invalid file count");
        }
    }
}
