
<?php require_once("../include/db.php"); ?>
<?php require_once("../include/sessions.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mombasa Uniform</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/colors.css" rel="stylesheet" type="text/css">
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

                    <li><a href="login.php"><i class="icon-switch2"></i> Logout</a></li>
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
                            <li><a href="index.php"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                            <li>
                                <a href="#"><i class="icon-stack"></i> <span>Catalog</span></a>
                                <ul>
                                    <li>
                                        <a href="#">Products</a>
                                        <ul>
                                            <li><a href="products/add.php">Add Products</a></li>

                                        </ul>
                                    </li>
                                    <li><a href="4_col.html">Orders</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-stack"></i> <span>Accounts</span></a>
                                <ul>
                                    <li>
                                        <a href="#">Customers</a>
                                        <ul>
                                            <li><a href="customers/add.php">Add Customers</a></li>

                                        </ul>
                                    </li>

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
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Admin Dashboard</span> </h4>
                    </div>

                    <div class="heading-elements">
                        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
                    </div>
                </div>

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="index.php"><i class="icon-home2 position-left"></i> Home</a></li>
                        <li><a href="products/add.php">Products</a></li>

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

                <!-- Table -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Products table</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>



                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered table-condensed">
                            <th>No.</th>
                            <th>Name</th>
                            <th>Size</th>
                            <th>Image</th>
                            <th>Gender</th>
                            <th>Action</th>

                            <?php
                            global $con;
                            $query = "SELECT * FROM products ORDER BY category_id desc ";
                            $result = mysqli_query($con,$query);

                            $srno = 0;

                            while ($execute = mysqli_fetch_array($result)){
                                $id = $execute['id'];
                                $name = $execute['name'];
                                $size = $execute['size'];
                                $image = $execute['image'];
                                $category_id = $execute['category_id'];

                                $srno++;
//                            ?>
                                <tr>
                                    <td><?php echo $srno?></td>
                                    <td><a href="../customer/cart.php?id=<?php echo $id?>" target="_blank"> <?php echo $name?></a></td>
                                    <td><?php echo $size?></td>
                                    <td><img  src="../images/<?php echo $image; ?>" width="150px"; height="70px";></td>
                                    <td><?php echo $category_id?></td>
                                    <td>
                                        <a href="products/edits.php?edit=<?php
                                        echo $id;?>">
                                            <span class="btn btn-sm btn-info"> Edit</span></a>

                                        <a href="products/delete.php?delete=<?php
                                        echo $id;?>">
                                            <span class="btn btn-sm btn-danger"> Delete</span></a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>
                <!-- /table -->


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
<script type="text/javascript" src="../assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/core/libraries/bootstrap.min.js"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script type="text/javascript" src="../assets/js/plugins/ui/nicescroll.min.js"></script>

<script type="text/javascript" src="../assets/js/core/app.js"></script>
<script type="text/javascript" src="../assets/js/layout_fixed_custom.js"></script>
<!-- /theme JS files -->
</body>
</html>
