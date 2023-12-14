<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tutorial03";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into categories table
$sqlCategories = "INSERT INTO categories (name, status) VALUES
    ('Electronics', 1),
    ('Clothing', 1),
    ('Home and Garden', 1),
    ('Books', 1),
    ('Sports', 1),
    ('Toys', 1),
    ('Beauty', 1),
    ('Automotive', 1),
    ('Movies', 1),
    ('Health', 1),
    ('Music', 1),
    ('Grocery', 1),
    ('Tools', 1),
    ('Jewelry', 1),
    ('Furniture', 1)";

if ($conn->query($sqlCategories) === TRUE) {
    echo "Data inserted into 'categories' table successfully\n";
} else {
    echo "Error inserting data into 'categories' table: " . $conn->error;
}

// Insert data into products table
$sqlProducts = "INSERT INTO products (name, price, image, stock, status) VALUES
    ('Smartphone', 499.99, 'phone.jpg', 50, 1),
    ('Laptop', 1299.99, 'laptop.jpg', 30, 1),
    ('T-shirt', 19.99, 'tshirt.jpg', 100, 1),
    ('Dress Shirt', 39.99, 'dressshirt.jpg', 70, 1),
    ('Coffee Maker', 79.99, 'coffeemaker.jpg', 20, 1),
    ('Headphones', 89.99, 'headphones.jpg', 40, 1),
    ('Soccer Ball', 14.99, 'soccerball.jpg', 60, 1),
    ('Lipstick', 9.99, 'lipstick.jpg', 80, 1),
    ('Car Oil', 24.99, 'caroil.jpg', 25, 1),
    ('Movie DVD', 12.99, 'moviedvd.jpg', 120, 1),
    ('Puzzle', 15.99, 'puzzle.jpg', 35, 1),
    ('Toothpaste', 4.99, 'toothpaste.jpg', 90, 1),
    ('Drill', 49.99, 'drill.jpg', 15, 1),
    ('Necklace', 79.99, 'necklace.jpg', 50, 1),
    ('Couch', 499.99, 'couch.jpg', 10, 1)";

if ($conn->query($sqlProducts) === TRUE) {
    echo "Data inserted into 'products' table successfully\n";
} else {
    echo "Error inserting data into 'products' table: " . $conn->error;
}

// Insert data into category_products table
$sqlCategoryProducts = "INSERT INTO category_products (category_id, product_id) VALUES
    (1, 1),
    (1, 2),
    (2, 3),
    (2, 4),
    (3, 5),
    (3, 6),
    (4, 7),
    (5, 8),
    (6, 9),
    (7, 10),
    (8, 11),
    (9, 12),
    (10, 13),
    (11, 14),
    (12, 15)";

if ($conn->query($sqlCategoryProducts) === TRUE) {
    echo "Data inserted into 'category_products' table successfully\n";
} else {
    echo "Error inserting data into 'category_products' table: " . $conn->error;
}

// Insert data into product_attributes table
$sqlProductAttributes = "INSERT INTO product_attributes (product_id, attribute_name, attribute_values) VALUES
    (1, 'Color', '[\"Black\", \"Silver\", \"White\"]'),
    (2, 'Color', '[\"Silver\", \"Space Gray\"]'),
    (3, 'Size', '[\"Small\", \"Medium\", \"Large\"]'),
    (4, 'Size', '[\"Small\", \"Medium\", \"Large\", \"X-Large\"]'),
    (5, 'Power', '[\"120V\", \"220V\"]'),
    (6, 'Color', '[\"Black\", \"White\"]'),
    (7, 'Color', '[\"White\", \"Blue\", \"Red\"]'),
    (8, 'Color', '[\"Red\", \"Pink\", \"Brown\"]'),
    (9, 'Viscosity', '[\"5W-30\", \"10W-40\"]'),
    (10, 'Genre', '[\"Action\", \"Comedy\", \"Drama\"]'),
    (11, 'Pieces', '500'),
    (12, 'Flavor', '[\"Mint\", \"Cinnamon\", \"Strawberry\"]'),
    (13, 'Power', '[\"Corded\", \"Cordless\"]'),
    (14, 'Material', '[\"Gold\", \"Silver\", \"Diamond\"]'),
    (15, 'Color', '[\"Beige\", \"Brown\", \"Gray\"]')";


if ($conn->query($sqlProductAttributes) === TRUE) {
    echo "Data inserted into 'product_attributes' table successfully\n";
} else {
    echo "Error inserting data into 'product_attributes' table: " . $conn->error;
}

$conn->close();
?>
