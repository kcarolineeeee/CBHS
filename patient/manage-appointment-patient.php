<?php
session_start();
include '../dbconfig.php';  // Include the database connection

// Check if patientID is stored in the session
if (!isset($_SESSION['PatientID'])) {
    echo "Error: Missing patientID in session!<br>";
    exit;
}

// Get the patientID from the session
$patientID = $_SESSION['PatientID'];

// Fetch the patient's details from the database
$patientQuery = $pdo->prepare("SELECT Firstname, Middlename, Lastname, Extension, Sex, Birthdate, ContactNum FROM patient WHERE PatientID = :patientID");
$patientQuery->execute([':patientID' => $patientID]);
$patient = $patientQuery->fetch(PDO::FETCH_ASSOC);

// If no patient is found, show an error
if (!$patient) {
    echo "Error: Patient not found!<br>";
    exit;
}



// Fetch all appointments for the patient
$appointmentsQuery = $pdo->prepare("SELECT * FROM patient_appointment WHERE PatientID = :patientID");
$appointmentsQuery->execute([':patientID' => $patientID]);
$appointments = $appointmentsQuery->fetchAll(PDO::FETCH_ASSOC);

// If no appointments are found, show an error
if (!$appointments) {
    echo "No appointments found for this patient!<br>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Manage Appointments for <?= $patient['Firstname'] . ' ' . ($patient['Middlename'] ? $patient['Middlename'] . ' ' : '') . $patient['Lastname'] . ($patient['Extension'] ? ' ' . $patient['Extension'] : '') ?></h2>

        <div class="row">
            <?php foreach ($appointments as $appointment): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Appointment on <?= substr($appointment['AppointmentDate'], 0, 10) ?></h5>
                            <p class="card-text">
                                <strong>Time:</strong> <?= substr($appointment['AppointmentDate'], 11, 5) ?><br>
                                <strong>Doctor:</strong> <?= getDoctorName($appointment['DoctorAssigned'], $pdo) ?><br>
                                <strong>Status:</strong> <?= $appointment['AppointmentStatus'] ?><br>
                                <strong>Reason:</strong> <?= $appointment['ReasonForVisit'] ?><br>
                            </p>
                            <form method="POST" action="set-appointment-session.php" class="d-inline">
                                <input type="hidden" name="appointmentID" value="<?= $appointment['AppointmentID'] ?>">
                                <button type="submit" class="btn btn-primary">Update Appointment</button>
                            </form>

                            <form method="POST" action="delete-appointment.php" class="d-inline">
                                <input type="hidden" name="appointmentID" value="<?= $appointment['AppointmentID'] ?>">
                                <button type="submit" name="delete" class="btn btn-danger">Delete Appointment</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <a href="dashboard-patient.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Helper function to get doctor's full name
function getDoctorName($doctorID, $pdo) {
    $doctorQuery = $pdo->prepare("SELECT Firstname, Middlename, Lastname, Extension FROM doctor WHERE DocID = :doctorID");
    $doctorQuery->execute([':doctorID' => $doctorID]);
    $doctor = $doctorQuery->fetch(PDO::FETCH_ASSOC);

    if ($doctor) {
        return $doctor['Firstname'] . ' ' . ($doctor['Middlename'] ? $doctor['Middlename'] . ' ' : '') . $doctor['Lastname'] . ($doctor['Extension'] ? ' ' . $doctor['Extension'] : '');
    } else {
        return 'Doctor not found';
    }
}
?>
