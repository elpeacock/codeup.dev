<?php

function pageController()
{
	$data = [];

	$data['value'] = isset($_GET['value']) ? $_GET['value'] : 0;

	return $data;
	
}
extract(pageController());
?>

<!DOCTYPE html>
<html>
<head>
	<title>We're gonna count some stuff</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	
	<div class="container">
		
		<h1 class="counter">Counter: <?= $value ?></h1>
		<p><a href="counter.php?value=<?= ($value + 1) ?>">UP</a></p>
		<p><a href="counter.php?value=<?= ($value - 1) ?>">DOWN</a></p>
		
	</div>



	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>