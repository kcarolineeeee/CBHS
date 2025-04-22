<?php
session_start();
include '../dbconfig.php';  // Include the database connection

echo "<hr>";
echo "Debugging appointment retrieval...<br>";
echo "PatientID from session: " . $_SESSION['PatientID'] . "<br>";
echo "AppointmentID from session: " . $_SESSION['AppointmentID'] . "<br><br>";

// Check if AppointmentID really exists in DB
$check = $pdo->prepare("SELECT * FROM patient_appointment WHERE AppointmentID = :appointmentID");
$check->execute([':appointmentID' => $_SESSION['AppointmentID']]);
$found = $check->fetch(PDO::FETCH_ASSOC);

if ($found) {
    echo "✅ AppointmentID " . $_SESSION['AppointmentID'] . " exists in DB.<br>";
    echo "🔍 Found PatientID in record: " . $found['PatientID'] . "<br>";
} else {
    echo "❌ No record found for AppointmentID = " . $_SESSION['AppointmentID'] . "<br>";
}


// Get the patientID and appointmentID from the session
$patientID = $_SESSION['PatientID'];
$appointmentID = $_SESSION['AppointmentID'];

// Fetch the patient's details from the database
$patientQuery = $pdo->prepare("SELECT Firstname, Middlename, Lastname, Extension, Sex, Birthdate, ContactNum FROM patient WHERE PatientID = :patientID");
$patientQuery->execute([':patientID' => $patientID]);
$patient = $patientQuery->fetch(PDO::FETCH_ASSOC);

// If no patient is found, show an error
if (!$patient) {
    echo "Error: Patient not found!<br>";
    exit;
}

// Fetch appointment details from the database using the appointmentID
$appointmentQuery = $pdo->prepare("SELECT * FROM patient_appointment WHERE PatientID = :patientID AND AppointmentID = :appointmentID");
$appointmentQuery->execute([':patientID' => $patientID, ':appointmentID' => $appointmentID]);
$appointment = $appointmentQuery->fetch(PDO::FETCH_ASSOC);


echo "<hr>Debug: Checking appointment existence...<br>";
$stmt = $pdo->prepare("SELECT * FROM patient_appointment WHERE AppointmentID = :appointmentID");
$stmt->execute([':appointmentID' => $appointmentID]);
$debugAppointment = $stmt->fetch(PDO::FETCH_ASSOC);

if ($debugAppointment) {
    echo "Found AppointmentID = " . $debugAppointment['AppointmentID'] . " with PatientID = " . $debugAppointment['PatientID'] . "<br>";
} else {
    echo "No appointment found with AppointmentID = $appointmentID<br>";
}


// If no appointment is found, show an error
if (!$appointment) {
    echo "Error: Appointment not found!<br>";
    exit;
}

// Save the assigned doctor's ID into the session
if (isset($appointment['DoctorAssigned'])) {
    $_SESSION['DocID'] = $appointment['DoctorAssigned'];
}


// If form is submitted to update the appointment
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appointmentDate = $_POST['appointmentDate'];
    $appointmentTime = $_POST['appointmentTime'];
    $doctorAssigned = $_POST['doctorAssigned'];
    $reasonForVisit = $_POST['reasonForVisit'];
    $message = $_POST['message'];
    $status = $_POST['status'];

    // Update the appointment in the database
    $sql = "UPDATE patient_appointment SET 
                AppointmentDate = :appointmentDate, 
                DoctorAssigned = :doctorAssigned, 
                ReasonForVisit = :reasonForVisit, 
                Message = :message, 
                AppointmentStatus = :status
            WHERE AppointmentID = :appointmentID";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':appointmentDate' => $appointmentDate . ' ' . $appointmentTime,  // Combine date and time
        ':doctorAssigned' => $doctorAssigned,
        ':reasonForVisit' => $reasonForVisit,
        ':message' => $message,
        ':status' => $status,
        ':appointmentID' => $appointmentID
    ]);

    echo "Appointment updated successfully!<br>";
}

// If form is submitted to delete the appointment
if (isset($_POST['delete'])) {
    // Delete the appointment from the database
    $sql = "DELETE FROM patient_appointment WHERE AppointmentID = :appointmentID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':appointmentID' => $appointmentID]);

    echo "Appointment deleted successfully!<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointment</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Manage Appointment for <?= $patient['Firstname'] . ' ' . ($patient['Middlename'] ? $patient['Middlename'] . ' ' : '') . $patient['Lastname'] . ($patient['Extension'] ? ' ' . $patient['Extension'] : '') ?></h2>

        <form method="POST" action="">
            <div class="form-group">
                <label for="appointmentDate">Appointment Date</label>
                <input type="date" class="form-control" id="appointmentDate" name="appointmentDate" value="<?= substr($appointment['AppointmentDate'], 0, 10) ?>" required>
            </div>
            <div class="form-group">
                <label for="appointmentTime">Appointment Time</label>
                <input type="time" class="form-control" id="appointmentTime" name="appointmentTime" value="<?= substr($appointment['AppointmentDate'], 11, 5) ?>" required>
            </div>
            <div class="form-group">
                <label for="doctorAssigned">Doctor Assigned</label>
                <select class="form-control" id="doctorAssigned" name="doctorAssigned" required>
                    <option value="">Select Doctor</option>
                    <?php
                    // Fetch doctors to display in the dropdown
                    $doctorsQuery = $pdo->query("SELECT DocID, Firstname, Middlename, Lastname, Extension FROM doctor");
                    $doctors = $doctorsQuery->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($doctors as $doctor): ?>
                        <option value="<?= $doctor['DocID'] ?>" <?= ($doctor['DocID'] == $appointment['DoctorAssigned']) ? 'selected' : '' ?>>
                            <?= $doctor['Firstname'] . ' ' . ($doctor['Middlename'] ? $doctor['Middlename'] . ' ' : '') . $doctor['Lastname'] . ($doctor['Extension'] ? ' ' . $doctor['Extension'] : '') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="reasonForVisit">Reason for Visit</label>
                <textarea class="form-control" id="reasonForVisit" name="reasonForVisit" rows="3" required><?= $appointment['ReasonForVisit'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="message">Additional Message</label>
                <textarea class="form-control" id="message" name="message" rows="3"><?= $appointment['Message'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="status">Appointment Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Pending" <?= ($appointment['AppointmentStatus'] == 'Pending') ? 'selected' : '' ?>>Pending</option>
                    <option value="Confirmed" <?= ($appointment['AppointmentStatus'] == 'Confirmed') ? 'selected' : '' ?>>Confirmed</option>
                    <option value="Cancelled" <?= ($appointment['AppointmentStatus'] == 'Cancelled') ? 'selected' : '' ?>>Cancelled</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Appointment</button>
        </form>

        <!-- Delete Appointment Button -->
        <form method="POST" action="">
            <button type="submit" name="delete" class="btn btn-danger mt-3">Delete Appointment</button>
        </form>

        <a href="dashboard-patient.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
