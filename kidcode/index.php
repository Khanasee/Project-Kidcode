<?php
require('condb.php');
   session_start();
   $errors = array();
   include('errors.php'); 
   ?>
   
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale:1.0">
	<title>Login</title>
	<link rel="stylesheet" href="style3.css">
	<link rel="shortcut icon" type="image/jpg" href="img/3.jpg"/>
</head>
<body>
	<div class="main">
		<div class="card">
            <img src="img/3.jpg" alt="" class="er">
			<div class="card-body">
				<div class="card-body-top">
					<button id="member" class="btn" name="register" onclick="member()">Member</button>
					<button id="Employees" class="btn" name="loginemp" onclick="Employees()">Employees</button>
					<div id="pointer-btn"></div>
				</div>
				<div class="card-body-login">
					<form id="emp-form" action="loginemp.php" method="POST">
						<input class="input-form" type="id" placeholder="Enter your id"  required name="idemp"  value="<?php if (isset($_COOKIE['user_login'])) { echo $_COOKIE['user_login']; } ?>"><br><br><br><br><br>
						<input class="input-form" type="password" placeholder="Enter your password"  required name="passemp" value="<?php if (isset($_COOKIE['user_password'])) { echo $_COOKIE['user_password']; } ?>"><br><br><br><br><br>
                        <div class="forget" align="left">
						<input type="checkbox" name="remember" <?php if (isset($_COOKIE['user_login'])) { ?> checked <?php } ?> class="form-check-input" id="remember">
                        <label for="checkboxSuccess2">อยู่ในระบบ</label><br><br>
						</div>
						<input class="submit-form" type="submit" value="Log in" name="login_emp">
					</form>
					<form id="mem-form" action="loginmem.php" method="POST">
						<input class="input-form" type="id" placeholder="Enter your id" required name="username" value="<?php if (isset($_COOKIE['user_login'])) { echo $_COOKIE['user_login']; } ?>" ><br><br><br><br><br>
						<input class="input-form" type="password" placeholder="Enter your password" value="<?php if (isset($_COOKIE['user_password'])) { echo $_COOKIE['user_password']; } ?>" name="password" required name="password"><br><br><br><br><br>
						<div class="forget" align="left">
						<input type="checkbox" name="remember" <?php if (isset($_COOKIE['user_login'])) { ?> checked <?php } ?> class="form-check-input" id="remember">
                        <label for="checkboxSuccess2">อยู่ในระบบ</label><br><br>
						</div>
						<input class="submit-form" type="submit" value="Log in" name="login_mem">
					</form>
				</div>
				
			</div>

		</div>
	</div>

	<script>
		var x = document.getElementById("emp-form");
		var y = document.getElementById("mem-form");
		var z = document.getElementById("pointer-btn");
		var l = document.getElementById("Employees");
		var r = document.getElementById("member");
		var ac = document.getElementById("action_title");

		function Employees(){
			x.style.left = "-450px";
			y.style.left = "25px";
			z.style.left = "215px";
			l.style.color = "#848484";
			r.style.color = "#00ffc3";
			ac.textContent = "Register";
		}

		function member(){
			x.style.left = "25px";
			y.style.left = "450px";
			z.style.left = "30px";
			l.style.color = "#00ffc3";
			r.style.color = "#848484";
			ac.textContent = "Login";
		}		
	</script>
</body>
</html>