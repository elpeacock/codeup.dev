<?php

//set connex params for parks db
const DB_HOST = '127.0.0.1';
const DB_NAME = 'parks_db';
const DB_USER = 'parks_user';
const DB_PASS = 'parks';

//req db_connect
require '../../exercises/db_connect.php';

//delete table name national_parks
$dbc->exec('DROP TABLE IF EXISTS national_parks');

//create new table
$newTable = 'CREATE TABLE national_parks (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
	name VARCHAR(240) NOT NULL, 
	location VARCHAR(240) NOT NULL, 
	date_established DATE NOT NULL, 
	area_in_acres DOUBLE NOT NULL, 
	PRIMARY KEY (id)
)';

//execute the new table
$dbc->exec($newTable);