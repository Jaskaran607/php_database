<?php
include 'db_config.php';

$conn->select_db("company");

$sql = "INSERT INTO employees (name, email, position) VALUES
    ('Alice Johnson', 'alice@example.com', 'Manager'),
    ('Bob Smith', 'bob@example.com', 'Developer'),
    ('Charlie Lee', 'charlie@example.com', 'Designer')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
