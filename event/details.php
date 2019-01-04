<?php
include("../public/header.php");
include_once("../db.php");
$id=$_REQUEST['id'];
?>
<html>
<head>
<link href="../public/headercss.css" rel="stylesheet" type="text/css">
<link href="event.css" rel="stylesheet" type="text/css">
</head>
<body class="body">
<div class="form">
<table>
<?php 
$result=mysqli_query($con,"select * from event inner join event_categories where category_id=cid AND eid='$id'");
$count1=mysqli_num_rows($result);

if($count1>0)
{
    while($rec=mysqli_fetch_array($result))
        {
            ?>
            <tr>
            <td><img src="../images/<?=$rec['image']?>" height="500" width="800"></td>
            <td><h2><?=$rec['ename']?>  (<?=$rec['cname']?>)</h2><br>
                <h2>Held on:<?=$rec['date']?> 
                <?php if($rec['is_featured']) echo "Featured Event";?>  </h2>
                <h3><?=$rec['description']?></h3>
            </tr>
        <?php
        }
}
?>
</table>
</body>
</html>