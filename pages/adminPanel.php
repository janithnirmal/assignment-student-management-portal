<?php
$sectionName = $_GET["section"];

if ($sectionName == "userManagementAO") {
?>
    <div class="col-12 bg-white h-100">
        <div class="row m-0 h-100">
            <div class="col-12 col-lg-4 p-2 bg-dark text-white">
                <div class="row m-0">
                    <button onclick="addAO();" class="rounded-4 w-100 py-2 px-3 border-0 bg-white my-2">Add an Academic Officer</button>
                    <button onclick="viewAO();" class="rounded-4 w-100 py-2 px-3 border-0 bg-white">View Academic Officers</button>
                </div>
            </div>
            <div class="col-12 col-lg-8 p-2" style="height: 90vh;">
                <div class="row m-0 py-2 mb" id="adminFeaturesSection" style=" height: 90vh;overflow: auto;">
                    <!-- content goes here -->
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    echo ("nothings");
}

?>