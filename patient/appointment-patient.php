<?php
session_start();

// Include database connection
include '../dbconfig.php';  

$patientID = $_SESSION['PatientID'];  // Get PatientID from session

// Fetch the patient's details
$patientQuery = $pdo->prepare("SELECT Firstname, Middlename, Lastname, Extension, Sex, Birthdate, ContactNum FROM patient WHERE PatientID = :patientID");
$patientQuery->execute([':patientID' => $patientID]);
$patient = $patientQuery->fetch(PDO::FETCH_ASSOC);

// If no patient is found, show an error
if (!$patient) {
    echo "Error: Patient not found!";
    exit;
}

// Calculate the patient's age
$birthdate = new DateTime($patient['Birthdate']);
$age = $birthdate->diff(new DateTime())->y;

// Fetch all doctors from the database
$doctorsQuery = $pdo->query("SELECT DocID, Firstname, Middlename, Lastname, Extension FROM doctor");
$doctors = $doctorsQuery->fetchAll(PDO::FETCH_ASSOC);

// If form is submitted, process the appointment
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appointmentDate = $_POST['appointmentDate'];
    $appointmentTime = $_POST['appointmentTime'];
    $doctorAssigned = $_POST['doctorAssigned'];  // DocID is passed here
    $reasonForVisit = $_POST['reasonForVisit'];
    $message = $_POST['message'];
    $status = 'Pending';  // Default status

    // Insert appointment into the database
    $sql = "INSERT INTO patient_appointment (PatientID, AppointmentDate, AppointmentStatus, DoctorAssigned, ReasonForVisit, Message)
            VALUES (:patientID, :appointmentDate, :status, :doctorAssigned, :reasonForVisit, :message)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':patientID' => $patientID,
        ':appointmentDate' => $appointmentDate . ' ' . $appointmentTime,  // Combine date and time
        ':status' => $status,
        ':doctorAssigned' => $doctorAssigned,
        ':reasonForVisit' => $reasonForVisit,
        ':message' => $message
    ]);

    // Now, fetch the AppointmentID for the newly inserted appointment
    $appointmentQuery = $pdo->prepare("SELECT AppointmentID FROM patient_appointment WHERE PatientID = :patientID AND AppointmentDate = :appointmentDate AND DoctorAssigned = :doctorAssigned ORDER BY AppointmentID DESC LIMIT 1");
    $appointmentQuery->execute([
        ':patientID' => $patientID,
        ':appointmentDate' => $appointmentDate . ' ' . $appointmentTime,
        ':doctorAssigned' => $doctorAssigned
    ]);

    $appointment = $appointmentQuery->fetch(PDO::FETCH_ASSOC);

    if ($appointment) {
        // Store PatientID, DoctorAssigned, and AppointmentID in the session
        $_SESSION['PatientID'] = $patientID;
        $_SESSION['DocID'] = $doctorAssigned;  // Save the doctor ID properly
        $_SESSION['AppointmentID'] = $appointment['AppointmentID'];
    
        // Debug
        echo "AppointmentID from session after insertion: " . $_SESSION['AppointmentID'] . "<br>";
        echo "DoctorID from session after insertion: " . $_SESSION['DocID'] . "<br>";
    
        // Redirect
        header("Location: manage-appointment-patient.php");
        exit;
    }
     else {
        echo "Error: Unable to fetch the AppointmentID.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Create Appointment for <?= $patient['Firstname'] . ' ' . ($patient['Middlename'] ? $patient['Middlename'] . ' ' : '') . $patient['Lastname'] . ($patient['Extension'] ? ' ' . $patient['Extension'] : '') ?></h2>

        <form method="POST" action="">
            <!-- Patient's Details -->
            <div class="form-group">
                <label for="patientName">Patient's Name</label>
                <input type="text" class="form-control" id="patientName" value="<?= $patient['Firstname'] . ' ' . ($patient['Middlename'] ? $patient['Middlename'] . ' ' : '') . $patient['Lastname'] . ($patient['Extension'] ? ' ' . $patient['Extension'] : '') ?>" disabled>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" value="<?= $age ?>" disabled>
            </div>
            <div class="form-group">
                <label for="contactNumber">Contact Number</label>
                <input type="text" class="form-control" id="contactNumber" value="<?= $patient['ContactNum'] ?>" disabled>
            </div>
            <div class="form-group">
                <label for="sex">Sex</label>
                <input type="text" class="form-control" id="sex" value="<?= $patient['Sex'] ?>" disabled>
            </div>

            <!-- Appointment Details -->
            <div class="form-group">
                <label for="appointmentDate">Appointment Date</label>
                <input type="date" class="form-control" id="appointmentDate" name="appointmentDate" required>
            </div>
            <div class="form-group">
                <label for="appointmentTime">Appointment Time</label>
                <input type="time" class="form-control" id="appointmentTime" name="appointmentTime" required>
            </div>
            <div class="form-group">
                <label for="doctorAssigned">Doctor Assigned</label>
                <select class="form-control" id="doctorAssigned" name="doctorAssigned" required>
                    <option value="">Select Doctor</option>
                    <?php foreach ($doctors as $doctor): ?>
                        <option value="<?= $doctor['DocID'] ?>">
                            <?= $doctor['Firstname'] . ' ' . ($doctor['Middlename'] ? $doctor['Middlename'] . ' ' : '') . $doctor['Lastname'] . ($doctor['Extension'] ? ' ' . $doctor['Extension'] : '') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="reasonForVisit">Reason for Visit</label>
                <textarea class="form-control" id="reasonForVisit" name="reasonForVisit" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="message">Additional Message</label>
                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Appointment</button>
            <a href="dashboard-patient.php" class="btn btn-secondary">Back to Dashboard</a>

        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
