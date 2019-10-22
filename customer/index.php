
<?php require_once("../include/db.php"); ?>
<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/functions.php"); ?>





<!DOCTYPE html>
<html>
<head>
    <title>Mombasa Uniform</title>
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
<!--    <link rel="stylesheet" href="../css/admin.css">-->

</head>
<body>
<div style="height: 20px; background: #27AAE1;"></div>
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">

        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php" class="btn" >Home</a> </li>
            <li><a href="index.php" class="btn" >Girls</a> </li>
            <li><a href="index.php" class="btn" >Boys</a> </li>
            <li><a href="index.php" class="btn" >Shoes</a> </li>
            <li><a href="index.php" class="btn" >Trousers</a> </li>
            <li><a href="index.php" class="btn" >Shirts</a> </li>
            <li><a href="index.php" class="btn" >Socks</a> </li>

                    <li ><a href="index.php" class="btn" >
                        <div class="dropdown-toggle active">
                            <div style="display: inline-block; cursor: pointer;">
                                <span class="icon cart-icon"></span>
                                <span class="name">Cart
                                    <span class="count"> (0) </span>
                                </span>
                            </div>
                        </div></a>
                    </li>

        </ul>
        <form action="index.php" class="navbar-form navbar-right">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
            </div>
            <button class="btn btn-default" name="searchbutton">Go</button>

        </form>
    </div>
</nav>
<div style="height: 20px;  background: #27AAE1;"></div>

<div class="container">
    <h1>Welcome to Mombasa Uniform</h1>
    <p>Your Online shop for Uniform and students stores and products.</p>
    <div class="row">
        <div  class="col-sm-8 "><hr class="btn-info">
<!--            <h4 class="modal-title">Latest Uniforms </h4>-->
            <?php
                global $con;

                if (isset($_GET['searchbutton'])){
                    $result = $_GET['search'];

                    $query = "SELECT * FROM products
                            WHERE name LIKE '%$result%'
                            OR category_id LIKE '%$result%'
                            OR description LIKE '%$result%'
                            OR size LIKE '%$result% '";
                }else{

                $query = "SELECT * FROM products ORDER BY id desc";}
                $execute = mysqli_query($con,$query);
                while($data = mysqli_fetch_array($execute)){
                    $id = $data['id'];

                   $image =  $data['image'];
                   $name =  $data['name'];
                   $description =  $data['description'];
                   $category =  $data['category_id'];
                   $size =  $data['size'];
//

            ?>

                    <div class=" thumbnail">

                        <a href="#"><img class="img-rounded img-responsive" src="../images/<?php echo $image?>" alt=""  >
                        <div class="caption">
                            <h6><?php echo htmlentities($name)?></h6></a>

                            Category: <a href="index.php"> <?php echo htmlentities($category)?></a>
                            Size: <a href="#"> <?php echo htmlentities($size)?></a>

                            <p><?php

                                    if (strlen($description) > 10){
                                        $description=substr($description, 0,150).'...';
                                    } echo htmlentities($description);
                                ?></p>
                        </div>
                        <a href="cart.php?id=<?php echo $id;?> " ><span class="btn btn-info">
                    Buy Now &rsaquo;&rsaquo; </span> </a>
<!--                     <a href="cart.php"  id=--><?php //$id ?><!-- ><span class="btn btn-success">-->
<!--                    Add To Cart &rsaquo;&rsaquo; </span> </a>-->
                    </div>

                <?php } ?>
        </div>
        <div class="col-sm-3 col-sm-offset-1">
            <h2>Latest Shoes</h2>
            HTML stands for Hyper Text Markup Language, which is the most widely used language on
            Web to develop web pages.
            HTML was created by Berners-Lee in late 1991 but "HTML 2.0" was the first standard HTML
            specification which was published in 1995. HTML 4.01 was a major version of HTML and it
            was published in late 1999. Though HTML 4.01 version is widely used but currently we are
            having HTML-5 version which is an extension to HTML 4.01, and this version was published
            in 2012.
            Audience
            This tutorial is designed for the aspiring Web Designers and Developers with a need to
            understand the HTML in enough detail along with its simple overview, and practical
            examples. This tutorial will give you enough ingredients to start with HTML from where
            you can take yourself at higher level of expertise.
        </div>
    </div>


!-- Core JS files -->
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