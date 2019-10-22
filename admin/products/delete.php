<?php require_once("../../include/db.php"); ?>
<?php require_once("../../include/sessions.php"); ?>
<?php require_once("../../include/functions.php"); ?>


<?php


    global $con;
    $delete = $_GET['delete'];
    $q = "DELETE FROM products WHERE id = '$delete'";
    $result = mysqli_query($con, $q);

    if ($result) {
        $_SESSION["ErrorMessage"] = "Delete Successfully";
        redirect_To("../index.php");
    } else {
        $_SESSION["ErrorMessage"] = "Error On Deletion";
        redirect_To("../index.php");
    }

