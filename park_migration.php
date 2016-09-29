<?php

//set connex params for parks db
const DB_HOST = '127.0.0.1';
const DB_NAME = 'parks_db';
const DB_USER = 'parks_user';
const DB_PASS = 'parks';

//req db_connect
require_once 'db_connect.php';

//delete table name national_parks
$dbc->exec('DROP TABLE IF EXISTS national_parks;');

//create new table
//update to add description to table for prepared statement exercises
$newTable = 'CREATE TABLE national_parks (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
	name VARCHAR(240) NOT NULL, 
	location VARCHAR(240) NOT NULL, 
	date_established DATE NOT NULL, 
	area_in_acres DOUBLE NOT NULL, 
	park_description TEXT NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (name, location)
);';

//execute the new table
$dbc->exec($newTable);