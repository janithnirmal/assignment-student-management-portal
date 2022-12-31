<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Portal</title>
    <!-- icon -->
    <link rel="icon" href="src/images/logo-color.svg">

    <!-- css -->
    <link rel="stylesheet" href="style/bootstrap.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/main.css">
</head>

<body class="sinIn-body bg-white text-white" style="height: 100vh; background-image: url(src/images/user-select-img-1.jpg);">

    <!-- user type selector -->
    <div class="container p-3 d-flex flex-column h-100 justify-content-between align-items-center pt-3">
        <div class="text-center">
            <h1 class="h1 fs-1">Welcome to Portal</h1>
            <p class="c-paragraph">Unleash power to the future</p>
        </div>

        <div class="text-center ">
            <h3 class="h3">Select Your Role to Sign In</h3>
            <div class="p-1 col-12 ">
                <div class="row m-0 crs-fs-6 text-center d-flex align-content-center pt-3">
                    <div class="col-md-3 col-12  d-flex align-items-center justify-content-center">
                        <div onclick="userSelection(event);"  id="userSelectionS" class="d-flex justify-content-center align-items-center p-3 fw-bold rounded-4 m-md-3 m-2 c-bg-primary  user-selector-block">Student</div>
                    </div>
                    <div class="col-md-3 col-12  d-flex align-items-center justify-content-center">
                        <div onclick="userSelection(event);"  id="userSelectionT" class="d-flex justify-content-center align-items-center p-3 fw-bold rounded-4 m-md-3 m-2 c-bg-primary  user-selector-block">Teacher</div>
                    </div>
                    <div class="col-md-3 col-12  d-flex align-items-center justify-content-center">
                        <div  onclick="userSelection(event);" id="userSelectionAO" class="d-flex justify-content-center align-items-center p-3 fw-bold rounded-4 m-md-3 m-2 c-bg-primary  user-selector-block">Academic Officer</div>
                    </div>
                    <div class="col-md-3 col-12  d-flex align-items-center justify-content-center">
                        <div onclick="userSelection(event);"  id="userSelectionA" class="d-flex justify-content-center align-items-center p-3  fw-bold rounded-4 m-md-3 m-2 c-bg-primary  user-selector-block">Admin</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p paragraph">2022 &copy; Allright Reserved</div>
    </div>

    <script src="scripts/script.js"></script>
    <script src="scripts/bootstrap.bundle.js"></script>
</body>

</html>