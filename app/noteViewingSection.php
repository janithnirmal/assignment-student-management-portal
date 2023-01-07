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
                <span class="text-center fs-3 fw-bold">All Notes</span>
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
                            <span class="fw-bold text-white fs-6">Subject</span>
                        </div>
                    </div>
                    <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">Grade</span>
                        </div>
                    </div>

                    <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-dark">
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

                    $studentNic = $_SESSION["u"]["nic"];


                    $notes_rs = Database::search("SELECT * FROM notes LEFT JOIN grade ON notes.id = grade.grade_id  WHERE notes.teacher = '" . $studentNic . "' ORDER BY added_time DESC ");
                    $notes_num = $notes_rs->num_rows;

                    for ($x = 0; $x < $notes_num; $x++) {
                        $assignment_data = $notes_rs->fetch_assoc();
                    ?>
                        <div class="col-1 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0">
                                <?php echo ($assignment_data["id"]); ?>
                            </div>
                        </div>
                        <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0">
                                <button class="btn btn-info text-start fw-bold"><?php echo ($assignment_data["title"]); ?></button>
                            </div>
                        </div>
                        <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0">
                                <?php echo ($assignment_data["subject"]); ?>
                            </div>
                        </div>
                        <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0">
                                <?php echo ($assignment_data["ngrade"]); ?>
                            </div>
                        </div>
                        <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0 d-grid">
                                <a href="<?php echo ($assignment_data['file_location']); ?>"><button class="btn btn-primary">Download</button></a>
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
                <span class="text-center fs-3 fw-bold">All Notes</span>
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
                            <span class="fw-bold text-white fs-6">Subject</span>
                        </div>
                    </div>
                    <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">Grade</span>
                        </div>
                    </div>

                    <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-dark">
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

                    $studentNic = $_SESSION["u"]["nic"];

                    $getTheGrade_rs = Database::search("SELECT * FROM student WHERE nic = '" . $studentNic . "' ");
                    $getTheGrade_data = $getTheGrade_rs->fetch_assoc();

                    $notes_rs = Database::search("SELECT * FROM notes LEFT JOIN grade ON notes.id = grade.grade_id  WHERE ngrade = '" . $getTheGrade_data["grade"] . "' ");
                    $notes_num = $notes_rs->num_rows;

                    for ($x = 0; $x < $notes_num; $x++) {
                        $assignment_data = $notes_rs->fetch_assoc();
                    ?>
                        <div class="col-1 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0">
                                <?php echo ($assignment_data["id"]); ?>
                            </div>
                        </div>
                        <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0">
                                <button class="btn btn-info text-start fw-bold"><?php echo ($assignment_data["title"]); ?></button>
                            </div>
                        </div>
                        <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0">
                                <?php echo ($assignment_data["subject"]); ?>
                            </div>
                        </div>
                        <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0">
                                <?php echo ($assignment_data["ngrade"]); ?>
                            </div>
                        </div>
                        <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0 d-grid">
                                <a href="<?php echo ($assignment_data['file_location']); ?>"><button class="btn btn-primary">Download</button></a>
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
} else {
    # code...
}


?>