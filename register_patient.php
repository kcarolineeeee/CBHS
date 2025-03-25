<?php
include "config.php";

if (isset($_POST['register'])) {
    // Get user input
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the username already exists
    $check_query = "SELECT * FROM users WHERE username = :username";
    $checker = $conn->prepare($check_query);
    $checker->execute(['username' => $username]);

    if ($checker->rowCount() > 0) {
        echo "Username already exists.";
    } else {
        // Insert user data into the database
        $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $checker = $conn->prepare($query);
        
        if ($checker->execute(['username' => $username, 'email' => $email, 'password' => $hashed_password])) {
            echo "Registration successful!";
        } else {
            echo "Error: Registration failed.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <form method="POST" action="register.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
