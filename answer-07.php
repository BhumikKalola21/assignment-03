<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tutorial03";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Alter categories table to add foreign key constraints
$sqlAlterCategories = "
ALTER TABLE categories
    ADD CONSTRAINT fk_category_products_category
    FOREIGN KEY (id) REFERENCES category_products(category_id)
    ON DELETE CASCADE,
    ADD CONSTRAINT fk_product_attributes_category
    FOREIGN KEY (id) REFERENCES product_attributes(category_id)
    ON DELETE CASCADE;
";

if ($conn->query($sqlAlterCategories) === TRUE) {
    echo "Foreign key constraints added to 'categories' table successfully\n";
} else {
    echo "Error adding foreign key constraints: " . $conn->error;
}

$conn->close();
?>
