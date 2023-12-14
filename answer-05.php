<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tutorial03";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the 2nd highest price of the product
$sqlSecondHighestPrice = "SELECT MAX(price) as second_highest_price
                          FROM products
                          WHERE price < (SELECT MAX(price) FROM products)";
$resultSecondHighestPrice = $conn->query($sqlSecondHighestPrice);

// Display result
if ($resultSecondHighestPrice->num_rows > 0) {
    $row = $resultSecondHighestPrice->fetch_assoc();
    echo "<h2>Second Highest Price of Product</h2>";
    echo "<p>{$row['second_highest_price']}</p>";
} else {
    echo "No products found or there is no second highest price.";
}

$conn->close();
?>
