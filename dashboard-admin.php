<?php

session_start();

include 'dbconfig.php';

if (!isset($_SESSION['AdminID'])) {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>

    <?php include './attrib/header-admin.php'; ?>
    
</body>
</html>