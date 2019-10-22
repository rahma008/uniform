

<?php require_once("../include/db.php"); ?>
<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php


if (isset($_POST['submit'])) {

    $name =($_POST["name"]);


    date_default_timezone_set("Africa/Nairobi");

//        $currentTime=time();
//        $date=strftime("%B-%d-%m %H:%M:%S",$currentTime);
//        $date;

//        $size = '3-5years';
    if(empty($name)){
        $_SESSION["ErrorMessage"] = "All Fields must be filled";
        redirect_To("category.php");
    }elseif (strlen($name) == 1){
        $_SESSION["ErrorMessage"] = "Name cannot be less than one character";
        redirect_To("category.php");
    }else{
        global $con;

        $query="INSERT INTO `category`( `id`, `name`) VALUES ( 2,'$name')";
        $execute = mysqli_query($con,$query);

        if ($execute){
            $_SESSION["SuccessMessage"] = "Product Successfully Added";
            redirect_To("category.php");
        }else{
            $_SESSION["ErrorMessage"] = "Product Not Added Successfully";
            redirect_To("category.php");
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Categories | Create </title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>

<?php require_once("../include/top_bar.php"); ?>
<div class="container-fluid">
    <div class="row">

        <div class="col-sm-2">
            <?php require_once("../include/side_bar.php"); ?>
        </div>

        <div id="col"class="col-sm-10">
            <div>
                <h1>Category</h1>
                <h6>Add new category</h6>
                <div>
                    <?php
                    echo Message();
                    echo SuccessMessage();
                    ?></div>
                <form action="category.php" method="post">
                    <fieldset>
                        <div class="form-group">
                            <input type="text" hidden name="id"  >

                            <label for="name">Category Name:</label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="Category Name" /><br>


                            <input class="btn btn-success btn-block" type="submit" name="submit" value="Add New Category" /></br>
                        </div>
                    </fieldset>
                </form>

            </div>

        </div>
    </div>
</div>

</body>
</html>