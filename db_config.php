<?php
$servername = "localhost";
$username = "root";
$password = ""; // Set your MySQL password
$dbname = "company"; // We will create this database

$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
