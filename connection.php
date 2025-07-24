<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'skydash';

// Create connection to MySQL server (no database yet)
$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database if it does not exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if (!mysqli_query($conn, $sql)) {
    die("Error creating database: " . mysqli_error($conn));
}

// Connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create table if it does not exist
$table_created = "CREATE TABLE IF NOT EXISTS management (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    email VARCHAR(100),
    country VARCHAR(100),
    password VARCHAR(100),
    profile VARCHAR(255)
)";
if (!mysqli_query($conn, $table_created)) {
    die("Error creating table: " . mysqli_error($conn));
}

echo "Connection successful and table checked/created.";
?>