<?php



function randomPicker($array, $array2) 
{
	$randomAdj = array_rand($array);
	$randomNoun = array_rand($array2);

	$msg = '';
	$msg .= $array[$randomAdj];
	$msg .= " ";
	$msg .= $array2[$randomNoun];

	return $msg;
}

function pageController()
{
	$adjectives = ['overwrought', 'overconfident', 'tasty', 'beautiful', 'wild', 'messy', 'vulgar', 'eager', 'plucky', 'momentous', 'imported', 'spooky', 'famous', 'crazy', 'photogenic'];

	$nouns = ['panda', 'underwear', 'guitar', 'jeans', 'waterjug', 'concert', 'fire', 'eggnog', 'puppy', 'elephant', 'territory', 'rhythm', 'wine', 'hook', 'banjo'];
	
	$data = array();

	$data['message'] = randomPicker($adjectives, $nouns);

	return $data;
}
extract(pageController());
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
			box-shadow: 10px 10px 5px darkgray;
			border-radius: 50px;
			background-color: hotpink;
		}
		body{
			background-color: papayawhip;
		}
	</style>
</head>
<body>
	<div class='container'>
		<h1>Here's your server name: <br> <?= $message ?></h1>
	</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>