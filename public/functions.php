<?php

//checks to see if $_REQUEST has a key/value pair
function inputHas($key) 
{
	if (isset($_REQUEST[$key])) {
		//return true if key is set
		return true;
	} else {
		//return false if key is not set
		return false;
	}
}

//returns value of key if set
function inputGet($key) 
{
	if (inputHas($key)) {
		//return the value of specified key
		return $_REQUEST[$key];
	} else {
		//if key is not set, return null
		return null;
	}
}

//returns properly escaped string
function escape($input)
{
	return htmlspecialchars(strip_tags($input));
}



