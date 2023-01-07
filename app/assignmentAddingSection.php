<div class="col-12 p-0">
    <div class="row m-0">
        <div class="col-12 p-0 px-2 mt-2 text-center">
            <span class="text-center fs-3 fw-bold">Add assignments</span>
        </div>
        <div class="col-12 p-0 px-2 mt-3">
            <hr>
        </div>

        <div class="col-12 p-0 px-2 mt-1">
            <label class="form-label fw-bold ">Assignment Title</label>
            <input id="atitle" type="text" class="form-control" placeholder="Add a title for the assignment" />
        </div>
        <div class="col-6 p-0 px-2 mt-1">
            <label class="form-label fw-bold ">Deadline</label>
            <input id="adeadline" type="date" class="form-control" placeholder="Add a deadline" />
        </div>
        <div class="col-6 p-0 px-2 mt-1">
            <label class="form-label fw-bold ">Grade</label>
            <select id="grade" class="form-control">
                <option value="g6">Grade 6</option>
                <option value="g7">Grade 7</option>
                <option value="g8">Grade 8</option>
                <option value="g9">Grade 9</option>
                <option value="g10">Grade 10</option>
                <option value="g11">Grade 11</option>
                <option value="g12">Grade 12</option>
                <option value="g13">Grade 13</option>
            </select>
        </div>
        <div class="col-12 p-0 px-2 mt-1">
            <label class="form-label fw-bold ">Assignment Description</label>
            <input id="adescription" type="text" class="form-control" placeholder="Add a description" />
        </div>
        <div class="col-12 p-0 px-2 mt-1">
            <label class="form-label fw-bold ">Add the Assignment</label>
            <input id="afile" type="file" accept=".zip, .rar" class="bg-black text-white form-control" placeholder="Add the assignment Files" />
        </div>
        <div class="col-12 p-0 px-2 mt-1 py-2 d-grid">
            <button onclick="addAssignmentDetails();" class="btn btn-primary">Add Assignment</button>
        </div>
        <div class="col-12 p-0 px-2 mt-3">
            <hr>
        </div>

        <div class="col-12 p-0 px-2 mt-1 text-center">
            <span class="text-center fs-3 fw-bold">On going Assignments</span>
        </div>
        <div class="col-12 p-0 px-2 mt-1">
            <hr>
        </div>


        <div class="col-12 pb-4 p-0">
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


        <!-- fix from here -->
        <div class="col-12 pb-4 p-0">
            <div class="row m-0">

                <?php
                require("../connection.php");
                $d = new DateTime();
                $tz = new DateTimeZone("Asia/Colombo");
                $d->setTimezone($tz);
                $date = $d->format("Y-m-d H:i:s");
                $dateTimeSplit = explode(" ", $date);
                $todayDate = $dateTimeSplit[0];

                $assignment_rs = Database::search("SELECT * FROM assignment LEFT JOIN grade ON assignment.id = grade.grade_id WHERE deadline > '" . $todayDate . "' ORDER BY deadline ");
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