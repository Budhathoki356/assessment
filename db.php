<?php

$host = 'localhost';      // Database host
$dbname = 'assessment'; // Database name
$username = 'root';       // Database username
$password = '';           // Database password (empty by default for XAMPP or similar setups)

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>