<?php 
$sever = 'localhost';
$username = 'root';
$password = '';
$database = 'bd';

try {
	$conn = new PDO("mysql:host=$sever;dbname=$database;", $username, $password);
} catch (PDOExecption $e) {
	die('connection failed: '. $e->getMessage());
}
 ?>