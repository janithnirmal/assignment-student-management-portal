<?php

session_start();
require("../connection.php");


$student = $_SESSION["u"]["nic"];
$title = $_POST["title"];

$id_rs = Database::search("SELECT * FROM assignment WHERE assignment_title = '" . $title . "' ");
$id_data = $id_rs->fetch_assoc();

$length = sizeof($_FILES);

if ($length == 1) {
    $file = $_FILES["file"];
    // echo ($file["type"]);
    $allowed_img_extentions = array("application/x-zip-compressed", "application/octet-stream", "application/pdf");

    $file_extention = $file["type"];
    if (in_array($file_extention, $allowed_img_extentions)) {
        $new_file_extension;

        if ($file_extention == "application/x-zip-compressed") {
            $new_file_extension = ".zip";
        }
        if ($file_extention == "application/octet-stream") {
            $new_file_extension = ".rar";
        }
        if ($file_extention == "application/pdf") {
            $new_file_extension = ".pdf";
        }

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $submittedTime = $d->format("Y-m-d H:i:s");


        $file_name = "../dbms/assignment_answers/" . $title . "_" . $student . "_" . $new_file_extension;
        move_uploaded_file($file["tmp_name"], $file_name);


        $assignmentAnswerAlreadySubmitted_rs = Database::search("SELECT * FROM assignment_answers WHERE assignment_id = '" . $id_data["id"] . "' AND student_nic = '" . $student . "'  ");
        $assignmentAnswerAlreadySubmitted_num = $assignmentAnswerAlreadySubmitted_rs->num_rows;

        if ($assignmentAnswerAlreadySubmitted_num == 0) {
            Database::iud("INSERT INTO assignment_answers (assignment_id, student_nic, teacher_nic, submitted_date, release_status, answer ) 
            VALUES ('" . $id_data["id"] . "', '" . $student . "', '" . $id_data["teacher"] . "', '" . $submittedTime . "', '0', '" . $file_name . "' ) ");
        } else {
            Database::iud("UPDATE assignment_answers
             SET assignment_id = '" . $id_data["id"] . "', student_nic = '" . $student . "',
             teacher_nic = '" . $id_data["teacher"] . "', submitted_date = '" . $submittedTime . "', release_status = '0', answer = '" . $file_name . "' 
             WHERE assignment_id = '" . $id_data["id"] . "' AND student_nic = '" . $student . "' ");
        }



        echo ("success!");
    } else {
        echo ("invalid file type");
    }

    echo (" saved successfully");
} else {
    echo ("Invalid file count");
}
