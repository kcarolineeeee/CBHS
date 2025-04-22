<?php
session_start();
include '../dbconfig.php';

if (!isset($_SESSION['PatientID'])) {
    header("Location: ../index.php");
    exit();
}

$PatientID = $_SESSION['PatientID'];

// DELETE MEDICAL HISTORY RECORD
$stmt = $pdo->prepare("DELETE FROM patient_med_history WHERE PatientID = ?");
$stmt->execute([$PatientID]);

// Redirect to form after deletion
header("Location: med-history.php");
exit();
?>
