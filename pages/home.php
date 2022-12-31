<?php
// verify if the use has redirected to this page using the use type selection. if not we move him to that page.
if (isset($_GET['utype'])) {
    if ($_GET["utype"] == "A" || $_GET["utype"] == "AO" || $_GET["utype"] == "S" || $_GET["utype"] == "T") {
        $utype = $_GET["utype"];
        echo ("<var id='utype' class='d-none'>" . $utype . "</var>");
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}
?>

<?php
// validating the user log in status
session_start();
$ACCESS = false;
$userType;

if (isset($_GET["utype"])) {
    $UTYPE = $_GET["utype"];
    if ($UTYPE == "A") {
        if (isset($_SESSION["au"])) {
            $ACCESS = true;
        } else {
            header("Location: ../index.php");
        }
        $userType = "Admin";
    } else if ($UTYPE == "AO") {
        if (isset($_SESSION["u"])) {
            $ACCESS = true;
        } else {
            header("Location: ../index.php");
        }
        $userType = "Academic Officer";
    } else if ($UTYPE == "S") {
        if (isset($_SESSION["u"])) {
            $ACCESS = true;
        } else {
            header("Location: ../index.php");
        }
        $userType = "Student";
    } else if ($UTYPE == "T") {
        if (isset($_SESSION["u"])) {
            $ACCESS = true;
        } else {
            header("Location: ../index.php");
        }
        $userType = "Teacher";
    }
} else {
    header("Location: ../index.php");
}

if ($ACCESS) {
?>



    <!-- portal panels designs -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Go Portal - <?php echo ($userType); ?></title>

        <!-- favicon -->
        <link rel="icon" href="../src/images/logo-color.svg" />

        <!-- css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="../style/bootstrap.css" />
        <link rel="stylesheet" href="../style/style.css" />
        <link rel="stylesheet" href="../style/main.css" />
    </head>

    <body style="height: 100vh;">


        <!-- navigation bar -->
        <nav class="c-shadow-down navbar navbar-expand-lg c-bg-primary text-white position-absolute w-100" style="min-height: 10vh;">
            <div class="container-fluid">
                <div class="order-lg-1 order-2 d-flex">
                    <a class="navbar-brand" href="#">
                        <img src="../src/images/logo.svg" alt="Bootstrap" width="30" height="24">
                    </a>
                    <div class="d-none d-lg-flex flex-column mx-2">
                        <span class="fw-bold fs-6">Hi Janith Nirmal</span>
                        <span class="fw-thin fs-6">rmjanithnirmal@gmail.com</span>
                    </div>
                </div>
                <div class=" order-3 order-lg-4 d-block my-2 textwhite fs-3">
                    <span style="cursor: pointer;" onclick="signOut();"><i class="mx-2 bi bi-box-arrow-left"></i></span>
                    <span style="cursor: pointer;"><i class="mx-2 bi bi-person-circle"></i></span>
                </div>
                <button class="text-white order-1 order-lg-2 border-white navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="text-white fs-3 bi bi-list"></i></span>
                </button>

                <div class="order-4 order-lg-3 collapse navbar-collapse d-lg-flex justify-content-center" id="navbarSupportedContent">
                    <?php
                    if ($userType == "Admin") {
                        include("adminNavbar.php");
                    } else {
                        // add other users navigations
                    }

                    ?>
                </div>
            </div>
        </nav>



        <!-- main content -->
        <div class="bg-secondary" style="height: 100vh; padding-top: 10vh;">
            <div class="col-12 p-0" style="overflow: hidden;">
                <div class="row m-0 h-100" id="mainContentPanel">
                    <!-- content goes here -->
                </div>
            </div>
        </div>



        <script src="../scripts/script.js"></script>
        <script src="../scripts/admin.js"></script>
        <script src="../scripts/bootstrap.bundle.js"></script>
    </body>

    </html>

<?php
}

?>