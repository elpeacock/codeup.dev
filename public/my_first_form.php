<?php
  var_dump($_GET);
  var_dump($_POST);
?>
<!DOCTYPE=html>

<html>
<head>
	<title></title>
</head>
<body>
	<h1>User Login</h1>
	<form method="POST" action="/my_first_form.php">
	    <label for="username">click me to focus the username field</label>
	    <p>
	        <label for="username">Username</label>
	        <input id="username" name="username" type="text" placeholder="enter your username here!">
	    </p>
	    <!-- "for" attribute always has to point to an "id" attribute!! -->
	    <!-- value - whatever you have in value will be returned in the qstring
	    placeholder - just fills space until user enters text -->
	    <p>
	        <label for="password">Password</label>
	        <input id="password" name="username" type="password" placeholder="enter your password here!">
	    </p>
	    <p>
	        <button>Log In</button>
	        <!-- this is the submit button, you can also use the <button>log in</button> tag to create a button -->
	        <!-- using a "name" attribute in an input type="submit" will always return the value of the name -->
	    </p>
	</form>
	<!-- you MUST have a name attribute on inputs!!! -->
	<h1>Send an Email</h1>
	<form>
		<label for="emailto">To:</label>
		<input type="text" name="emailto" placeholder="send to email address:"><br>
		<label for="emailfrom">From:</label>
		<input type="text" name="emailfrom" placeholder="enter your email address"><br>
		<textarea id="emailbody" name="emailbody" rows="30" cols="100" placeholder="enter your message"></textarea>
		<label><input type="checkbox" name="savecopy" id="savecopy" value="yes" checked>Save a Copy to Sent folder</label><br>
		<button type="submit">Send my email</button>
	</form>
	<h1>Search duckduckgo</h1>
	<form method="GET" action="http://duckduckgo.com" target="_blank">
		<input type="text" name="q" placeholder="search in duckduckgo">
		<input type="submit">
	</form>
	<h1>Search Reddit, results sorted by 'top'</h1>
	<form method="GET" action="http://www.reddit.com/search" target="_blank">
		<input type="text" name="q" placeholder="search reddit">
		<input name="sort" value="top" type="hidden">
		<button type="submit">Search Reddit</button>

	</form>
	<a href="https://www.reddit.com/search?q=javascript&sort=top" target="_blank">Reddit Javascript results sorted by top</a>
	<h1>Multiple Choice Test</h1>
	<form>
		<p>What is the Capital of Wyoming</p>
			<label><input type="radio" name="wyocap" value="Laramie">Laramie</label>
			<label><input type="radio" name="wyocap" value="Cody">Cody</label>
			<label><input type="radio" name="wyocap" value="Sheridan">Sheridan</label>
			<label><input type="radio" name="wyocap" value="Cheyenne">Cheyenne</label>
		<p>What is the Capital of Michigan</p>
			<label><input type="radio" name="micap" value="Grand Rapids">Grand Rapids</label>
			<label><input type="radio" name="micap" value="Grand Haven">Grand Haven</label>
			<label><input type="radio" name="micap" value="Lansing">Lansing</label>
			<label><input type="radio" name="micap" value="Detroit">Detroit</label>
		<p>Which of these bones are in the arm?</p>
			<label>
				<input type="checkbox" id="bone1" name="bone[]" value="humerus"> Humerus
			</label>
			<label>
				<input type="checkbox" id="bone2" name="bone[]" value="vertebra"> Vertebra
			</label>
			<label>
				<input type="checkbox" id="bone3" name="bone[]" value="Fibula"> Fibula
			</label>
			<label>
				<input type="checkbox" id="bone4" name="bone[]" value="radius"> Radius
			</label>
			<label>
				<input type="checkbox" id="bone5" name="bone[]" value="patella"> Patella
			</label>
			<label>
				<input type="checkbox" id="bone6" name="bone[]" value="ulna"> Ulna
			</label>
			<label>
				<input type="checkbox" id="bone7" name="bone[]" value="femur"> Femur
			</label><br>
		<button type="submit">Submit Test</button>
	</form>
	<h1>Select Testing</h1>
	<form>
		<label for="bacon">Do you like bacon?</label>
			<Select id="bacon" name="bacon">
				<option value="1">Yes</option>
				<option value="0">No</option>
			</Select>
		<button type="submit">Submit</button><br>
		<label for="leg">Which of these bones are in the leg?</label>
			<select id="leg" name="leg[]" size="7" multiple>
				<option value="humerus">Humerus</option>
				<option value="vertebra">Vertebra</option>
				<option value="fibula">Fibula</option>
				<option value="radius">Radius</option>
				<option value="patella">Patella</option>
				<option value="ulna">Ulna</option>
				<option value="femur">Femur</option>
			</select>
		<button type="submit">Submit</button>
	</form>
</body>
</html>
