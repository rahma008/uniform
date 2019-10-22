<?php require_once("../include/db.php"); ?>
<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/functions.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mombasa Uniforms</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->



</head>

<body>

<!-- Page container -->
<div class="page-container login-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <?php
                    $name = $_POST['first_name'];
                    $password = $_POST['password'];

                if (isset($_POST['submit'])) {

//                    $_SESSION["SuccessMessage"] = "User Found";

                    global $con;
                    $query = "SELECT * FROM customer WHERE first_name = '$name' AND password = '$password'";

                    $execute = mysqli_query($con, $query);


                    if ($execute) {
                        $_SESSION["SuccessMessage"] = "Welcome";
                        redirect_To('index.php');

                    } else {
                        $_SESSION["ErrorMessage"] = "User Not Found";
//                        redirect_To('/index.php');

                    }
                }
                ?>

                <div class="container">
                    <?php
                        echo Message();
                        echo SuccessMessage();
                    ?>
                </div>
                <!-- Simple login form -->
                <form action="login.php" method="post">
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                            <h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" class="form-control" placeholder="Username" name="name">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button name="submit" type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
                        </div>

                        <div class="text-center">
                            <a href="login_password_recover.html">Forgot password?</a>
                        </div>
                    </div>
                </form>
                <!-- /simple login form -->


                <!-- Footer -->
                <div class="footer text-muted">
                    &copy; 2019. <a href="#">Mombasa Uniform</a> by <a href="#" target="_blank">Rahma Fuad</a>
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->
<!-- Core JS files -->
<script type="text/javascript" src="../assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="../assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/plugins/loaders/blockui.min.js"></script>
<!-- /core JS files -->


<!-- Theme JS files -->
<script type="text/javascript" src="../assets/js/core/app.js"></script>
<!-- /theme JS files -->
</body>
</html>
