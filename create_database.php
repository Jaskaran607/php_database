<?php
include 'db_config.php';

$sql = "CREATE DATABASE IF NOT EXISTS company";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully!";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();
?>
