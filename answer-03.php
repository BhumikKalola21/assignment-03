<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tutorial03";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all categories with their product counts
$sqlCategoriesWithCount = "SELECT categories.id, categories.name, COUNT(products.id) as product_count
                           FROM categories
                           LEFT JOIN category_products ON categories.id = category_products.category_id
                           LEFT JOIN products ON category_products.product_id = products.id
                           GROUP BY categories.id, categories.name";
$resultCategoriesWithCount = $conn->query($sqlCategoriesWithCount);

// Display results
if ($resultCategoriesWithCount->num_rows > 0) {
    echo "<h2>Categories with Product Counts</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Product Count</th>
            </tr>";

    while ($row = $resultCategoriesWithCount->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['product_count']}</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No categories found.";
}

$conn->close();
?>
