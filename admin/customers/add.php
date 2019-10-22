<?php require_once("../../include/db.php"); ?>
<?php require_once("../../include/sessions.php"); ?>
<?php require_once("../../include/functions.php"); ?>


<?php

if (isset($_POST['submit'])) {

    $name =($_POST["name"]);
    $category_id =($_POST["category_id"]);
    $size =($_POST["size"]);
    $description =($_POST["description"]);

    $image = $_FILES['image']['name'];

    $target = "../../images/".basename($_FILES['image']['name']);

    if(empty($name)){
        $_SESSION["ErrorMessage"] = "All Fields must be filled";
        redirect_To("add.php");
    }elseif (strlen($name) == 1){
        $_SESSION["ErrorMessage"] = "Name cannot be less than one character";
        redirect_To("add.php");
    }else{
        global $con;

        $query="INSERT INTO `products`(`name`,`category_id`,`size`,`image`,`description`) 
            VALUES ('$name','$category_id','$size','$image','$description')";
        $execute = mysqli_query($con,$query);

        move_uploaded_file($_FILES['image']['tmp_name'],$target);

        if ($execute){
            $_SESSION["SuccessMessage"] = "Product Successfully Added";
            redirect_To("add.php");
        }
        else{
            $_SESSION["ErrorMessage"] = "Product Not Added Successfully";
            redirect_To("add.php");
        }
    }

}

if (isset($_POST['cancel'])){
    redirect_To("../index.php");    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mombasa Uniform</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="../../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->



</head>

<body class="navbar-top">

<!-- Main navbar -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <!--        <a class="navbar-brand" href="index.html"><img src="assets/images/logo_light.png" alt=""></a>-->

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">


            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="../assets/images/image.png" alt="">
                    <span>Rahma</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">

                    <li><a href="../logout.php"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main sidebar-fixed">
            <div class="sidebar-content">

                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">

                            <!-- Main -->
                            <li class="navigation-header"><span>Mombasa Uniform</span> <i class="icon-menu" title="Main pages"></i></li>
                            <li><a href="../index.php"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                            <li>
                                <a href="#"><i class="icon-stack"></i> <span>Catalog</span></a>
                                <ul>
                                    <li>
                                        <a href="#">Products</a>
                                        <ul>
                                            <li><a href="products/create.php">Add Products</a></li>

                                        </ul>
                                    </li>
                                    <li><a href="4_col.html">Orders</a></li>
                                    <li>
                                        <a href="#">Customers</a>
                                        <ul>
                                            <li><a href="detached_left.html">Add Customer</a></li>

                                        </ul>
                                    </li>

                                    <li class="navigation-divider"></li>
                                    <li><a href="layout_navbar_fixed_main.html">Log Out</a></li>

                                </ul>
                            </li>
                            <li><a href="../changelog.html"><i class="icon-list-unordered"></i> <span>Changelog</span></a></li>
                            <!-- /main -->

                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Add User [Customer]</span> </h4>
                    </div>

                    <div class="heading-elements">
                        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
                    </div>
                </div>

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="../index.php"><i class="icon-home2 position-left"></i> Home</a></li>
                        <li><a href="add.php">Products</a></li>

                    </ul>

                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

                <?php
                    echo Message();
                    echo SuccessMessage();
                ?>
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Add User </h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="add.php" method="post" enctype="multipart/form-data">
                            <fieldset class="content-group">


                                <div class="form-group">
                                    <input type="text" hidden name="id"  >

                                    <label class="control-label col-lg-2" for="name">Customer Name:</label>
                                    <input class="form-control" type="text" name="name" id="name" placeholder="Name" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="size">Product Size:</label>
                                    <input class="form-control" type="text" name="size" id="size" placeholder="Product Size" />
                                </div>

                                <div class="form-group">
                                    <label for="category_id">Product Category:</label>
                                    <select class="form-control" name="category_id" id="category_id">

                                        <?php
                                        global $con;
                                        $query = "SELECT * FROM category";
                                        $result = mysqli_query($con,$query);

                                        while ($execute = mysqli_fetch_array($result))
                                        {
                                            $name = $execute['name'];
                                            ?>
                                            <option> <?php echo $name ?> </option>
                                        <?php  } ?>

                                    </select>


                                </div>

                                <div class="form-group">
                                    <label for="description">Product Description:</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                                </div>

                                <div class="form-group">

                                    <label for="image">Image :</label>
                                    <input class="form-control " type="File" name="image" id="image" />

                                </div>

                                <input class="btn btn-info btn-block btn-md-6" type="submit" name="submit" value="Add New Product" /></br>
                                <input class="btn btn-danger btn-block btn-md-6" type="submit" name="cancel" value="Cancel" /></br>
                            </fieldset>
                        </form>
                    </div>
                </div>


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
<script type="text/javascript" src="../../assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="../../assets/js/core/libraries/bootstrap.min.js"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script type="text/javascript" src="../../assets/js/plugins/ui/nicescroll.min.js"></script>

<script type="text/javascript" src="../../assets/js/core/app.js"></script>
<script type="text/javascript" src="../../assets/js/layout_fixed_custom.js"></script>
<!-- /theme JS files -->
</body>
</html>
