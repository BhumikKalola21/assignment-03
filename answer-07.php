<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tutorial03";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add category_id column to category_products table if it does not exist
$sqlAddCategoryIdCategoryProducts = "
ALTER TABLE category_products
    ADD COLUMN IF NOT EXISTS category_id INT;
";

if ($conn->query($sqlAddCategoryIdCategoryProducts) === TRUE) {
    echo "Column 'category_id' added to 'category_products' table successfully\n";
} else {
    echo "Error adding column 'category_id' to 'category_products' table: " . $conn->error;
}

// Add category_id column to product_attributes table if it does not exist
$sqlAddCategoryIdProductAttributes = "
ALTER TABLE product_attributes
    ADD COLUMN IF NOT EXISTS category_id INT;
";

if ($conn->query($sqlAddCategoryIdProductAttributes) === TRUE) {
    echo "Column 'category_id' added to 'product_attributes' table successfully\n";
} else {
    echo "Error adding column 'category_id' to 'product_attributes' table: " . $conn->error;
}

// Drop existing foreign key constraint on category_products table
$sqlDropConstraintCategoryProducts = "
ALTER TABLE category_products
    DROP FOREIGN KEY IF EXISTS fk_category_products_category;
";

if ($conn->query($sqlDropConstraintCategoryProducts) === TRUE) {
    echo "Existing foreign key constraint on 'category_products' table dropped successfully\n";
} else {
    echo "Error dropping existing foreign key constraint on 'category_products' table: " . $conn->error;
}

// Alter category_products table to add foreign key constraint
$sqlAlterCategoryProducts = "
ALTER TABLE category_products
    ADD CONSTRAINT fk_category_products_category
    FOREIGN KEY (category_id) REFERENCES categories(id)
    ON DELETE CASCADE;
";

if ($conn->query($sqlAlterCategoryProducts) === TRUE) {
    echo "Foreign key constraint added to 'category_products' table successfully\n";
} else {
    echo "Error adding foreign key constraint to 'category_products' table: " . $conn->error;
}

// Drop existing foreign key constraint on product_attributes table
$sqlDropConstraintProductAttributes = "
ALTER TABLE product_attributes
    DROP FOREIGN KEY IF EXISTS fk_product_attributes_category;
";

if ($conn->query($sqlDropConstraintProductAttributes) === TRUE) {
    echo "Existing foreign key constraint on 'product_attributes' table dropped successfully\n";
} else {
    echo "Error dropping existing foreign key constraint on 'product_attributes' table: " . $conn->error;
}

// Alter product_attributes table to add foreign key constraint
$sqlAlterProductAttributes = "
ALTER TABLE product_attributes
    ADD CONSTRAINT fk_product_attributes_category
    FOREIGN KEY (category_id) REFERENCES categories(id)
    ON DELETE CASCADE;
";

if ($conn->query($sqlAlterProductAttributes) === TRUE) {
    echo "Foreign key constraint added to 'product_attributes' table successfully\n";
} else {
    echo "Error adding foreign key constraint to 'product_attributes' table: " . $conn->error;
}

$conn->close();
?>
