<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tutorial03";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create categories table
$sql = "CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250),
    status BOOLEAN
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'categories' created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
