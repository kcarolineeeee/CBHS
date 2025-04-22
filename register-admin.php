<?php
session_start();

include 'dbconfig.php';

// Handle form submission
$success = $error = "";
if (isset($_POST['submit'])) {
  try {
    $stmt = $pdo->prepare("INSERT INTO admin (Firstname, MI, Lastname, Extension, Birthdate, Sex, Email, ContactNum, Address, Position, Password) 
                           VALUES (:fname, :mi, :lname, :ext, :bdate, :sex, :email, :contact, :address, :position, :password)");

    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt->execute([
      ':fname'    => $_POST['firstname'],
      ':mi'       => $_POST['mi'],
      ':lname'    => $_POST['lastname'],
      ':ext'      => $_POST['extension'],
      ':bdate'    => $_POST['birthdate'],
      ':sex'      => $_POST['sex'],
      ':email'    => $_POST['email'],
      ':contact'  => $_POST['contact'],
      ':address'  => $_POST['address'],
      ':position' => $_POST['position'],
      ':password' => $hashedPassword
    ]);

    $success = "Registration successful!";
  } catch (PDOException $e) {
    $error = "Error: " . $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 0 20px rgba(0, 123, 255, 0.1);
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card p-4">
        <h3 class="text-center text-primary mb-4">Admin Registration</h3>

        <?php if ($success): ?>
          <div class="alert alert-success"><?= $success ?></div>
        <?php elseif ($error): ?>
          <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="">
          <div class="row">
            <div class="col-md-4 mb-3">
              <label>First Name</label>
              <input type="text" name="firstname" class="form-control" required>
            </div>
            <div class="col-md-2 mb-3">
              <label>Middle Initial</label>
              <input type="text" name="mi" class="form-control" >
            </div>
            <div class="col-md-4 mb-3">
              <label>Last Name</label>
              <input type="text" name="lastname" class="form-control" required>
            </div>
            <div class="col-md-2 mb-3">
              <label>Extension</label>
              <input type="text" name="extension" class="form-control">
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 mb-3">
              <label>Birthdate</label>
              <input type="date" name="birthdate" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
              <label>Sex</label>
              <select name="sex" class="form-select" required>
                <option value="" selected disabled>Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
            <div class="col-md-4 mb-3">
              <label>Position</label>
              <input type="text" name="position" class="form-control" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Contact Number</label>
              <input type="text" name="contact" class="form-control" required>
            </div>
          </div>

          <div class="mb-3">
            <label>Address</label>
            <input type="text" name="address" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>

          <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary px-4">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
