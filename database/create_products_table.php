<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tutorial03";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create products table
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE,
    price FLOAT(2),
    image BLOB,
    stock INT,
    status BOOLEAN
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'products' created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
