<?php
include("../db.php");
$id=$_REQUEST['id'];

mysqli_query($con,"DELETE FROM event_categories WHERE cid = '$id'")
        or die(mysqli_error());
header("Location:category.php");
?>