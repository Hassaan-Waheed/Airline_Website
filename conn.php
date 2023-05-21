<?php
// Database connection details
$host = 'localhost';
$dbname = 'xyz_airline';
$username = 'root';
$password = '';

// Create a new PDO instance
try 
{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection Successfull!";
}
 catch (PDOException $e) 
{
    echo "Error connecting to database: " . $e->getMessage();
    die();
}
?>