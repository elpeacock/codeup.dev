<?php

$adjectives = ['hot', 'cold', 'tasty', 'beautiful', 'wild', 'messy', 'clean', 'funny', 'sad', 'smiley', 'dirty', 'spooky', 'popular', 'crazy', 'photogenic'];

$nouns = ['panda', 'letter', 'guitar', 'jeans', 'waterjug', 'concert', 'fire', 'song', 'puppy', 'elephant', 'tree', 'key', 'pen', 'phone', 'banjo'];


function randomPicker($array, $array2) {
	$randomAdj = array_rand($array);
	$randomNoun = array_rand($array2);

	$msg = '';
	$msg .= $array[$randomAdj];
	$msg .= " ";
	$msg .= $array2[$randomNoun];

	return $msg;
}
$serverName = randomPicker($adjectives, $nouns);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Name Yo Server</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style type="text/css">
		h1{
			text-align: center;
			color: midnightblue;
			margin-top: 100px;
			padding: 25px;
			box-shadow: 10px 10px 5px lightgray;
			border-radius: 50px;
		}
		body{
			background-color: papayawhip;
		}
	</style>
</head>
<body>
	<div class='container'>
		<h1>Here's your server name: <br> <?= $serverName ?></h1>
	</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>