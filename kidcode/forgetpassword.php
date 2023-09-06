
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
					<button id="member" class="btn">ลืมรหัสผ่าน</button>
					<div id="pointer-btn"></div>
				</div>
				<div class="card-body-login">
					<form id="emp-form" action="forgetpassword.php" method="POST">
						<input class="input-form" type="id" placeholder="Enter your email or id" name="idemp" required><br><br>
						<input class="input-form" type="password" placeholder="Enter your password" name="pass1" required><br><br>
                        <input class="input-form" type="password" placeholder="Enter your password" name="pass2" required><br><br>
                        <div class="forget" align="left">
						<a href="login.php">เข้าสู่ระบบ</a><br><br><br><br>
						</div>
						<input class="submit-form" type="submit" value="enter" name="login_emp">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>