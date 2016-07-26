<?php
	var_dump($_GET);
	var_dump($_POST);
?>
<!-- - build a login form, call it login_form.php
    - username or email input with placeholder
    - password input type
    - remember me check box -->

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body>
	<h1>Login Form</h1>
	<form method="POST" action="/login_form.php">
		<p>
		<label>Username
			<input id="username" name="username" type="text" placeholder="Username goes here">
		</label>
		</p>
		
		<p>
		<label>Password
			<input id="password" name="password" type="password" placeholder="Enter your password">
		</label>
		</p>
		
		<p>
		<label>
			<input type="checkbox" name="rememberme" id="rememberme" value="yes" checked>Remember Me
		</label>
		</p>
		
		<button type="submit">Log In!</button>
	</form>
</body>
</html>