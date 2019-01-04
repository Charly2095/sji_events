<?php
session_start();
if(isset($_POST['search']))
{
    session_start();
    $_SESSION['input']=$_POST['input'];
    header("Location:../event/list.php");
}
?>

<html>
<head>

<!-- <link href="/SJ-master/public/headercss.css" rel="stylesheet" type="text/css"> -->
  <style>
    * {
  box-sizing: border-box;
}

body {
  margin: 0px;
  font-family: "segoe ui";
}

.nav {
  height: 50px;
  width: 100%;
  background-color: #4d4d4d;
  position: relative;
}

.nav  .nav-header {
  display: inline;
}

.nav > .nav-header > .nav-title {
  display: inline-block;
  font-size: 22px;
  color: #fff;
  padding: 10px 10px 10px 10px;
  margin: 0;
}

.nav > .nav-btn {
  display: none;
}

.nav > .nav-links {
  display: inline;
  float: right;
  font-size: 18px;
}

.nav > .nav-links > a {
  display: inline-block;
  padding: 13px 10px 13px 10px;
  text-decoration: none;
  color: #efefef;
}

.nav > .nav-links > a:hover {
  background-color: rgba(0, 0, 0, 0.3);
}

.nav > #nav-check {
  display: none;
}

@media (max-width: 600px) {
  .nav > .nav-btn {
    display: inline-block;
    position: absolute;
    right: 0px;
    top: 0px;
  }
  .nav > .nav-btn > label {
    display: inline-block;
    width: 50px;
    height: 50px;
    padding: 13px;
  }
  .nav > .nav-btn > label:hover {
    background-color: rgba(0, 0, 0, 0.3);
  }
  .nav > .nav-btn > label > span {
    display: block;
    width: 25px;
    height: 10px;
    border-top: 2px solid #eee;
  }
  .nav > .nav-links {
    position: absolute;
    display: block;
    width: 100%;
    background-color: #333;
    height: 0px;
    transition: all 0.3s ease-in;
    overflow-y: hidden;
    top: 50px;
    left: 0px;
  }
  .nav > .nav-links > a {
    display: block;
    width: 100%;
  }
  .nav > #nav-check:not(:checked) + .nav-links {
    height: 0px;
  }
  .nav > #nav-check:checked + .nav-links {
    height: calc(100vh - 50px);
    overflow-y: auto;
  }
}
  </style>
</head>
<body>
  <?php
  if(isset($_SESSION["adminuser"]))
  {
  ?>
    <div class="nav">
        <div class="nav-header">
            <h5 class="nav-title"><a href="/sji_events/event/list.php"> HOME</a></h5>
        </div>
        <div class="nav-links">
          <a href="/sji_events/admin/logout.php">Admin Logout</a> </div>
        <div class="nav-links">
          <a href="/sji_events/event/add.php">Events</a> </div>
        <div class="nav-links">
          <a href="/sji_events/category/category.php">Category</a> </div>
    </div>
    <?php
  }
  else{ 
  ?>
    <div class="nav">
        <div class="nav-header">
        <h5 class="nav-title"><a href="/sji_events/event/list.php"> HOME</a></h5>
        </div>
        <div class="nav-links">
            <a href="/sji_events/admin/login.php">Admin Login</a>
        </div>
    </div>
    <?php 
  }
    ?>
</body>
</html>