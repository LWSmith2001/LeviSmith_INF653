<?php 
$dsn = "mysql:host=r4wkv4apxn9btls2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=wqyssctlqst17el3;";
$username = 'w87kq1f1n6zgdks8';
$password = 'iyhtwyg9vwzr8cs7';

try {
    $db = new PDO($dsn,$username,$password);
} catch (PDOException $e) {
    $error_message = "Database Error: ";
    $error_message .= $e->getMessage();
    include('view/error.php');
    exit();
}
?>
