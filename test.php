<?php

echo 'hello from an external file!' . PHP_EOL;

define ('SIDES_OF_DICE', 6);

$roll = mt_rand(1, SIDES_OF_DICE);

echo "you rolled {$roll} /n";

$person1 = [
	'name' => 'Ryan',
	'age' => 34, 
	'languages' => ['css', 'js', 'html', 'php', 'mySQL']
];

$person2 = [
	'name' => 'Jose',
	'age' => 36,
	'languages' => ['css', 'js', 'html', 'php', 'mySQL']
];

$newArray = [$person1, $person2];

print_r($newArray);



