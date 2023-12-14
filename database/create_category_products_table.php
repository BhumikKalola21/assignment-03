<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tutorial03";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create category_products table
$sql = "CREATE TABLE IF NOT EXISTS category_products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    product_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'category_products' created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
