<!DOCTYPE html>
<html>
<head>
    <title>PHP File Handling - fopen(), fread(), fclose()</title>
</head>
<body>
    <h1>PHP File Handling Demo (Single File)</h1>

    <form method="post">
        <label>Enter text to write in file:</label><br><br>
        <textarea name="content" rows="5" cols="60" required></textarea><br><br>

        <label>Select file mode:</label><br>
        <select name="mode" required>
            <option value="w">w - Write (truncate)</option>
            <option value="w+">w+ - Read/Write (truncate)</option>
            <option value="r">r - Read only</option>
            <option value="r+">r+ - Read/Write</option>
            <option value="a">a - Append</option>
            <option value="a+">a+ - Read/Append</option>
            <option value="x">x - Create/write (error if exists)</option>
            <option value="x+">x+ - Create/read-write (error if exists)</option>
        </select><br><br>

        <button type="submit" name="submit">Run File Operation</button>
    </form>

<?php
if (isset($_POST['submit'])) {
    $filename = "log.txt";
    $content = $_POST['content'];
    $mode = $_POST['mode'];

    echo "<hr><h3>Selected Mode: <code>$mode</code></h3>";

    try {
        $file = fopen($filename, $mode);

        if (!$file) {
            throw new Exception("❌ Failed to open the file.");
        }

        // Write content if mode allows
        if (str_contains($mode, 'w') || str_contains($mode, 'a') || str_contains($mode, 'x') || $mode === 'r+') {
            fwrite($file, $content . PHP_EOL);
            echo "<p>✅ Content written successfully.</p>";
        }

        // Move to start of file before reading
        rewind($file);

        echo "<h4>📖 Reading File Content:</h4><pre style='background:#f4f4f4;padding:10px;border:1px solid #ccc;'>";
        while (!feof($file)) {
            echo htmlspecialchars(fgets($file));
        }
        echo "</pre>";

        fclose($file);
        echo "<p>✅ File closed successfully.</p>";
    } catch (Exception $e) {
        echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>
</body>
</html>
