<html>
<head>

<link href="event.css" rel="stylesheet" type="text/css">
</head>
<?php
include("../public/header.php");
include_once("../db.php");
?>

<body style="background-color: darkgrey;">
<div style="text-align: -webkit-center; background-color: darkgrey;">
<form method="post" enctype="multipart/form-data" style="padding-left">
<table>
	<tr>
		<td>Event Name:</td>
		<td><input type="text" name="event" style="width:100%;" required/></td>
    </tr>
    <tr><td>&nbsp</td></tr>
	<tr>
		<td> Description:</td>
		<td><textarea type="text" name="desc" required></textarea></td>
    </tr>
    <tr><td>&nbsp</td></tr>
	<tr>
		<td>Date:</td>
		<td><input type="date" name="date" required /></td>
    </tr>
    <tr><td>&nbsp</td></tr>
    <tr>
        <td>Insert Image:</td>
		<td><input type="file" name="image" accept ="image/*" required/></td>
    </tr>
    <tr><td>&nbsp</td></tr>
    <tr>
		<td>Category:</td>
		<td>
        <select name="category">
        <option value="">Select Catogory</option>
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
        <td>Event Featured</td>
        <td><input type="radio" name="featured" value="0" checked>Not Featured
            <input type="radio" name="featured" value="1">Featured
        </td>
    </tr>
    <tr><td>&nbsp</td></tr>
    <tr>
        <td>Enable Event</td>
        <td><input type="radio" name="status" value="0">Disable
            <input type="radio" name="status" value="1" checked>Enable
        </td>
    </tr>
    <tr><td>&nbsp</td></tr>

</table>
<input type="submit" name="submit" value="Save Event" class="btn"/>
    </div>    
<?php
if (isset($_POST['submit']))
	{	   
		$event=$_POST['event'] ;
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
        $image=$new_file_name ;
        $c_id=$_POST['category'];
        $feature=$_POST['featured'];
        $status=$_POST['status'];							
		 mysqli_query($con,"INSERT INTO `event`(ename,description,date,image,category_id,is_featured,status) 
		 VALUES ('$event','$desc','$date','$image','$c_id',$feature,$status)"); 		
    }
?>
</form>
<div style="text-align: -webkit-center;">
<form method="post">  
<table border="1" style="background-color:#C0C0C0">
	
    <?php  
    $result = mysqli_query($con,'SELECT eid,ename,description,date,image,cname,is_featured,status FROM event inner join event_categories where category_id=cid');
     if (mysqli_num_rows($result) > 0) {
        ?>
    <tr>
    <td>Event Name</td>
    <td>Description</td>
    <td>Date</td>
    <td>Image</td>
    <td>Category Name</td>
    <td>Event Featured </td>
    <td>Event Status</td>
    <?php
        while($test = mysqli_fetch_array($result))
        {?>
            <tr>	
            <td><?= $test['ename']?></td>
            <td><?=$test['description']?></td>
            <td><?=$test['date']?></td>
            <td><?=$test['image']?></td>
            <td><?=$test['cname']?></td>
            <td><?php if($test['is_featured']) echo "Yes"; else echo "No";?></td>
            <td><?php if($test['status']) echo "Yes"; else echo "No";?></td>
            <td><a href="edit.php?id=<?= $test['eid']?>">Edit</a> </td>
            <td><a href="delete.php?id=<?= $test['eid']?>">Delete</a> </td>                     
            </tr>
       <?php  } 
     }
    mysqli_close($con);
    ?>
</table>
</form>
</div>
</body>
</html>