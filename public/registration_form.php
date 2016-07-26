<?php
	var_dump($_GET);
	var_dump($_POST);
?>
<!-- - build a registration form, name it registration_form.php
    - first name and last name inputs
    - email input
    - username
    - password
    - password confirmation
    - sign me up for the newsletter option, make sure this is checked by default -->

<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
	<h1>Registration Form</h1>
	<form method="POST" action="/registration_form.php">
		<p>
		<label>Name
			<input type="text" name="firstname" id="firstname" placeholder="Enter your first name">

			<input type="text" name="lastname" id="lastname" placeholder="Enter your last name">
		</label>
		</p>

		<p>
		<label>Email Address
			<input type="text" name="email" id="email" placeholder="Enter email address">
		</label>
		</p>

		<p>
		<label>Username
			<input type="text" name="username" id="username" placeholder="Enter a username">
		</label>
		</p>

		<p>
		<label>Password
			<input type="password" name="password" id="password" placeholder="Enter a password">
		</label>
		</p>

		<p>
		<label>Re-Enter Password
			<input type="password" name="passwordconfirm" id="passwordconfirm" placeholder="Confirm your password">
		</label>
		</p>

		<p>
		<label>
			<input type="checkbox" name="maillist" id="maillist" value="yes" checked>
		</label>Join the mailing list
		</p>

		<button type="submit">Register</button>
	</form>
</body>
</html>