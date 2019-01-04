<?php
include("../public/header.php");
include_once("../db.php");
?>
<html>

<head>
    <!-- <link href="../public/headercss.css" rel="stylesheet" type="text/css"> -->
    <link href="event.css" rel="stylesheet" type="text/css">

</head>

<body>
    <div style="text-align:center;">
    
</div>
    <div class="slideshow-container">
        <?php
$query=mysqli_query($con,"select e.eid,e.ename,c.cname,e.image from event as e inner join event_categories as c where e.is_featured=1 and e.status=1 and c.cid=e.category_id");
$row=mysqli_num_rows($query);
$r=0;
$c=0;
if($row>0)
{
    while($ary=mysqli_fetch_array($query))
    {
        $c++;
?>
        <div class="mySlides fade">
            <img src="../images/<?= $ary['image']?>" style="width:100%; height:300;">
            <div class="text">
            <b style="color:white;"> <?= $ary['ename']?> </b>
            </div>
        </div>
        <?php
    }
    ?>
    <div style="text-align:center;">
    <?php
    while($r<$c)
    {
        ?>
            <span class="dot" onclick="currentSlide(<?= $r++; ?>)">
            </span>
        <?php
    }
    ?></div>
    <?php
}
?>
        <div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        </div>
        <div>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    
        <form name="search" method="Post" class="search-form">
        <input type="text" class="bar" name="input" placeholder="Search..." />
        <input type="submit" name="search" class="search-btn">
    </form>

    </div>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            console.log(n,slideIndex);
        }
    </script>



    <div>
        <table>
            <?php 
    if(isset($_SESSION["input"]))
    {
        $input=$_SESSION["input"]."%";
        $view=mysqli_query($con,"CREATE VIEW searching as SELECT ename,image,cname,eid from event inner join event_categories where category_id=cid AND status='1'");
        $result=mysqli_query($con,"select * from searching where ename like '$input'  or cname like '$input'");
	}
    else{
	$result=mysqli_query($con,"select * from event inner join event_categories where category_id=cid AND status='1'");
}
$count1=mysqli_num_rows($result);
	if($count1>0)
	{
		while($rec=mysqli_fetch_array($result))
		 	{
	?>
            <tr>
                <td><img src="../images/<?=$rec['image']?>" height="200" width="200"></td>
                <td>
                    <?= $rec['ename'] ?><br>
                    <?=$rec['cname']?>
                </td>
                <td><a href="details.php?id=<?=$rec['eid']?>">Details</a></td>
            </tr>
            <?php	}
    }
	?>
        </table>
    </div>
</body>

</html>