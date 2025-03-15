<?php
session_start();
session_unset();  // Remove all session variables
session_destroy();  // Destroy the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out</title>
    <link rel="stylesheet" href="styles.css">  <!-- Linking styles.css -->
</head>
<body>
    <div class="logout-container">
        <h2>You have been logged out successfully.</h2>
        <p>Thank you for using our Quiz System.</p>
        <a href="login.php" class="btn">Go to Login</a>
    </div>
</body>
</html>
