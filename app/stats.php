<?php


require("../connection.php");

if (isset($_GET["utype"])) {

    if ($_GET["utype"] == "A") {
?>

        <div class="col-12 p-0 bg-dark  text-white">
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="py-2 row text-center m-0">
                        <span class="fw-bold fs-1">STATISTICS</span>
                    </div>
                </div>

                <div class="col-12 p-0">
                    <hr class="border-1 border-white" />
                </div>

                <?php
                //  add to dbms and store data

                $studentA_rs = Database::search("SELECT * FROM student");
                $studentA_num = $studentA_rs->num_rows;
                $studentA_data = $studentA_rs->fetch_assoc();

                $teacherA_rs = Database::search("SELECT * FROM teacher");
                $teacherA_num = $teacherA_rs->num_rows;
                $teacherA_data = $teacherA_rs->fetch_assoc();

                $academicOfficer_rs = Database::search("SELECT * FROM academic_officer");
                $academicOfficer_num = $academicOfficer_rs->num_rows;
                $academicOfficer_data = $academicOfficer_rs->fetch_assoc();

                // best student

                ?>

                <div class="col-12 col-lg-4 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-danger rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">Student Count</span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4"><?php echo ($studentA_num); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-danger rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">Teacher Count</span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4"><?php echo ($teacherA_num); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-danger rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">Academic Officer Count</span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4"><?php echo ($academicOfficer_num); ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 p-0">
                    <hr class="border-1 border-white" />
                </div>

                <div class="col-12 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-success rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">UPTIME</span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4" id="uptime">

                                <script>
                                    function uptime() {
                                        var uptime = document.getElementById("uptime");

                                        var r = new XMLHttpRequest();

                                        r.onreadystatechange = function() {
                                            if (r.readyState == 4) {
                                                var t = r.responseText;
                                                uptime.innerHTML = t;
                                            }
                                        };

                                        r.open("GET", "../app/uptime.php", true);
                                        r.send();
                                    }

                                    uptime();
                                    setInterval(() => {
                                        uptime();
                                    }, 1000);
                                </script>

                            </span>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-8 offset-2 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-primary rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">Top </span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4"><?php echo ($academicOfficer_num); ?></span>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>

    <?php
    } else if ($_GET["utype"] == "AO") {
    ?>

        <div class="col-12 p-0 bg-dark  text-white">
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="py-2 row text-center m-0">
                        <span class="fw-bold fs-1">STATISTICS</span>
                    </div>
                </div>

                <div class="col-12 p-0">
                    <hr class="border-1 border-white" />
                </div>

                <?php
                //  add to dbms and store data

                $studentA_rs = Database::search("SELECT * FROM student");
                $studentA_num = $studentA_rs->num_rows;
                $studentA_data = $studentA_rs->fetch_assoc();

                $teacherA_rs = Database::search("SELECT * FROM teacher");
                $teacherA_num = $teacherA_rs->num_rows;
                $teacherA_data = $teacherA_rs->fetch_assoc();

                $academicOfficer_rs = Database::search("SELECT * FROM academic_officer");
                $academicOfficer_num = $academicOfficer_rs->num_rows;
                $academicOfficer_data = $academicOfficer_rs->fetch_assoc();

                // best student

                ?>

                <div class="col-12 col-lg-4 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-danger rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">Student Count</span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4"><?php echo ($studentA_num); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-danger rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">Teacher Count</span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4"><?php echo ($teacherA_num); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-danger rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">Academic Officer Count</span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4"><?php echo ($academicOfficer_num); ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 p-0">
                    <hr class="border-1 border-white" />
                </div>

                <div class="col-12 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-success rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">UPTIME</span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4" id="uptime">

                                <script>
                                    function uptime() {
                                        var uptime = document.getElementById("uptime");

                                        var r = new XMLHttpRequest();

                                        r.onreadystatechange = function() {
                                            if (r.readyState == 4) {
                                                var t = r.responseText;
                                                uptime.innerHTML = t;
                                            }
                                        };

                                        r.open("GET", "../app/uptime.php", true);
                                        r.send();
                                    }

                                    uptime();
                                    setInterval(() => {
                                        uptime();
                                    }, 1000);
                                </script>

                            </span>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-8 offset-2 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-primary rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">Top </span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4"><?php echo ($academicOfficer_num); ?></span>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>

    <?php
    } else if ($_GET["utype"] == "T") {
    ?>
        <div class="col-12 p-0 bg-dark  text-white">
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="py-2 row text-center m-0">
                        <span class="fw-bold fs-1">STATISTICS</span>
                    </div>
                </div>

                <div class="col-12 p-0">
                    <hr class="border-1 border-white" />
                </div>

                <?php
                //  add to dbms and store data

                $studentA_rs = Database::search("SELECT * FROM student");
                $studentA_num = $studentA_rs->num_rows;
                $studentA_data = $studentA_rs->fetch_assoc();

                $teacherA_rs = Database::search("SELECT * FROM teacher");
                $teacherA_num = $teacherA_rs->num_rows;
                $teacherA_data = $teacherA_rs->fetch_assoc();

                $academicOfficer_rs = Database::search("SELECT * FROM academic_officer");
                $academicOfficer_num = $academicOfficer_rs->num_rows;
                $academicOfficer_data = $academicOfficer_rs->fetch_assoc();

                // best student

                ?>

                <div class="col-12 col-lg-4 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-danger rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">Student Count</span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4"><?php echo ($studentA_num); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-danger rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">Teacher Count</span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4"><?php echo ($teacherA_num); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-danger rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">Academic Officer Count</span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4"><?php echo ($academicOfficer_num); ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 p-0">
                    <hr class="border-1 border-white" />
                </div>

                <div class="col-12 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-success rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">UPTIME</span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4" id="uptime">

                                <script>
                                    function uptime() {
                                        var uptime = document.getElementById("uptime");

                                        var r = new XMLHttpRequest();

                                        r.onreadystatechange = function() {
                                            if (r.readyState == 4) {
                                                var t = r.responseText;
                                                uptime.innerHTML = t;
                                            }
                                        };

                                        r.open("GET", "../app/uptime.php", true);
                                        r.send();
                                    }

                                    uptime();
                                    setInterval(() => {
                                        uptime();
                                    }, 1000);
                                </script>

                            </span>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-8 offset-2 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-primary rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">Top </span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4"><?php echo ($academicOfficer_num); ?></span>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
    <?php
    } else if ($_GET["utype"] == "S") {
    ?>

        <div class="col-12 p-0 bg-dark  text-white">
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="py-2 row text-center m-0">
                        <span class="fw-bold fs-1">STATISTICS</span>
                    </div>
                </div>

                <div class="col-12 p-0">
                    <hr class="border-1 border-white" />
                </div>

                <?php
                //  add to dbms and store data

                $studentA_rs = Database::search("SELECT * FROM student");
                $studentA_num = $studentA_rs->num_rows;
                $studentA_data = $studentA_rs->fetch_assoc();

                $teacherA_rs = Database::search("SELECT * FROM teacher");
                $teacherA_num = $teacherA_rs->num_rows;
                $teacherA_data = $teacherA_rs->fetch_assoc();

                $academicOfficer_rs = Database::search("SELECT * FROM academic_officer");
                $academicOfficer_num = $academicOfficer_rs->num_rows;
                $academicOfficer_data = $academicOfficer_rs->fetch_assoc();

                // best student

                ?>

                <div class="col-12 col-lg-4 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-danger rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">Student Count</span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4"><?php echo ($studentA_num); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-danger rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">Teacher Count</span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4"><?php echo ($teacherA_num); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-danger rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">Academic Officer Count</span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4"><?php echo ($academicOfficer_num); ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 p-0">
                    <hr class="border-1 border-white" />
                </div>

                <div class="col-12 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-success rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">UPTIME</span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4" id="uptime">

                                <script>
                                    function uptime() {
                                        var uptime = document.getElementById("uptime");

                                        var r = new XMLHttpRequest();

                                        r.onreadystatechange = function() {
                                            if (r.readyState == 4) {
                                                var t = r.responseText;
                                                uptime.innerHTML = t;
                                            }
                                        };

                                        r.open("GET", "../app/uptime.php", true);
                                        r.send();
                                    }

                                    uptime();
                                    setInterval(() => {
                                        uptime();
                                    }, 1000);
                                </script>

                            </span>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-8 offset-2 p-3">
                    <div class="row m-0">
                        <div class="text-center w-100 p-3 m-0 bg-primary rounded-4">
                            <span class="fw-bold py-2 mt-2 text-white fs-4">Top </span>
                            <hr class="m-0 my-1 p-1">
                            <span class=" py-2 mt-2 text-white fs-4"><?php echo ($academicOfficer_num); ?></span>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>

<?php
    } else {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}
