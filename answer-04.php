<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tutorial03";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all categories whose product stock is greater than zero
$sqlCategoriesWithStock = "SELECT DISTINCT categories.id, categories.name
                            FROM categories
                            JOIN category_products ON categories.id = category_products.category_id
                            JOIN products ON category_products.product_id = products.id
                            WHERE products.stock > 0";
$resultCategoriesWithStock = $conn->query($sqlCategoriesWithStock);

// Display results
if ($resultCategoriesWithStock->num_rows > 0) {
    echo "<h2>Categories with Product Stock > 0</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>";

    while ($row = $resultCategoriesWithStock->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No categories found with product stock > 0.";
}

$conn->close();
?>
