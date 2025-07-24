<?php
// Step 1: Connect to the database
$servername = "localhost";
$username = "root";         // Default XAMPP username
$password = "";             // Default XAMPP password (blank)
$database = "contactus";    // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// Step 2: Write SQL query to select data
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Step 3: Display the results
if ($result->num_rows > 0) {
    echo "<h3>Users List:</h3>";
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " | ";
        echo "Name: " . $row["name"] . " | ";
        echo "Email: " . $row["email"] . " | ";
        echo "Message: " . $row["message"] . " | ";
        echo "Date: " . $row["dt"] . "<br>";
    }
} else {
    echo "No records found.";
}

// Step 4: Close connection
$conn->close();
?>
