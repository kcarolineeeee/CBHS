<?php
include 'dbconfig.php';

$errors = [];
$success = false;

// Retain input
$inputs = $_POST;

if (isset($_POST['register'])) {
    $Firstname = $_POST['Firstname'] ?? '';
    $Middlename = $_POST['Middlename'] ?? '';
    $Lastname = $_POST['Lastname'] ?? '';
    $Extension = $_POST['Extension'] ?? '';
    $Birthdate = $_POST['Birthdate'] ?? '';
    $Sex = $_POST['Sex'] ?? '';
    $Email = $_POST['Email'] ?? '';
    $ContactNum = $_POST['ContactNum'] ?? '';
    $Address = $_POST['Address'] ?? '';
    $Password = $_POST['Password'] ?? '';
    $RePassword = $_POST['RePassword'] ?? '';

    if ($Password !== $RePassword) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        // Check if account already exists based on email or contact number
        $checkStmt = $pdo->prepare("SELECT * FROM patient WHERE Email = ? OR ContactNum = ?");
        $checkStmt->execute([$Email, $ContactNum]);
    
        if ($checkStmt->rowCount() > 0) {
            $existing = $checkStmt->fetch(PDO::FETCH_ASSOC);
            
            if (($existing['Email'] === $Email) && ($existing['ContactNum'] === $ContactNum)) {
                $errors[] = "An account with this email and contact number already exists. Please use a different email and number.";
            } elseif ($existing['Email'] === $Email) {
                $errors[] = "An account with this email already exists. Please log in or use a different email.";
            } elseif ($existing['ContactNum'] === $ContactNum) {
                $errors[] = "An account with this contact number already exists. Please use a different number.";
            }
        } else {
            try {
                $stmt = $pdo->prepare("INSERT INTO patient 
                    (Firstname, Middlename, Lastname, Extension, Birthdate, Sex, Email, ContactNum, Address, Password)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
                $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
    
                $stmt->execute([
                    $Firstname, $Middlename, $Lastname, $Extension, $Birthdate, $Sex,
                    $Email, $ContactNum, $Address, $hashedPassword
                ]);
    
                $success = true;
                $inputs = []; // Clear form after success
                header("Location: login-patient.php?registered=1");
                exit();


    
            } catch (PDOException $e) {
                $errors[] = "Database error: " . $e->getMessage();
            }
        }
    }
    
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


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
        }
        .logo-container h1 {
            color: #007bff;
            font-size: 2rem;
        }
        .form-container {
            max-width: 500px;
            margin: 30px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 128, 0.2);
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
        .btn-link {
            text-decoration: none;
            color: inherit;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<!-- Logo and Website Name Section -->
<div class="logo-container">
    <img src="your-logo-placeholder.png" alt="Logo">
    <h1>Your Website Name</h1>
</div>

<div class="container">
    <div class="form-container">
        <h3 class="text-center text-primary mb-4">Register as a Patient</h3>

        <?php
            if (!empty($errors)) {
                echo '<div class="alert alert-danger">';
                foreach ($errors as $error) {
                    echo "<p>$error</p>";
                }
                echo '</div>';
            } elseif ($success) {
                echo '
                    <div class="alert alert-success p-1">
                        <p>Successfully registered! Go Back Home to Login.</p>
                    </div>';
            }
        ?>
       

        <form method="POST">
            <div class="mb-3">
                <label for="Firstname" class="form-label">First Name:</label>
                <input type="text" class="form-control" name="Firstname" value="<?= htmlspecialchars($inputs['Firstname'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label for="MI" class="form-label">Middle Name (Optional):</label>
                <input type="text" class="form-control" name="Middlename" value="<?= htmlspecialchars($inputs['Middlename'] ?? '') ?>">
            </div>

            <div class="mb-3">
                <label for="Lastname" class="form-label">Last Name:</label>
                <input type="text" class="form-control" name="Lastname" value="<?= htmlspecialchars($inputs['Lastname'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label for="Extension" class="form-label">Extension (Optional):</label>
                <input type="text" class="form-control" name="Extension" value="<?= htmlspecialchars($inputs['Extension'] ?? '') ?>">
            </div>

            <div class="mb-3">
                <label for="Birthdate" class="form-label">Birthdate:</label>
                <input type="date" class="form-control" name="Birthdate" value="<?= htmlspecialchars($inputs['Birthdate'] ?? '') ?>">
            </div>

            <div class="mb-3">
                <label for="Sex" class="form-label">Sex:</label>
                <select name="Sex" class="form-control">
                    <option value="Male" <?= (isset($inputs['Sex']) && $inputs['Sex'] == 'Male') ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= (isset($inputs['Sex']) && $inputs['Sex'] == 'Female') ? 'selected' : '' ?>>Female</option>
                    <option value="Other" <?= (isset($inputs['Sex']) && $inputs['Sex'] == 'Other') ? 'selected' : '' ?>>Other</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="Email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="Email" value="<?= htmlspecialchars($inputs['Email'] ?? '') ?>">
            </div>

            <div class="mb-3">
                <label for="ContactNum" class="form-label">Contact Number:</label>
                <input type="text" class="form-control" name="ContactNum" value="<?= htmlspecialchars($inputs['ContactNum'] ?? '') ?>">
            </div>

            <div class="mb-3">
                <label for="Address" class="form-label">Address:</label>
                <input type="text" class="form-control" name="Address" value="<?= htmlspecialchars($inputs['Address'] ?? '') ?>">
            </div>

            <div class="mb-3">
                <label for="Password" class="form-label">Password:</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="Password" name="Password">
                    <span class="input-group-text" onclick="togglePasswordVisibility()" style="cursor: pointer;">
                        <i id="togglePasswordIcon" class="bi bi-eye"></i>
                    </span>
                </div>
            </div>



            <div class="mb-3">
                <label for="RePassword" class="form-label">Re-enter Password:</label>
                <input type="password" class="form-control" name="RePassword">
            </div>

            <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
        </form>

        <!-- Buttons for Registration and Back to Home -->
        <div class="mt-1 text-center">
            <a href="index.php" class="btn btn-secondary w-100">Back to Home</a>
            <br>
            <p>Already a member? <a href="login.php">Login</a></p>
        </div>
    </div>
</div>

<script>
function togglePasswordVisibility() {
    const passwordInput = document.getElementById("Password");
    const icon = document.getElementById("togglePasswordIcon");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    } else {
        passwordInput.type = "password";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    }
}
</script>



</body>
</html>
