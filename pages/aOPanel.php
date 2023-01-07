<?php
$sectionName = $_GET["section"];

if ($sectionName == "userManagementS") {
?>
    <div class="col-12 bg-white h-100">
        <div class="row m-0 h-100">
            <div class="col-12 col-lg-4 p-2 bg-dark text-white">
                <div class="row m-0">
                    <button onclick="addS();" class="rounded-4 w-100  my-2 py-2 px-3 border-0 bg-white">Add Student</button>
                    <button onclick="viewS();" class="rounded-4 w-100 my-2  py-2 px-3 border-0 bg-white">View Student</button>
                </div>
            </div>
            <div class="col-12 col-lg-8 p-2" style="height: 90vh;">
                <div class="row m-0 py-2 mb" id="adminFeaturesSection" style=" height: 90vh; overflow: auto;">
                    <!-- content goes here -->
                    <span class="fw-bold fs-3 text-secondary">Select A Section</span>
                </div>
            </div>
        </div>
    </div>
<?php
} else if ($sectionName == "assignmentManagementS") {
?>
    <div class="col-12 bg-white h-100">
        <div class="row m-0 h-100">
            <div class="col-12 col-lg-4 p-2 bg-dark text-white">
                <div class="row m-0">
                    <button onclick="viewAssignmentsAO();" class="rounded-4 w-100  my-2 py-2 px-3 border-0 bg-white">View Assignments</button>
                </div>
            </div>
            <div class="col-12 col-lg-8 p-2" style="height: 90vh;">
                <div class="row m-0 py-2 mb" id="adminFeaturesSection" style=" height: 90vh; overflow: auto;">
                    <!-- content goes here -->
                    <span class="fw-bold fs-3 text-secondary">Select A Section</span>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    echo ("nothings");
}

?>