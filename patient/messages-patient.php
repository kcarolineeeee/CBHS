<?php
session_start();
include '../dbconfig.php';

$patientID = $_SESSION['PatientID'] ?? null;
$doctorID = $_SESSION['DocID'] ?? null;  // Initially set to the doctor for current session or previous communication

// Fetch all available doctors
$doctorsQuery = $pdo->query("SELECT DocID, Firstname, Lastname FROM doctor");
$doctors = $doctorsQuery->fetchAll(PDO::FETCH_ASSOC);

// Handle doctor selection
if (isset($_POST['doctorID'])) {
    $_SESSION['DocID'] = $_POST['doctorID'];  // Update session with selected doctor
    $doctorID = $_SESSION['DocID'];  // Update local variable
}

// Check if doctor and patient ID are set
if (!$patientID || !$doctorID) {
    echo "Error: Missing patientID or doctorID!";
    exit;
}

// Handle message submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['message'])) {
    $message = trim($_POST['message']);
    $sentBy = 'patient';

    $insert = $pdo->prepare("
        INSERT INTO messages (PatientID, DoctorID, SentBy, MessageText) 
        VALUES (:patientID, :doctorID, :sentBy, :message)
    ");
    $insert->execute([
        ':patientID' => $patientID,
        ':doctorID' => $doctorID,
        ':sentBy' => $sentBy,
        ':message' => $message
    ]);
}

// Fetch messages
$stmt = $pdo->prepare("
    SELECT * FROM messages 
    WHERE PatientID = :patientID AND DoctorID = :doctorID 
    ORDER BY DateSent ASC
");
$stmt->execute([
    ':patientID' => $patientID,
    ':doctorID' => $doctorID
]);
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messages</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f1f1;
        }
        .chat-container {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            max-width: 700px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .chat-box {
            max-height: 400px;
            overflow-y: auto;
            padding: 10px;
            margin-bottom: 20px;
        }
        .message {
            display: flex;
            margin-bottom: 15px;
        }
        .message.patient {
            justify-content: flex-end;
        }
        .message.doctor {
            justify-content: flex-start;
        }
        .bubble {
            max-width: 70%;
            padding: 12px 15px;
            border-radius: 15px;
            position: relative;
        }
        .patient .bubble {
            background-color: #007bff;
            color: white;
            border-bottom-right-radius: 0;
        }
        .doctor .bubble {
            background-color: #e2e3e5;
            color: black;
            border-bottom-left-radius: 0;
        }
        .bubble small {
            display: block;
            font-size: 0.75rem;
            margin-top: 5px;
            color: rgba(255,255,255,0.8);
        }
        .doctor .bubble small {
            color: rgba(0,0,0,0.6);
        }
    </style>
</head>
<body>
    <div class="container mt-5 chat-container">
        <h4 class="mb-4 text-center">Messages</h4>

        <!-- Doctor selection dropdown -->
        <form method="POST" class="mb-4">
            <label for="doctorID">Select Doctor</label>
            <select name="doctorID" id="doctorID" class="form-control" onchange="this.form.submit()">
                <option value="#">Select Doctor</option>
                <?php foreach ($doctors as $doctor): ?>
                    <option value="<?= $doctor['DocID'] ?>" <?= ($doctor['DocID'] == $doctorID) ? 'selected' : '' ?>>
                        <?= $doctor['Firstname'] . ' ' . $doctor['Lastname'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>

        <div class="chat-box">
            <?php foreach ($messages as $msg): 
                $sentBy = strtolower(trim($msg['SentBy']));
                ?>
                <div class="message <?= $sentBy === 'patient' ? 'patient' : 'doctor' ?>">
                    <div class="bubble">
                        <?= nl2br(htmlspecialchars($msg['MessageText'])) ?>
                        <small><?= date('M d, Y h:i A', strtotime($msg['DateSent'])) ?></small>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <form method="POST">
            <div class="form-group">
                <textarea class="form-control" name="message" rows="3" required placeholder="Type your message..."></textarea>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Send Message</button>
                <a href="dashboard-patient.php" class="btn btn-secondary">Back to Dashboard</a>
            </div>
        </form>
    </div>
</body>
</html>
