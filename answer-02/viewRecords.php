<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tutorial03";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the ProductView
$sqlCreateView = "CREATE VIEW ProductView AS
                 SELECT products.id, products.name, products.price, product_attributes.attribute_name, product_attributes.attribute_values
                 FROM products
                 JOIN product_attributes ON products.id = product_attributes.product_id";
if ($conn->query($sqlCreateView) === TRUE) {
    echo "ProductView created successfully\n";
} else {
    echo "Error creating ProductView: " . $conn->error;
}

// Select data from the view
$sqlSelectView = "SELECT * FROM ProductView";
$resultView = $conn->query($sqlSelectView);

// Display results from the view
if ($resultView->num_rows > 0) {
    echo "<h2>Records from ProductView</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Attribute Name</th>
                <th>Attribute Values</th>
            </tr>";

    while ($row = $resultView->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['price']}</td>
                <td>{$row['attribute_name']}</td>
                <td>{$row['attribute_values']}</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No records found in ProductView.";
}

$conn->close();
?>
