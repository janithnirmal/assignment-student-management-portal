<?php

if (isset($_GET["fileLocation"])) {
    $fileName = basename($_GET["fileLocation"]);
    $filePath = $_GET["fileLocation"];

    if (!empty($fileName) && file_exists($filePath)) {
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=" . $fileName);
        header("Content-Type: application/zip");
        header("Content-Transfer-Emcoding: binary");

        readfile($filePath);
        exit();
    } else {
        echo ("something went wrong");
    }


    // readfile("../dbms/assignments/test.txt");
    exit();
} else {
    echo ("Something wrong");
}
