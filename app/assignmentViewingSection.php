<?php
session_start();
if (isset($_GET["utype"])) {
    $utype = $_GET["utype"];
} else {
    echo ("something went wrong!");
}

if ($utype == "teacher") {
?>


    <div class="col-12 p-0">
        <div class="row m-0">
            <div class="col-12 p-0 px-2 mt-1 text-center">
                <span class="text-center fs-3 fw-bold">All Assignments</span>
            </div>
            <div class="col-12 p-0 px-2 mt-1">
                <hr>
            </div>


            <div class="col-12 p-0">
                <div class="row m-0">
                    <div class="col-1 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">ID</span>
                        </div>
                    </div>
                    <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">Title</span>
                        </div>
                    </div>
                    <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">Description</span>
                        </div>
                    </div>
                    <div class="col-1 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">Grade</span>
                        </div>
                    </div>
                    <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">Deadline</span>
                        </div>
                    </div>
                    <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                        <div class="row m-0 d-grid">
                            <span class="fw-bold text-white fs-6">Action</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 p-0 px-2">
                <hr>
            </div>


            <!-- fix from here -->
            <div class="col-12 pb-2 p-0">
                <div class="row m-0">

                    <?php
                    require("../connection.php");
                    $d = new DateTime();
                    $tz = new DateTimeZone("Asia/Colombo");
                    $d->setTimezone($tz);
                    $date = $d->format("Y-m-d H:i:s");
                    $dateTimeSplit = explode(" ", $date);
                    $todayDate = $dateTimeSplit[0];

                    $teacherNic = $_SESSION["u"]["nic"];


                    $assignment_rs = Database::search("SELECT * FROM assignment LEFT JOIN grade ON assignment.id = grade.grade_id  WHERE assignment.teacher = '" . $teacherNic . "' ORDER BY deadline DESC ");
                    $assignment_num = $assignment_rs->num_rows;

                    for ($x = 0; $x < $assignment_num; $x++) {
                        $assignment_data = $assignment_rs->fetch_assoc();
                    ?>
                        <div class="col-1 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0">
                                <?php echo ($assignment_data["id"]); ?>
                            </div>
                        </div>
                        <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0">
                                <button class="btn btn-info text-start fw-bold" onclick="assignmentMarkingPanelOpen('<?php echo ($assignment_data['assignment_title']); ?>');"><?php echo ($assignment_data["assignment_title"]); ?></button>
                            </div>
                        </div>
                        <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0">
                                <?php echo ($assignment_data["assignment_description"]); ?>
                            </div>
                        </div>
                        <div class="col-1 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0">
                                <?php echo ($assignment_data["assignment_grade"]); ?>
                            </div>
                        </div>
                        <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0">
                                <?php echo ($assignment_data["deadline"]); ?>
                            </div>
                        </div>
                        <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0 d-grid">
                                <a href="<?php echo ($assignment_data['assignment_file_location']); ?>"><button class="btn btn-primary">Download</button></a>
                            </div>
                        </div>

                        <div class="col-12 p-0 m-0">
                            <hr class=" border-5 p-0 m-0 border-white">
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
} else if ($utype == "student") {
?>

    <div class="col-12 p-0">
        <div class="row m-0">
            <div class="col-12 p-0 px-2 mt-1 text-center">
                <span class="text-center fs-3 fw-bold">All Assignments</span>
            </div>
            <div class="col-12 p-0 px-2 mt-1">
                <hr>
            </div>


            <div class="col-12 p-0">
                <div class="row m-0">
                    <div class="col-1 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">ID</span>
                        </div>
                    </div>
                    <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">Title</span>
                        </div>
                    </div>
                    <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">Description</span>
                        </div>
                    </div>
                    <div class="col-1 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">Grade</span>
                        </div>
                    </div>
                    <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">Deadline</span>
                        </div>
                    </div>
                    <div class="col-1 p-2 px-0 fs-6 fw-bold text-white border-1 bg-secondary">
                        <div class="row m-0 d-grid">
                            <span class="fw-bold text-white fs-6">Download</span>
                        </div>
                    </div>
                    <div class="col-1 p-2 px-0 fs-6 fw-bold text-white border-1 bg-dark">
                        <div class="row m-0 d-grid">
                            <span class="fw-bold text-white fs-6">Upload</span>
                        </div>
                    </div>
                    <div class="col-1 p-2 px-0 fs-6 fw-bold text-white border-1 bg-secondary">
                        <div class="row m-0 d-grid">
                            <span class="fw-bold text-white fs-6">Submit</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 p-0 px-2">
                <hr>
            </div>


            <!-- fix from here -->
            <div class="col-12 pb-2 p-0">
                <div class="row m-0">

                    <?php
                    require("../connection.php");
                    $d = new DateTime();
                    $tz = new DateTimeZone("Asia/Colombo");
                    $d->setTimezone($tz);
                    $date = $d->format("Y-m-d H:i:s");
                    $dateTimeSplit = explode(" ", $date);
                    $todayDate = $dateTimeSplit[0];

                    $studentGrade_rs = Database::search("SELECT grade FROM student WHERE nic = '" . $_SESSION["u"]["nic"] . "'");
                    $studentGrade_data = $studentGrade_rs->fetch_assoc();

                    $assignment_rs = Database::search("SELECT * FROM assignment LEFT JOIN grade ON assignment.assignment_grade = grade.grade_id WHERE assignment_grade = '" . $studentGrade_data["grade"] . "'   ORDER BY deadline DESC ");
                    $assignment_num = $assignment_rs->num_rows;

                    for ($x = 0; $x < $assignment_num; $x++) {
                        $assignment_data = $assignment_rs->fetch_assoc();
                    ?>
                        <div class="col-1 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0">
                                <?php echo ($assignment_data["id"]); ?>
                            </div>
                        </div>
                        <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0">
                                <?php echo ($assignment_data["assignment_title"]); ?>
                            </div>
                        </div>
                        <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0">
                                <?php echo ($assignment_data["assignment_description"]); ?>
                            </div>
                        </div>
                        <div class="col-1 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0">
                                <?php echo ($assignment_data["assignment_grade"]); ?>
                            </div>
                        </div>
                        <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0">
                                <?php echo ($assignment_data["deadline"]); ?>
                            </div>
                        </div>
                        <div class="col-1 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0 d-grid">
                                <a href="<?php echo ($assignment_data['assignment_file_location']); ?>"><i class="bi bi-file-arrow-down-fill text-dark fs-5"></i></a>

                            </div>
                        </div>
                        <div class="col-1 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0">
                                <label class="bi bi-file-arrow-up-fill bg-dark border-0 text-white fs-5" for="as<?php echo ($assignment_data["id"]); ?>"><input accept=".zip, .rar, application/pdf" class="d-none" id="as<?php echo ($assignment_data["id"]); ?>" type="file"></label>

                            </div>
                        </div>
                        <div class="col-1 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0">
                                <i onclick="submitAssignment('as<?php echo ($assignment_data['id']); ?>', '<?php echo ($assignment_data['assignment_title']); ?>');" class="bi bi-cloud-arrow-up-fill  border-0 text-warning fs-5" for="as<?php echo ($assignment_data["id"]); ?>"></i>

                            </div>
                        </div>

                        <div class="col-12 p-0 m-0">
                            <hr class=" border-5 p-0 m-0 border-white">
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
} else if ($utype == "academic_officer") {
?>

    <div class="col-12 p-0">
        <div class="row m-0">
            <div class="col-12 p-0 px-2 mt-1 text-center">
                <span class="text-center fs-3 fw-bold">All Assignments</span>
            </div>
            <div class="col-12 p-0 px-2 mt-1">
                <hr>
            </div>


            <div class="col-12 p-0">
                <div class="row m-0">
                    <div class="col-1 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">ID</span>
                        </div>
                    </div>
                    <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">Student</span>
                        </div>
                    </div>
                    <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">Grade</span>
                        </div>
                    </div>
                    <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">Mark</span>
                        </div>
                    </div>
                    <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">Deadline</span>
                        </div>
                    </div>
                    <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                        <div class="row m-0 d-grid">
                            <span class="fw-bold text-white fs-6">Action</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 p-0 px-2">
                <hr>
            </div>


            <!-- fix from here -->
            <div class="col-12 pb-2 p-0">
                <div class="row m-0">

                    <?php
                    require("../connection.php");

                    $d = new DateTime();
                    $tz = new DateTimeZone("Asia/Colombo");
                    $d->setTimezone($tz);
                    $date = $d->format("Y-m-d H:i:s");
                    $dateTimeSplit = explode(" ", $date);
                    $todayDate = $dateTimeSplit[0];

                    $aoNic = $_SESSION["u"]["nic"];


                    $studentsOfAo_rs = Database::search("SELECT * FROM student WHERE academic_officer_nic = '" . $aoNic . "' ");
                    $studentsOfAo_num = $studentsOfAo_rs->num_rows;

                    for ($y = 0; $y < $studentsOfAo_num; $y++) {
                        $studentsOfAo_data = $studentsOfAo_rs->fetch_assoc();

                        $studentAssignements_rs = Database::search("SELECT * FROM assignment_answers WHERE student_nic = '" . $studentsOfAo_data["nic"] . "' ");
                        $studentAssignements_num = $studentAssignements_rs->num_rows;

                        for ($z = 0; $z < $studentAssignements_num; $z++) {
                            $studentAssignements_data = $studentAssignements_rs->fetch_assoc();
                    ?>
                            <div class="col-12 p-0">
                                <div class="row m-0">
                                    <div class="col-1 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                                        <div class="row m-0">
                                            <span class="fw-bold text-white fs-6"><?php echo ($studentAssignements_data["id"]); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                                        <div class="row m-0">
                                            <span class="fw-bold text-white fs-6"><?php echo ($studentAssignements_data["student_nic"]); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                                        <div class="row m-0">
                                            <span class="fw-bold text-white fs-6"><?php echo ($studentsOfAo_data["grade"]); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                                        <div class="row m-0">
                                            <span class="fw-bold text-white fs-6"><?php echo ($studentAssignements_data["mark"]); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                                        <div class="row m-0">
                                            <span class="fw-bold text-white fs-6"><?php

                                                                                    $aoSAssignment_rs = Database::search("SELECT * FROM assignment WHERE id = '" . $studentAssignements_data["assignment_id"] . "' ");
                                                                                    $aoSAssignment_data = $aoSAssignment_rs->fetch_assoc();

                                                                                    echo ($aoSAssignment_data["deadline"]); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                                        <div class="row m-0 d-grid">
                                            <?php
                                            if ($studentAssignements_data["release_status"] == 0) {
                                            ?>
                                                <button class="btn btn-primary" onclick="approveMarks('<?php echo ($studentAssignements_data['id']); ?>');">Approve</button>
                                            <?php
                                            } else {
                                            ?>
                                                <button class="btn btn-warning">Approved</button>
                                            <?php
                                            }

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    # code...
}


?>