<?php
include("../db.php");
$id=$_REQUEST['id'];

$result=mysqli_query($con,"select * FROM event WHERE eid = '$id'")
        or die(mysqli_error());

if (mysqli_num_rows($result) > 0) 
    $ary=mysqli_fetch_array($result);
unlink('../images/'.$ary['image']);
mysqli_query($con,"DELETE FROM event WHERE eid = '$id'")
        or die(mysqli_error());
header("Location:add.php");
?>