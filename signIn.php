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

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Portal</title>
    <!-- icon -->
    <link rel="icon" href="src/images/logo-color.svg">

    <!-- css -->
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/bootstrap.css">
</head>

<body class="sinIn-body bg-dark">
    <div class="container">
        <div class=" row d-flex justify-content-center align-items-center background">
            <div style=" background-color: var(--primary); border-radius: 15px;" class="c-shadow box col-10 offset-1 col-lg-8 d-flex flex-column flex-lg-row" id="contenContainer">

                <!-- big logo image -->
                <div class=" b1 col-12 col-lg-5 d-flex justify-content-center align-items-center " style="background-color: var(--dark);">
                    <img src="src/images/logo.svg" class="large-logo" id="largeLogo" />
                </div>

                <div class="b2 col-12 col-lg-7 d-flex align-items-center justify-content-center flex-lg-row bg-white" id="inputContainer">

                    <!-- sign up -->
                    <div class="row p-4 d-flex d-none align-content-center justify-content-center" id="inputFeild1">

                        <div class="col-12">
                            <!-- load the welcome message according to the user type -->
                            <label class="col-12 form-label text-center fw-bold fs-4">Welcome to <span style="color: var(--primary);"> <?php
                                                                                                                                        if ($utype == "A") {
                                                                                                                                            echo ("Admin");
                                                                                                                                        } else if ($utype == "T") {
                                                                                                                                            echo ("Teacher");
                                                                                                                                        } else if ($utype == "AO") {
                                                                                                                                            echo ("Acedemic officer");
                                                                                                                                        } else if ($utype == "S") {
                                                                                                                                            echo ("Student");
                                                                                                                                        }

                                                                                                                                        ?></span> Sign Up</label>
                        </div>
                        <div class="col-12">
                            <label class="form-label">NIC</label>
                            <input type="text" class="form-control" id="nic" />
                        </div>
                        <div class="col-12">
                            <label class="form-label">Verification Code</label>
                            <input type="text" class="form-control" id="vc" />
                        </div>
                        <div class="col-12 col-lg-6 mt-3">
                            <button class="mt-2 col-12 btn btn-primary" onclick="signUp();">Sign Up</button>
                        </div>
                        <div class="col-12 col-lg-6 mt-3    ">
                            <button class="mt-2 col-12 btn btn-secondary" onclick="pageChnager();">Sign In</button>
                        </div>
                    </div>

                    <!-- sign in -->
                    <div class="row  p-4 mt-3 h-50" id="inputFeild2">
                        <div class="col-12">
                            <!-- load the welcome message according to the user type -->
                            <label class="col-12 form-label text-center fw-bold fs-4">Welcome to <span style="color: var(--primary);"> <?php
                                                                                                                                        if ($utype == "A") {
                                                                                                                                            echo ("Admin");
                                                                                                                                        } else if ($utype == "T") {
                                                                                                                                            echo ("Teacher");
                                                                                                                                        } else if ($utype == "AO") {
                                                                                                                                            echo ("Acedemic officer");
                                                                                                                                        } else if ($utype == "S") {
                                                                                                                                            echo ("Student");
                                                                                                                                        }

                                                                                                                                        ?></span> Sign In</label>
                        </div>
                        <?php
                        if (isset($_COOKIE["nic"]) || isset($_COOKIE["password"])) {
                        ?>
                            <div class="col-12">
                                <label class="form-label">NIC</label>
                                <input type="text" class="form-control" id="nicSignIn" value="<?php echo ($_COOKIE["nic"]); ?>" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="passwordSignIn" value="<?php echo ($_COOKIE["password"]); ?>" />
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-12">
                                <label class="form-label">NIC</label>
                                <input type="text" class="form-control" id="nicSignIn" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="passwordSignIn" />
                            </div>
                        <?php
                        }

                        ?>
                        <div class="col-12 col-lg-6 mt-3 d-flex justify-content-center justify-content-lg-start">
                            <input id="rememberMe" class="mx-1 form-check-input" type="checkbox" aria-label="Checkbox for following text input">
                            <label class="form-label">Remember me</label>
                        </div>
                        <div class="col-12 col-lg-6 d-flex justify-content-lg-end justify-content-center">
                            <a class="mt-3" href="#">Forgot password?</a>
                        </div>
                        <?php
                        // if the user is an admin then we shall not show a sign up section since the admin belongs to the top hierachy of users types.
                        if ($utype != "A") {
                        ?>
                            <div class="col-12 col-lg-6">
                                <button class="mt-2 col-12 btn btn-primary" onclick="signIn();">Sign In</button>
                            </div>
                            <div class="col-12 col-lg-6">
                                <button class="mt-2 col-12 btn btn-secondary" onclick="pageChnager();">Sign Up</button>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-12">
                                <button class="mt-2 col-12 btn btn-primary" onclick="signIn();">Sign In</button>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>


    </div>

    <script src="scripts/script.js"></script>
    <script src="scripts/bootstrap.bundle.js"></script>
</body>

</html>