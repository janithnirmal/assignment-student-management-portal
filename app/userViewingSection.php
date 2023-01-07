<?php
// verify if the user has redirected to this page using the use type selection. if not we move him to that page.
if (isset($_GET['modifyingUtype'])) {
    if ($_GET["modifyingUtype"] == "A" || $_GET["modifyingUtype"] == "AO" || $_GET["modifyingUtype"] == "S" || $_GET["modifyingUtype"] == "T") {
        $modifyingUtype = $_GET["modifyingUtype"];
        echo ("<var id='modifyingUtype' class='d-none'>" . $modifyingUtype . "</var>");
    }
}

if ($modifyingUtype == "T") {
?>

    <div class="col-12 p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="row m-0">
                    <div class="col-4 p-2 fs-6 fw-bold text-white bg-secondary">
                        <div class="row m-0">
                            Student
                        </div>
                    </div>
                    <div class="col-3 p-2 fs-6 fw-bold text-white bg-dark">
                        <div class="row m-0">
                            NIC
                        </div>
                    </div>
                    <div class="col-3 p-2 fs-6 fw-bold text-white bg-secondary">
                        <div class="row m-0">
                            Mobile
                        </div>
                    </div>
                    <div class="col-2 p-2 fs-6 fw-bold text-white bg-dark">
                        <div class="row m-0">
                            Status
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 p-0">
                <hr class="border-3">
            </div>

            <!-- content -->
            <div class="col-12 p-0">
                <div class="row m-0">

                    <?php
                    require("../connection.php");

                    $aoList_rs = Database::search("SELECT * FROM Teacher");
                    $aoList_num = $aoList_rs->num_rows;

                    for ($x = 0; $x < $aoList_num; $x++) {
                        $tListData = $aoList_rs->fetch_assoc();
                    ?>
                        <div class="col-4 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0">
                                <?php echo ($tListData["fname"] . " " . $tListData["lname"]); ?>
                            </div>
                        </div>
                        <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0">
                                <?php echo ($tListData["nic"]); ?>
                            </div>
                        </div>
                        <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0">
                                <?php echo ($tListData["mobile1"]); ?>
                            </div>
                        </div>
                        <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0 d-grid">
                                <?php
                                if ($tListData["verification_status"] == 0) { // verify
                                ?>
                                    <button class="btn btn-primary">not verified</button>
                                <?php
                                } else if ($tListData["verification_status"] == 1) { // bloking
                                ?>
                                    <button class="btn btn-danger" onclick="blockUnblock('<?php echo ($tListData['nic']); ?>', '<?php echo ($modifyingUtype); ?>');">Block</button>
                                <?php
                                } else if ($tListData["verification_status"] == 2) { // unblocking
                                ?>
                                    <button class="btn btn-success" onclick="blockUnblock('<?php echo ($tListData['nic']); ?>', '<?php echo ($modifyingUtype); ?>');">Unblock</button>
                                <?php
                                } else {
                                ?>
                                <?php
                                }

                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
<?php
} else
if ($modifyingUtype == "S") {
?>

    <div class="col-12 p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="row m-0">
                    <div class="col-4 p-2 fs-6 fw-bold text-white bg-secondary">
                        <div class="row m-0">
                            Student
                        </div>
                    </div>
                    <div class="col-3 p-2 fs-6 fw-bold text-white bg-dark">
                        <div class="row m-0">
                            NIC
                        </div>
                    </div>
                    <div class="col-3 p-2 fs-6 fw-bold text-white bg-secondary">
                        <div class="row m-0">
                            Mobile
                        </div>
                    </div>
                    <div class="col-2 p-2 fs-6 fw-bold text-white bg-dark">
                        <div class="row m-0">
                            Status
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 p-0">
                <hr class="border-3">
            </div>

            <!-- content -->
            <div class="col-12 p-0">
                <div class="row m-0">

                    <?php
                    require("../connection.php");

                    $aoList_rs = Database::search("SELECT * FROM student");
                    $aoList_num = $aoList_rs->num_rows;

                    for ($x = 0; $x < $aoList_num; $x++) {
                        $tListData = $aoList_rs->fetch_assoc();
                    ?>
                        <div class="col-4 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0">
                                <?php echo ($tListData["fname"] . " " . $tListData["lname"]); ?>
                            </div>
                        </div>
                        <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0">
                                <?php echo ($tListData["nic"]); ?>
                            </div>
                        </div>
                        <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0">
                                <?php echo ($tListData["mobile1"]); ?>
                            </div>
                        </div>
                        <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0 d-grid">
                                <?php
                                if ($tListData["verification_status"] == 0) { // verify
                                ?>
                                    <button class="btn btn-primary">not verified</button>
                                <?php
                                } else if ($tListData["verification_status"] == 1) { // bloking
                                ?>
                                    <button class="btn btn-danger" onclick="blockUnblock('<?php echo ($tListData['nic']); ?>', '<?php echo ($modifyingUtype); ?>');">Block</button>
                                <?php
                                } else if ($tListData["verification_status"] == 2) { // unblocking
                                ?>
                                    <button class="btn btn-success" onclick="blockUnblock('<?php echo ($tListData['nic']); ?>', '<?php echo ($modifyingUtype); ?>');">Unblock</button>
                                <?php
                                } else {
                                ?>
                                <?php
                                }

                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
<?php
} else
if ($modifyingUtype == "AO") {
?>

    <div class="col-12 p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="row m-0">
                    <div class="col-4 p-2 fs-6 fw-bold text-white bg-secondary">
                        <div class="row m-0">
                            Student
                        </div>
                    </div>
                    <div class="col-3 p-2 fs-6 fw-bold text-white bg-dark">
                        <div class="row m-0">
                            NIC
                        </div>
                    </div>
                    <div class="col-3 p-2 fs-6 fw-bold text-white bg-secondary">
                        <div class="row m-0">
                            Mobile
                        </div>
                    </div>
                    <div class="col-2 p-2 fs-6 fw-bold text-white bg-dark">
                        <div class="row m-0">
                            Status
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 p-0">
                <hr class="border-3">
            </div>

            <!-- content -->
            <div class="col-12 p-0">
                <div class="row m-0">

                    <?php
                    require("../connection.php");

                    $aoList_rs = Database::search("SELECT * FROM academic_officer");
                    $aoList_num = $aoList_rs->num_rows;

                    for ($x = 0; $x < $aoList_num; $x++) {
                        $tListData = $aoList_rs->fetch_assoc();
                    ?>
                        <div class="col-4 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0">
                                <?php echo ($tListData["fname"] . " " . $tListData["lname"]); ?>
                            </div>
                        </div>
                        <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0">
                                <?php echo ($tListData["nic"]); ?>
                            </div>
                        </div>
                        <div class="col-3 p-2 fs-6 fw-bold text-white border-1 bg-secondary">
                            <div class="row m-0">
                                <?php echo ($tListData["mobile1"]); ?>
                            </div>
                        </div>
                        <div class="col-2 p-2 fs-6 fw-bold text-white border-1 bg-dark">
                            <div class="row m-0 d-grid">
                                <?php
                                if ($tListData["verification_status"] == 0) { // verify
                                ?>
                                    <button class="btn btn-primary">not verified</button>
                                <?php
                                } else if ($tListData["verification_status"] == 1) { // bloking
                                ?>
                                    <button class="btn btn-danger" onclick="blockUnblock('<?php echo ($tListData['nic']); ?>', '<?php echo ($modifyingUtype); ?>');">Block</button>
                                <?php
                                } else if ($tListData["verification_status"] == 2) { // unblocking
                                ?>
                                    <button class="btn btn-success" onclick="blockUnblock('<?php echo ($tListData['nic']); ?>', '<?php echo ($modifyingUtype); ?>');">Unblock</button>
                                <?php
                                } else {
                                ?>
                                <?php
                                }

                                ?>
                            </div>
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