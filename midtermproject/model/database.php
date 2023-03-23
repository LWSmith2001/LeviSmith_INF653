<?php 
$dsn = "mysql:host=r4wkv4apxn9btls2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=mysql:__w87kq1f1n6zgdks8:iyhtwyg9vwzr8cs7@r4wkv4apxn9btls2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306_wqyssctlqst17el3;";
$username = 'root';

try {
    $db = new PDO($dsn,$username);
} catch (PDOException $e) {
    $error_message = "Database Error: ";
    $error_message .= $e->getMessage();
    include('view/error.php');
    exit();
}
?>
