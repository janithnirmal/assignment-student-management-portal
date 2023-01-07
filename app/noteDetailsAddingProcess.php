<?php

session_start();
require("../connection.php");



$ntitle = $_POST["ntitle"];
$nsubject = $_POST["nsubject"];
$ndescription = $_POST["ndescription"];
$grade = $_POST["ngrade"];

$teacher = $_SESSION["u"]["nic"];


// validate
if (empty($ntitle) || $ntitle == 0) {
    echo ("Please enter a Title");
} else if (strlen($ntitle) > 250) {
    echo ("Maximum Character limit for title is 45 charactors. Please add a name smaller than that");
} else if (empty($ndescription) || $ndescription == 0) {
    echo ("Please enter a description");
} else if (strlen($ndescription) > 500) {
    echo ("Maximum Character limit for description is 45 charactors. Please add a name smaller than that");
} else {

    // check on dbms before add
    $dbmsCheck1_rs = Database::search("SELECT * FROM notes WHERE title = '" . $ntitle . "' AND ngrade = '" . $grade . "' ");
    $dbmsCheck1_num = $dbmsCheck1_rs->num_rows;




    if ($dbmsCheck1_num == 1) {
        echo ("There is an note with the same title!");
    } else {

        //  add to dbms and store data
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        $length = sizeof($_FILES);

        if ($length == 1) {
            $afile = $_FILES["nfile"];
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

                $file_name = "../dbms/notes/" . $ntitle . "_" . $grade . "_" . $teacher . $new_img_extention;
                move_uploaded_file($afile["tmp_name"], $file_name);

                Database::iud("INSERT INTO notes (title, `description`, added_time, file_location, teacher, ngrade, `subject`)
                             VALUES ('" . $ntitle . "', '" . $ndescription . "', '" . $date . "', '" . $file_name . "', '" . $teacher . "', '" . $grade . "',  '" . $nsubject . "') ");
                echo ("Added!");
            } else {
                echo ("invalid image type");
            }

            echo ("saved successfully");
        } else {
            echo ("Invalid file count");
        }
    }
}
