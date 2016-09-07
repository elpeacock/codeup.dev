<?php
$faves = ['mah fraanssss *', 'coffee', 'stargazing', 'powder days **', 'live music', 'dirty martinis', 'tacos', 'cheesecake', 'college football', 'puppies', 'Wy-home-ing'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Favorites</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style type="text/css">
		body {
			background-color: lightsalmon;
		}
		h1{
			text-align: center;
			color: crimson;
		}
		.list-group {
			text-align: center;
		}
		.list-group :nth-child(odd){
			background-color: lightgray;
		}
	</style>
</head>
<body>
	<div class='container'>
		
	<h1>My Faves!</h1>
	<ul class="list-group">
		<?php foreach($faves as $key => $fave): ?>
			<li class="list-group-item"><?= $fave; ?></li>
		<?php endforeach; ?>
	</ul>
	<p>
		* there are no friends on powder days 
		<br>
		** FOR REAL! There are NO friends on powder days
	</p>

	</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>