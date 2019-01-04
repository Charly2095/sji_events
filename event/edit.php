<html>
<head>
<link href="../public/headercss.css" rel="stylesheet" type="text/css">
<link href="event.css" rel="stylesheet" type="text/css">


<?php
include("../public/header.php");
include("../db.php");
$id=$_REQUEST['id'];

$result=mysqli_query($con,"select * FROM event WHERE eid = '$id'")
        or die(mysqli_error());

if (mysqli_num_rows($result) > 0) 
    $ary=mysqli_fetch_array($result);
?>

<?php

if (isset($_POST['submit']))
	{	   
		$name=$_POST['ename'] ;
		$desc= $_POST['desc'] ;					
        $date=$_POST['date'] ;
                    
        if($_FILES['image']['name'])
        {    
            if(!$_FILES['image']['error'])
            {
                $new_file_name=time()."-". strtolower($_FILES['image']['name']); 
                move_uploaded_file($_FILES['image']['tmp_name'],'../images/'.$new_file_name);
            }
        }
        print_r($_FILES['image']['name']);
       
        if($_FILES['image']['name'])
        {
            unlink('../images/'.$ary['image']);    
            $image=$new_file_name;
        }
        else{
            $image=$ary['image'];
        }
       
        $c_id=$_POST['category'];
        $featured=$_POST['featured'];
        $status=$_POST['status'];     
        $sql = "UPDATE event SET ename ='$name', description ='$desc',date ='$date',image ='$image', category_id='$c_id',is_featured='$featured',status='$status' WHERE eid = $id";
        if(mysqli_query($con,$sql))
        {
            header("Location:add.php");
        } 	     
    }
?>
</head>
<body class="body">
<div class="form">
<b>
<form method="post" enctype="multipart/form-data" style="background-color:#A9A9A9; padding-left: 550;">
<table>
	<tr>
        <td>&nbsp</td>
		<td>Event Name:</td>
		<td><input type="text" name="ename" value=<?= $ary['ename']?> /></td>
	</tr>
    <tr><td>&nbsp</td></tr>
	<tr>
    <td>&nbsp</td>
		<td> Description:</td>
		<td><textarea type="text" name="desc" ><?= $ary['description']?></textarea></td>
	</tr>
    <tr><td>&nbsp</td></tr>
	<tr>
        <td>&nbsp</td>
		<td>Date:</td>
		<td><input type="date" name="date" value=<?= $ary['date']?> /></td>
	</tr>
    <tr><td>&nbsp</td></tr>
    <tr>
        <td>&nbsp</td>
        <td>Image:</td>
		<td><img src="../images/<?= $ary['image']?>" height="200" width="200"></td>
    </tr>
    <tr>
        <td>&nbsp</td>
        <td>&nbsp</td>
        <td><input type="file" name="image" accept ="image/*" /></td>
    </tr>
    <tr><td>&nbsp</td></tr>
    <tr>
        <td>&nbsp</td>
		<td>Category:</td>
		<td>
        <select name="category">
        <?php
        $query=mysqli_query($con,"select * from event_categories");
        if(mysqli_num_rows($query)>0)
        {
            while($ary=mysqli_fetch_array($query))
            {
                ?><option value=<?=$ary['cid']?>>  <?=$ary['cname']?> </option>
        <?php
            }
        }
        else
        {
            print "no records found";
        }
        ?> 
        </select>
        </td>
	</tr>
    <tr><td>&nbsp</td></tr>
    <tr>
        <td>&nbsp</td>
        <td>Event Featured</td>
        <?php if($ary['is_featured']){?>
        <td><input type="radio" name="featured" value="0" checked>Not Featured
            <input type="radio" name="featured" value="1">Featured
        </td>
    <?php } else { ?>
        <td><input type="radio" name="featured" value="0">Not Featured
            <input type="radio" name="featured" value="1"  checked>Featured
        </td>
    <?php } ?>
    </tr>
    <tr><td>&nbsp</td></tr>
    <tr>
        <td>&nbsp</td>
        <td>Enable Event</td>
        <?php if($ary['status']){?>
        <td><input type="radio" name="status" value="0" checked>Disable
            <input type="radio" name="status" value="1">Enable
        </td>
        <?php } else { ?>
            <td><input type="radio" name="status" value="0">Disable
            <input type="radio" name="status" value="1" checked>Enable
        </td>
        <?php } ?>
    </tr>
    <tr><td>&nbsp</td></tr>
	<tr>
        <td>&nbsp</td>
		<td>&nbsp</td>
		<td><input type="submit" name="submit" value="Update Event" class="btn"/></td>
	</tr>
</table>
</form>
</div>
</body>
</html>