<?php
// Step 1: Connect to the database
$servername = "localhost";  // Or "127.0.0.1"
$username = "root";
$password = "";
$database = "dbjass";

// Step 2: Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Step 3: Check the connection
if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}
echo "✅ Connected successfully.<br>";

// Step 4: Define DELETE SQL query with WHERE clause
$sql = "DELETE FROM phptrip WHERE name = 'Jass'";

// Step 5: Run the query
$result = mysqli_query($conn, $sql);

// Step 6: Check if it worked
if ($result) {
    echo "✅ Record deleted successfully.";
} else {
    echo "❌ Error deleting record: " . mysqli_error($conn);
}

// Step 7: Close connection
mysqli_close($conn);
?>
