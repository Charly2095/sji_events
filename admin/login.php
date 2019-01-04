<?php
include_once("../public/header.php");
?>
<html>

<head>
	<script type="text/javascript">
		function validate() {
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;
			if (username != "Admin")
				alert("Invalid Username");
			else if (password != "Admin")
				alert("Invalid Password");
		}
	</script>
	<link href="admin.css" rel="stylesheet" type="text/css">

	<?php
	$username="Admin";
	$password="Admin";
	?>
</head>

<body>

	<div class="form">
		<form method="POST" class="register-form" name="Login">
			<input type="text" name="username" id="username" placeholder="Username" maxlength="20" required />&nbsp &nbsp
			<input type="password" name="password" id="password" maxlength="20" placeholder="Password" required />&nbsp &nbsp
			&nbsp<input type="Submit" name="Login" class="btn" value="Log In" onclick="validate()" />
		</form>
	</div>
	<?php
	if(isset($_POST['Login']))
	{
		$user=$_POST['username'];
		$pass=$_POST['password'];	
		if($user==$username)
		{
			if($pass==$password)
			{
				session_start();
				$_SESSION['adminuser']=$user;
				header("Location:../event/list.php");
			}
		}
	}
	?>
</body>
</html>