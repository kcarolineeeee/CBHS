<?php
session_start();
include 'dbconfig.php'; // Ensure you have the correct database connection here.

$error = '';

if (isset($_POST['submit'])) {
    $login = trim($_POST['login']);
    $password = $_POST['password'];

    // SQL query to check email or contact number
    $sql = "SELECT * FROM admin WHERE (Email = :email OR ContactNum = :contact) LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':email' => $login,
        ':contact' => $login
    ]);

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify the password
        if (password_verify($password, $user['Password'])) {
            // Set session variables on successful login
            $_SESSION['AdminID'] = $user['AdminID']; // Make sure you're setting the correct session variable name here.
            $_SESSION['Email'] = $user['Email'];

            // Redirect to the dashboard
            header("Location: dashboard-admin.php");
            exit();
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "Account not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Healthcare Provider Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6f0ff;
        }
        .logo-container {
            text-align: center;
            margin-top: 50px;
        }
        .logo-container img {
            width: 150px; /* Adjust the size of your logo */
            height: 150px;
            border-radius: 50%;
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto auto;
        }
        .logo-container h1 {
            color: #007bff;
            font-size: 2rem;
        }
        .login-box {
            max-width: 400px;
            margin: 30px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,128,0.2);
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-label {
            font-weight: 500;
        }
        /* Styling for the cancel (Back to Home) button */
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        /* Remove underline from links inside the buttons (Back to Home) */
        .btn-link {
            text-decoration: none;
            color: inherit;
        }
        /* Style the Sign Up link to have an underline */
        .signup-link {
            text-decoration: underline;
            color: #007bff;
        }
    </style>
</head>
<body>

<!-- Logo and Website Name Section -->
<div class="logo-container">
    <!-- Placeholder for Logo -->
    <img src="#" alt="Logo">
    <h1>Your Website Name</h1>
</div>

<div class="container">
    <div class="login-box">
        <h3 class="text-center text-primary mb-4">Login as Healthcare Provider</h3>

        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="login" class="form-label">Email or Phone Number</label>
                <input type="text" class="form-control" id="login" name="login" required placeholder="Enter email or phone">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Enter password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <!-- Buttons for Registration and Back to Home -->
        <div class="mt-1 text-center">
            <a href="index.php" class="btn btn-secondary w-100 mb-1">Cancel</a>
            <p>Not yet a member? <a href="#" class="contact-link">Contact Us</a></p>
        </div>
    </div>
</div>

</body>
</html>
