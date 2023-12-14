<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tutorial03";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all data
$sqlAllData = "SELECT * FROM products";
$resultAllData = $conn->query($sqlAllData);

// Display all data in an HTML table
if ($resultAllData->num_rows > 0) {
    echo "<h2>All Products Data</h2>";
    echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Price</th><th>Stock</th></tr>";

    while ($row = $resultAllData->fetch_assoc()) {
        echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['price']}</td><td>{$row['stock']}</td></tr>";
    }

    echo "</table>";
} else {
    echo "No products found.";
}

// LIKE query
$sqlLike = "SELECT * FROM products WHERE name LIKE '%Product%'";
$resultLike = $conn->query($sqlLike);

// Display results for LIKE query in an HTML table
if ($resultLike->num_rows > 0) {
    echo "<h2>Products with Name Containing 'Product'</h2>";
    echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Price</th><th>Stock</th></tr>";

    while ($row = $resultLike->fetch_assoc()) {
        echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['price']}</td><td>{$row['stock']}</td></tr>";
    }

    echo "</table>";
} else {
    echo "No products found with the specified criteria for LIKE query.";
}

// BETWEEN query
$sqlBetween = "SELECT * FROM products WHERE price BETWEEN 10 AND 50";
$resultBetween = $conn->query($sqlBetween);

// Display results for BETWEEN query in an HTML table
if ($resultBetween->num_rows > 0) {
    echo "<h2>Products with Price Between 10 and 50</h2>";
    echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Price</th><th>Stock</th></tr>";

    while ($row = $resultBetween->fetch_assoc()) {
        echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['price']}</td><td>{$row['stock']}</td></tr>";
    }

    echo "</table>";
} else {
    echo "No products found with the specified criteria for BETWEEN query.";
}

// LIMIT query
$sqlLimit = "SELECT * FROM products LIMIT 5";
$resultLimit = $conn->query($sqlLimit);

// Display results for LIMIT query in an HTML table
if ($resultLimit->num_rows > 0) {
    echo "<h2>First 5 Products</h2>";
    echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Price</th><th>Stock</th></tr>";

    while ($row = $resultLimit->fetch_assoc()) {
        echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['price']}</td><td>{$row['stock']}</td></tr>";
    }

    echo "</table>";
} else {
    echo "No products found with the specified criteria for LIMIT query.";
}

// ORDER BY query
$sqlOrderBy = "SELECT * FROM products ORDER BY name";
$resultOrderBy = $conn->query($sqlOrderBy);

// Display results for ORDER BY query in an HTML table
if ($resultOrderBy->num_rows > 0) {
    echo "<h2>Products Ordered by Name</h2>";
    echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Price</th><th>Stock</th></tr>";

    while ($row = $resultOrderBy->fetch_assoc()) {
        echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['price']}</td><td>{$row['stock']}</td></tr>";
    }

    echo "</table>";
} else {
    echo "No products found with the specified criteria for ORDER BY query.";
}

$conn->close();
?>
