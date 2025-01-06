<?php
$host = 'localhost:3306'; 
$user = 'root';
$password = ''; // Default password for XAMPP
$database = 'task_manager';

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
