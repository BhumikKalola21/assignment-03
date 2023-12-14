<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tutorial03";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create stored procedure to delete records from category_products and product_attributes
$sqlCreateProcedure = "
DELIMITER //
CREATE PROCEDURE DeleteProductWithRelatedData(IN productId INT)
BEGIN
    DELETE FROM category_products WHERE product_id = productId;
    DELETE FROM product_attributes WHERE product_id = productId;
    DELETE FROM products WHERE id = productId;
END //
DELIMITER ;
";

if ($conn->multi_query($sqlCreateProcedure) === TRUE) {
    echo "Stored procedure created successfully\n";
} else {
    echo "Error creating stored procedure: " . $conn->error;
}

// Now, let's say you want to delete a product with ID 4 using the stored procedure
$productToDeleteId = 4;  // Set the desired product ID
$sqlCallProcedure = "CALL DeleteProductWithRelatedData($productToDeleteId)";

if ($conn->query($sqlCallProcedure) === TRUE) {
    echo "Product with ID $productToDeleteId deleted successfully\n";
} else {
    echo "Error calling stored procedure: " . $conn->error;
}

$conn->close();
?>
