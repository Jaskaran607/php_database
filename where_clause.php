<?php
// Step 1: Database credentials
$servername = "localhost"; // Or "127.0.0.1"
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

// Step 4: Define the UPDATE SQL query
// Example: Update destination to 'Kashmir' where name is 'Jass'
$sql = "UPDATE phptrip SET dest = 'Kashmir' WHERE name = 'Jass'";

// Step 5: Execute the UPDATE query
$result = mysqli_query($conn, $sql);

// Step 6: Check the result
if ($result) {
    echo "✅ Record updated successfully.";
} else {
    echo "❌ Error updating record: " . mysqli_error($conn);
}

// Step 7: Close the connection
mysqli_close($conn);
?>
