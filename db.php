<?php

$dsn = 'mysql:host=localhost;dbname=cruddata';
$username = 'root';
$password = '';
$options = [];


try{

	$connection = new PDO($dsn, $username, $password, $options);

} catch (PDOExecption $e){

	echo "Error in database connection";

}
