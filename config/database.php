<?php

$host = 'localhost';  // Database server
$dbname = 'school_portal';  // Database name
$username = 'root';  // Default username for XAMPP
$password = '';  // Default password for XAMPP (empty)

try {
    // Establish a database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
