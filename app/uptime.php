<?php

$start_date = new DateTime("2022-12-27 00:00:00");

$tdate = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$tdate->setTimezone($tz);

$endDate = new DateTime($tdate->format("Y-m-d H:i:s"));

$differance = $endDate->diff($start_date);



echo ($differance->format('%Y') . " Years " . $differance->format('%m') . " Months " .
    $differance->format('%d') . " Days " . $differance->format('%H') . " Hours " .
    $differance->format('%i') . " Minutes " . $differance->format('%s') . " Seconds ");
