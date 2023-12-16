<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tutorial03";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Drop the trigger if it exists
$sqlDropTrigger = "DROP TRIGGER IF EXISTS before_delete_product";
if ($conn->query($sqlDropTrigger) === TRUE) {
    echo "Trigger dropped successfully\n";
} else {
    echo "Error dropping trigger: " . $conn->error;
}

// Create trigger to delete records from category_products and product_attributes
$sqlCreateTrigger = "
CREATE TRIGGER before_delete_product
BEFORE DELETE ON products
FOR EACH ROW
BEGIN
    DELETE FROM category_products WHERE product_id = OLD.id;
    DELETE FROM product_attributes WHERE product_id = OLD.id;
END;
";

if ($conn->multi_query($sqlCreateTrigger) === TRUE) {
    echo "Trigger created successfully\n";
} else {
    echo "Error creating trigger: " . $conn->error;
}

// Now, let's say you want to delete a product with ID 2
$productToDeleteId = 6;  // Set the desired product ID
$sqlDeleteProduct = "DELETE FROM products WHERE id = $productToDeleteId";

if ($conn->query($sqlDeleteProduct) === TRUE) {
    echo "Product with ID $productToDeleteId deleted successfully\n";
} else {
    echo "Error deleting product: " . $conn->error;
}

$conn->close();
?>
