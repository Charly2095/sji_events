<?php
include("../public/header.php");
include("../db.php");

$id=$_REQUEST['id'];

$result=mysqli_query($con,"select * FROM event_categories WHERE cid = '$id'")
        or die(mysqli_error());

if (mysqli_num_rows($result) > 0) 
{
    $ary=mysqli_fetch_array($result);
?>
<head>
<link href="../event/event.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color: darkgrey;">
<div style="text-align: -webkit-center;  padding-top:100;">
<form method="post">
<table>
	<tr>
		<td>Category Name:</td>
		<td><input type="text" name="cname" value=<?= $ary['cname']?> /></td>
	</tr>
</table>
<input type="submit" name="submit" value="Update Event" class="btn"/>
<?php
if (isset($_POST['submit']))
	{	   
			 		$name=$_POST['cname'] ;                    
                     $sql = "UPDATE event_categories SET cname ='$name' WHERE cid = $id";
                        
                    if(mysqli_query($con,$sql))
                    {
                        header("Location:category.php");
                    } 	
    }
}
?>
</form>
