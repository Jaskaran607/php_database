<?php
// 🔸 Step 1: Create a file and write content
$filename = "sample.txt";
$content = "Hello World!\nWelcome to PHP file handling.\nEnjoy learning PHP!";
file_put_contents($filename, $content);

// 🔸 Step 2: Open the file in read mode
$file = fopen($filename, "r");

if ($file) {
    echo "<h2>Reading file using <code>fgetc()</code> (character by character):</h2><pre>";

    // Read character by character
    rewind($file); // optional, ensures pointer is at start
    while (($char = fgetc($file)) !== false) {
        echo $char;
    }
    echo "</pre>";

    // Rewind again for line reading
    rewind($file);

    echo "<h2>Reading file using <code>fgets()</code> (line by line):</h2><pre>";

    // Read line by line
    while (($line = fgets($file)) !== false) {
        echo htmlspecialchars($line); // prevents HTML breaking
    }

    echo "</pre>";
    fclose($file);
} else {
    echo "<p>❌ Failed to open the file.</p>";
}
?>
