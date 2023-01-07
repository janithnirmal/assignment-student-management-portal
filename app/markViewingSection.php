<div class="col-12 p-0">
    <div class="row m-0">
        <div class="col-12 p-0 px-2 mt-1 text-center">
            <span class="text-center fs-3 fw-bold">Assignment Notes</span>
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
                <div class="col-4 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                    <div class="row m-0">
                        <span class="fw-bold text-white fs-6">Description</span>
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
            </div>
        </div>

        <div class="col-12 p-0 px-2">
            <hr>
        </div>


        <!-- fix from here -->
        <div class="col-12 pb-2 p-0">
            <div class="row m-0">

                <?php
                session_start();
                require("../connection.php");

                $d = new DateTime();
                $tz = new DateTimeZone("Asia/Colombo");
                $d->setTimezone($tz);
                $date = $d->format("Y-m-d H:i:s");
                $dateTimeSplit = explode(" ", $date);
                $todayDate = $dateTimeSplit[0];

                $studentNic = $_SESSION["u"]["nic"];


                $student_rs = Database::search("SELECT * FROM student WHERE nic = '" . $studentNic . "' ");
                $student_num = $student_rs->num_rows;

                for ($y = 0; $y < $student_num; $y++) {
                    $studentsOfAo_data = $student_rs->fetch_assoc();

                    $studentAssignements_rs = Database::search("SELECT * FROM assignment_answers WHERE student_nic = '" . $studentsOfAo_data["nic"] . "' ");
                    $studentAssignements_num = $studentAssignements_rs->num_rows;

                    for ($z = 0; $z < $studentAssignements_num; $z++) {
                        $studentAssignements_data = $studentAssignements_rs->fetch_assoc();

                        $assignmentDetails_rs = Database::search("SELECT * FROM assignment  WHERE id = '" . $studentAssignements_data["assignment_id"] . "' ");
                        $assignmentDetails_data = $assignmentDetails_rs->fetch_assoc();
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
                                        <span class="fw-bold text-white fs-6"><?php echo ($assignmentDetails_data["assignment_title"]); ?></span>
                                    </div>
                                </div>
                                <div class="col-4 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                                    <div class="row m-0">
                                        <span class="fw-bold text-white fs-6"><?php echo ($assignmentDetails_data["assignment_description"]); ?></span>
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