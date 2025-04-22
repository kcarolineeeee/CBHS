<?php
session_start();

if (isset($_POST['appointmentID'])) {
    $_SESSION['AppointmentID'] = $_POST['appointmentID'];
    header("Location: edit-appointment-patient.php");
    exit;
} else {
    echo "Error: No appointment ID provided.";
}
