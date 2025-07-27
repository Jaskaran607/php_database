<?php
// Start session with secure settings
session_start([
    'cookie_lifetime' => 86400, // 1 day
    'cookie_secure'   => true,  // Requires HTTPS
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

// Database connection (example with MySQLi)
$db = new mysqli('localhost', 'username', 'password', 'database');

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $db->real_escape_string($_POST['username']);
    $password = $_POST['password']; // Don't escape passwords
    
    // Look up user in database (use prepared statements in production)
    $result = $db->query("SELECT id, password FROM users WHERE username = '$username' LIMIT 1");
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verify password (use password_verify() with hashed passwords)
        if ($password === $user['password']) { // In production: password_verify($password, $user['password'])
            // Regenerate session ID to prevent fixation
            session_regenerate_id(true);
            
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $username;
            $_SESSION['logged_in'] = true;
            $_SESSION['ip_address'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
            $_SESSION['last_activity'] = time();
            
            header('Location: dashboard.php');
            exit;
        }
    }
    
    $error = "Invalid username or password";
}

// Handle logout
if (isset($_GET['logout'])) {
    // Clear session data
    $_SESSION = array();
    
    // Delete session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    session_destroy();
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Session Example</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .container { background: #f5f5f5; padding: 20px; border-radius: 5px; }
        .error { color: red; }
        .success { color: green; }
        form { margin-top: 20px; }
        input, button { padding: 8px; margin: 5px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP Session Example</h1>
        
        <?php if (isset($_SESSION['logged_in'])): ?>
            <!-- Display when logged in -->
            <p class="success">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
            <p>Your session ID: <?php echo session_id(); ?></p>
            <p>Last activity: <?php echo date('Y-m-d H:i:s', $_SESSION['last_activity']); ?></p>
            <a href="?logout=1" class="button">Logout</a>
            
            <!-- Protected content -->
            <h2>Dashboard</h2>
            <p>This content is only visible to logged-in users.</p>
            
        <?php else: ?>
            <!-- Display login form when not logged in -->
            <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
            
            <form method="POST">
                <h2>Login</h2>
                <div>
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" required>
                </div>
                <div>
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" name="login">Login</button>
            </form>
            
            <p>Demo credentials: username: "admin", password: "password123"</p>
        <?php endif; ?>
    </div>
</body>
</html>
