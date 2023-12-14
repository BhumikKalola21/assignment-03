<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tutorial03";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create stored procedure
$sqlCreateProcedure = "
    CREATE PROCEDURE GetActiveProducts()
    BEGIN
        SELECT * FROM products WHERE status = 1;
    END;
";

// Execute the creation of the stored procedure
if ($conn->multi_query($sqlCreateProcedure)) {
    do {
        // Consume all results
    } while ($conn->next_result());
} else {
    echo "Error creating stored procedure: " . $conn->error;
}

// Call the stored procedure
$sqlCallProcedure = "CALL GetActiveProducts()";
$result = $conn->query($sqlCallProcedure);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Active Product List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
if ($result->num_rows > 0) {
    echo "<h2>Active Products Data using Stored Procedure</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Price</th><th>Stock</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['price']}</td><td>{$row['stock']}</td></tr>";
    }

    echo "</table>";
} else {
    echo "No active products found.";
}

$conn->close();
?>
</body>
</html>
