<?php

$dsn = "mysql:host=localhost; dbname=todolist";
$username = "root";

try {
    $db = new PDO($dsn, $username);
} catch (PDOException $error) {
    $error_message = "An error has occurred with the database: ";
    $error_message .= $error->getMessage();

    $include("view/error.php");

    exit();
}

?>