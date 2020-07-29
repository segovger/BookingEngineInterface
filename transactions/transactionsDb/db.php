<?php 
//Payments/transacctions database
//Definir Params

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_NAME", "booking_transactions");

$server = 'localhost';
$username = 'root';
$password = 'root';
$database = 'booking_transactions';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}