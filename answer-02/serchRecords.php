<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tutorial03";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to display query results in a table
function displayResults($result, $title)
{
    echo "<h2>$title</h2>";
    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Attribute Name</th>
                    <th>Attribute Values</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['attribute_name']}</td>
                    <td>{$row['attribute_values']}</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }
    echo "<br>";
}

// SELECT using LIKE
$sqlLike = "SELECT products.id, products.name, product_attributes.attribute_name, product_attributes.attribute_values
            FROM products
            JOIN product_attributes ON products.id = product_attributes.product_id
            WHERE product_attributes.attribute_values LIKE '%Silver%'";
$resultLike = $conn->query($sqlLike);
displayResults($resultLike, 'Products with attribute containing "Silver"');

// SELECT using JOIN
$sqlJoin = "SELECT products.id, products.name, product_attributes.attribute_name, product_attributes.attribute_values
            FROM products
            JOIN product_attributes ON products.id = product_attributes.product_id
            WHERE products.status = 1";
$resultJoin = $conn->query($sqlJoin);
displayResults($resultJoin, 'All Active Products with Attributes');

// SELECT using LIMIT
$sqlLimit = "SELECT products.id, products.name, product_attributes.attribute_name, product_attributes.attribute_values
            FROM products
            JOIN product_attributes ON products.id = product_attributes.product_id
            LIMIT 5";
$resultLimit = $conn->query($sqlLimit);
displayResults($resultLimit, 'Top 5 Products with Attributes');

// SELECT using ORDER BY
$sqlOrderBy = "SELECT products.id, products.name, product_attributes.attribute_name, product_attributes.attribute_values
               FROM products
               JOIN product_attributes ON products.id = product_attributes.product_id
               ORDER BY products.name ASC";
$resultOrderBy = $conn->query($sqlOrderBy);
displayResults($resultOrderBy, 'Products with Attributes Ordered by Name');

// SELECT combining all conditions
$sqlAllInOne = "SELECT products.id, products.name, product_attributes.attribute_name, product_attributes.attribute_values
               FROM products
               JOIN product_attributes ON products.id = product_attributes.product_id
               WHERE products.status = 1
                 AND product_attributes.attribute_values LIKE '%Medium%'
               ORDER BY products.price DESC
               LIMIT 5";
$resultAllInOne = $conn->query($sqlAllInOne);
displayResults($resultAllInOne, 'All-in-One Query');

$conn->close();
?>
