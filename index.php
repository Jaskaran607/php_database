<?php
include 'db_config.php';

$conn->select_db("company");

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

echo "<h2>Employee List</h2>";
echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Position</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['position']}</td></tr>";
}
echo "</table>";

$conn->close();
?>
