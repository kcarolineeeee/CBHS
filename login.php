<?php
include "config.php";

if (isset($_POST['login'])) {
    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to get the user
    $query = "SELECT * FROM users WHERE username = :username";
    $checker = $conn->prepare($query);
    $checker->execute(['username' => $username]);

    if ($checker->rowCount() > 0) {
        $user = $checker->fetch(PDO::FETCH_ASSOC);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            echo "Login successful!";
            
            // Start session and store user info if needed
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // Redirect to a protected page (optional)
            // header("Location: dashboard.php");
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with that username.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="login.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
