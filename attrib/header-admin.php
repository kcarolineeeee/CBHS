<?php

if (isset($_GET['logout'])) {
    $_SESSION = []; // Clear all session data
    // Destroy all session data
    session_unset(); 
    session_destroy();
    
    // Optional: Clear session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    header("Location: index.php"); // Redirect to login page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Barangay Name Health Center</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Notification Icon -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }

    .header-section {
      background-color: #ffffff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 15px 0;
    }

    .logo {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #ffffff;
      border: 2px solid #007bff;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 10px;
      color: #007bff;
      font-weight: bold;
    }

    .navbar-brand {
      font-size: 1.25rem;
      font-weight: bold;
      color: #007bff !important;
    }

    .navbar-nav .nav-link {
      color: #007bff;
      font-weight: 500;
      transition: color 0.2s ease-in-out;
    }

    .navbar-nav .nav-link:hover {
      color: #0056b3;
    }

    .btn-login {
      background-color: #007bff;
      color: #ffffff;
      border: none;
    }

    .btn-login:hover {
      background-color: #0056b3;
      color: #ffffff;
    }

    .navbar-header {
      display: flex;
      justify-content: space-between;
      width: 100%;
      align-items: center;
    }

    .brand-container {
      display: flex;
      align-items: center;
      flex: 1;
    }

    .navbar-toggler {
      display: inline-block;
      margin-left: 10px;
    }

    @media (max-width: 576px) {
      .navbar-brand {
        font-size: 0.95rem;
      }

      .logo {
        width: 40px;
        height: 40px;
      }
    }

    .dropdown-menu {
    border-radius: 0.5rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    animation: fadeIn 0.2s ease-in-out;
    }

    @keyframes fadeIn {
    from { opacity: 0; transform: translateY(5px); }
    to { opacity: 1; transform: translateY(0); }
    }
    

  </style>
</head>
<body>
  <section class="header-section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light p-0">
        <div class="navbar-header">
          <div class="brand-container">
            <div class="logo">LOGO</div>
            <a class="navbar-brand" href="#">BARANGAY NAME HEALTH CENTER</a>
          </div>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
            <li class="nav-item">
              <a class="nav-link" href="#">HOME</a>
            </li>

            <!-- BLOG Dropdown -->
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="blogsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                BLOGS
            </a>
            <ul class="dropdown-menu" aria-labelledby="blogsDropdown">
                <li><a class="dropdown-item" href="#">Manage Blogs</a></li>
                <li><a class="dropdown-item" href="#">Write a Blog</a></li>
            </ul>
            </li>

            <!-- DOCTORS Dropdown -->
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="doctorsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                DOCTORS
            </a>
            <ul class="dropdown-menu" aria-labelledby="doctorsDropdown">
                <li><a class="dropdown-item" href="#">Manage Doctors</a></li>
                <li><a class="dropdown-item" href="#">Manage Doctor Schedules</a></li>
            </ul>
            </li>

            <!-- PATIENTS Dropdown -->
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="patientsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                PATIENTS
            </a>
            <ul class="dropdown-menu" aria-labelledby="patientsDropdown">
                <li><a class="dropdown-item" href="#">Manage Patients</a></li>
                <li><a class="dropdown-item" href="#">Manage Health Record</a></li>
                <li><a class="dropdown-item" href="#">Manage Patient Appointment</a></li>
            </ul>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="#">MESSAGES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">FAQs</a>
            </li>

            <!-- Notification Icon -->
            <li class="nav-item dropdown">
            <a class="nav-link position-relative" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-bell" style="font-size: 1.25rem;"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                3
                <span class="visually-hidden">unread notifications</span>
                </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                <li><a class="dropdown-item" href="#">New appointment request</a></li>
                <li><a class="dropdown-item" href="#">System update available</a></li>
                <li><a class="dropdown-item" href="#">New message from admin</a></li>
            </ul>
            </li>

            <!-- Profile Icon -->
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle" style="font-size: 1.25rem;"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="?logout=true">Logout</a></li>
            </ul>
            </li>


          </ul>
        </div>
      </nav>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
