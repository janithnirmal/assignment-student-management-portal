<?php

session_start();
require("../connection.php");

$title = $_GET["title"];

$assignment_rs = Database::search("SELECT * FROM assignment WHERE assignment_title = '" . $title . "' ");
$assignment_data = $assignment_rs->fetch_assoc();


if (isset($_SESSION["u"])) {
?>

    <div class="col-12 p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="row m-0">
                    <span class="fw-bold text-center fs-4"><?php echo ($title . " - (" . $assignment_data["deadline"] . ")" . " - " . $assignment_data["assignment_grade"]); ?></span>
                </div>
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
                            <span class="fw-bold text-white fs-6">Answer</span>
                        </div>
                    </div>
                    <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">Date</span>
                        </div>
                    </div>
                    <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                        <div class="row m-0">
                            <span class="fw-bold text-white fs-6">Marks</span>
                        </div>
                    </div>
                    <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                        <div class="row m-0 d-grid">
                            <span class="fw-bold text-white fs-6">Action</span>
                        </div>
                    </div>

                    <div class="col-12 p-0 px-2 mt-1">
                        <hr>
                    </div>
                </div>
            </div>

            <?php

            $assignmentAnswers_rs = Database::search("SELECT * FROM assignment_answers  WHERE assignment_id = '" . $assignment_data["id"] . "' ");
            $assignmentAnswers_num = $assignmentAnswers_rs->num_rows;


            for ($x = 0; $x < $assignmentAnswers_num; $x++) {
                $assignmentAnswers_data = $assignmentAnswers_rs->fetch_assoc();
            ?>
                <div class="col-12 p-0">
                    <div class="row m-0">
                        <div class="col-1 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0">
                                <span class="fw-bold text-white fs-6"><?php echo ($assignmentAnswers_data["id"]); ?></span>
                            </div>
                        </div>
                        <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0">
                                <span class="fw-bold text-white fs-6"><?php echo ($assignmentAnswers_data["student_nic"]); ?></span>
                            </div>
                        </div>
                        <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0">
                                <a href="<?php echo ($assignmentAnswers_data['answer']); ?>"><button class="btn btn-primary">Download</button></a>
                            </div>
                        </div>
                        <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0">
                                <span class="fw-bold text-white fs-6"><?php echo ($assignmentAnswers_data["submitted_date"]); ?></span>
                            </div>
                        </div>
                        <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0">
                                <input id="mark<?php echo ($assignmentAnswers_data['id']); ?>" type="number" class="form-control" min="0" max="100" placeholder="00" value="<?php echo ($assignmentAnswers_data["mark"]); ?>" />
                            </div>
                        </div>
                        <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0 d-grid">
                                <button class="btn btn-success fw-bold" onclick="addMarks('<?php echo ($assignmentAnswers_data['id']); ?>');">Add Mark</button>
                            </div>
                        </div>



                        <div class="col-12 p-0 m-0">
                            <hr class=" border-5 p-0 m-0 border-white">
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

<?php
} else {
    echo ("not allowed!");
}
