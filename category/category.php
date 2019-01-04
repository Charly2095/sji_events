<html>
<head>
<!-- <link href="../public/headercss.css" rel="stylesheet" type="text/css"> -->
<link href="../event/event.css" rel="stylesheet" type="text/css">

<?php
include("../public/header.php");
include_once("../db.php");
?>
</head>
<body style="background-color: darkgrey;">
<div style="text-align: -webkit-center; background-color: darkgrey; padding-top:100;">
<form method="post">
<table>
	<tr>
		<td>Category Name:</td>
		<td><input type="text" name="cat" required/></td>
	</tr>
    </table>
    <input type="submit" name="submit" value="Save Event Category" class="btn" />
<?php
if (isset($_POST['submit']))
	{	   
        $cname=$_POST['cat'] ;
        mysqli_query($con,"INSERT INTO `event_categories`(cname) 
		 VALUES ('$cname')");
    }
    ?>
    </form>
</div>
<div style="text-align: -webkit-center;">
    <form method="post">  
    <table border="1" style="background-color:#C0C0C0">
        
        <?php  
        $result = mysqli_query($con,'SELECT * FROM event_categories');
            while($test = mysqli_fetch_array($result))
            {?>
                <tr>	
                <td><?= $test['cid']?></td>
                <td><?=$test['cname']?></td>
                <td><a href="edit.php?id=<?= $test['cid']?>">Edit</a> </td>
                <td><a href="delete.php?id=<?= $test['cid']?>">Delete</a> </td>                     
                </tr>
           <?php  }
           ?>
    
