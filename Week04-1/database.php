<?php
$dsn = "mysql:host=localhost; dbname=world";
$username = 'root';

try{
	$db = new PDO($dsn, $username);
} catch (PDOException, $error){
	$error_message = "An error has occurred with the Database";
	$error_message .= $error->getMessage();
	echo $error_message;
	exit();
}

?>
