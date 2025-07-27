<?php
// Start secure session
session_start([
    'cookie_lifetime' => 86400, // 1 day
    'cookie_secure' => isset($_SERVER['HTTPS']), // Auto detect HTTPS
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

// Simple user database (replace with real database in production)
$users = [
    'admin' => [
        'password' => password_hash('admin123', PASSWORD_DEFAULT), // Hashed password
        'name' => 'Administrator',
        'email' => 'admin@example.com'
    ],
    'user' => [
        'password' => password_hash('user123', PASSWORD_DEFAULT),
        'name' => 'Regular User',
        'email' => 'user@example.com'
    ]
];

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (isset($users[$username]) && password_verify($password, $users[$username]['password'])) {
        // Regenerate session ID to prevent fixation
        session_regenerate_id(true);
        
        // Set session variables
        $_SESSION['user'] = [
            'username' => $username,
            'name' => $users[$username]['name'],
            'email' => $users[$username]['email'],
            'ip' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'last_activity' => time()
        ];
        
        // Redirect to prevent form resubmission
        header('Location: index.php');
        exit;
    } else {
        $error = "Invalid username or password";
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    // Clear all session data
    $_SESSION = [];
    
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

// Check for session hijacking
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['ip'] !== $_SERVER['REMOTE_ADDR'] || 
        $_SESSION['user']['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
        // Possible hijacking attempt - destroy session
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit;
    }
    
    // Update last activity time
    $_SESSION['user']['last_activity'] = time();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Session Demo</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: #2c3e50;
        }
        .error {
            color: #e74c3c;
            padding: 10px;
            background: #fadbd8;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .success {
            color: #27ae60;
            padding: 10px;
            background: #d5f5e3;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        form {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button, .btn {
            background: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        button:hover, .btn:hover {
            background: #2980b9;
        }
        .user-info {
            background: #ebf5fb;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .protected-content {
            background: #e8f8f5;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
        }
        footer {
            margin-top: 30px;
            text-align: center;
            color: #7f8c8d;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP Session Demonstration</h1>
        
        <?php if (isset($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['user'])): ?>
            <!-- User is logged in -->
            <div class="success">You are logged in!</div>
            
            <div class="user-info">
                <h2>User Information</h2>
                <p><strong>Username:</strong> <?php echo htmlspecialchars($_SESSION['user']['username']); ?></p>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($_SESSION['user']['name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['user']['email']); ?></p>
                <p><strong>Session ID:</strong> <?php echo session_id(); ?></p>
                <p><strong>Last Activity:</strong> <?php echo date('Y-m-d H:i:s', $_SESSION['user']['last_activity']); ?></p>
                
                <a href="index.php?logout=1" class="btn">Logout</a>
            </div>
            
            <div class="protected-content">
                <h2>Protected Content</h2>
                <p>This content is only visible to authenticated users.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula.</p>
                
                <h3>Your Session Data:</h3>
                <pre><?php print_r($_SESSION); ?></pre>
            </div>
            
        <?php else: ?>
            <!-- Login Form -->
            <h2>Login</h2>
            <p>Demo accounts:</p>
            <ul>
                <li>Username: <strong>admin</strong> | Password: <strong>admin123</strong></li>
                <li>Username: <strong>user</strong> | Password: <strong>user123</strong></li>
            </ul>
            
            <form method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <button type="submit" name="login">Login</button>
            </form>
            
            <div class="session-info">
                <h3>Session Status</h3>
                <p>Session ID: <?php echo session_id(); ?></p>
                <p>No active session.</p>
            </div>
        <?php endif; ?>
        
        <footer>
            <p>PHP Session Example &copy; <?php echo date('Y'); ?></p>
        </footer>
    </div>
</body>
</html>
