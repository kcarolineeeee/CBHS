<?php
session_start();
include '../dbconfig.php';

if (!isset($_SESSION['PatientID'])) {
    header("Location: ../index.php");
    exit();
}

$patientID = $_SESSION['PatientID'];
$record = null;

// Fetch the patient's medical history record
$stmt = $pdo->prepare("SELECT * FROM patient_med_history WHERE PatientID = ?");
$stmt->execute([$patientID]);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

// Handle the delete request
if (isset($_POST['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM patient_med_history WHERE PatientID = ?");
    $stmt->execute([$patientID]);
    header("Location: medical-history.php");
    exit();
}

// Handle the update request
if (isset($_POST['update'])) {
    header("Location: edit-med-history.php"); // Redirect to the update form page
    exit();
}

// Handle the print request
if (isset($_POST['print'])) {
    echo "<script>
        window.onload = function() {
            window.print();
        }
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Medical History</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body { background-color: #ffffff; color: #000; }
    .card-header { background-color: #007bff !important; color: white !important; }
    .btn-primary { background-color: #007bff; border-color: #007bff; }
    .form-label { font-weight: 500; }
    .table th, .table td { vertical-align: middle; }

    /* Print Styles */
    @media print {
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        color: #000;
        background-color: #fff;
      }

      .container {
        margin-top: 0;
        padding: 20px;
      }

      .card {
        border: none;
        box-shadow: none;
        page-break-before: always;
      }

      .card-header {
        background-color: #007bff;
        color: white;
      }

      .btn {
        display: none;
      }

      h4, h5 {
        color: #007bff;
      }

      p {
        font-size: 1.1em;
      }

      .alert {
        display: none;
      }

      .card-body {
        padding: 10px;
      }
    }
  </style>
</head>
<body>

<?php include '../attrib/header-patient.php' ?>

<div class="container mt-5">
  <div class="card border-primary">
    <div class="card-header">
      <h4 class="mb-0">Patient Medical History</h4>
    </div>
    <div class="card-body">
      <?php if ($record): ?>
        <!-- Display the medical history record -->
        <h5 class="mt-4 text-primary">Medical Conditions</h5>
        <p><strong>Heart Disease: </strong><?php echo $record['HeartDisease'] ? 'Yes' : 'No'; ?></p>
        <?php if ($record['HeartDisease']): ?>
            <p><strong>Heart Disease Type: </strong><?php echo $record['HeartDiseaseType']; ?></p>
        <?php endif; ?>

        <p><strong>Lung Disease: </strong><?php echo $record['LungDisease'] ? 'Yes' : 'No'; ?></p>
        <?php if ($record['LungDisease']): ?>
            <p><strong>Lung Disease Type: </strong><?php echo $record['LungDiseaseType']; ?></p>
        <?php endif; ?>

        <p><strong>Cancer: </strong><?php echo $record['Cancer'] ? 'Yes' : 'No'; ?></p>
        <?php if ($record['Cancer']): ?>
            <p><strong>Cancer Type: </strong><?php echo $record['CancerType']; ?></p>
        <?php endif; ?>

        <p><strong>Mental Illness: </strong><?php echo $record['MentalIllness'] ? 'Yes' : 'No'; ?></p>
        <?php if ($record['MentalIllness']): ?>
            <p><strong>Other Mental Conditions: </strong><?php echo $record['OtherMentalConditions']; ?></p>
        <?php endif; ?>

        <p><strong>Other Conditions: </strong><?php echo $record['OtherConditions']; ?></p>

        <!-- Family History -->
        <h5 class="mt-4 text-primary">Family History</h5>
        <p><strong>FH Heart Disease: </strong><?php echo $record['FH_HeartDisease'] ? 'Yes' : 'No'; ?></p>
        <?php if ($record['FH_HeartDisease']): ?>
            <p><strong>FH Heart Disease Type: </strong><?php echo $record['FH_HeartDiseaseType']; ?></p>
        <?php endif; ?>

        <p><strong>FH Stroke: </strong><?php echo $record['FH_Stroke'] ? 'Yes' : 'No'; ?></p>
        <p><strong>FH Diabetes: </strong><?php echo $record['FH_Diabetes'] ? 'Yes' : 'No'; ?></p>
        <p><strong>FH Cancer: </strong><?php echo $record['FH_Cancer'] ? 'Yes' : 'No'; ?></p>

        <p><strong>FH Other Conditions: </strong><?php echo $record['FH_OtherConditions']; ?></p>

        <!-- Lifestyle -->
        <h5 class="mt-4 text-primary">Lifestyle</h5>
        <p><strong>Smoking Status: </strong><?php echo $record['SmokingStatus'] ? 'Yes' : 'No'; ?></p>
        <p><strong>Alcohol Use: </strong><?php echo $record['AlcoholUse'] ? 'Yes' : 'No'; ?></p>
        <p><strong>Physical Activity Level: </strong><?php echo $record['PhysicalActivityLevel'] ? 'Yes' : 'No'; ?></p>

        <!-- Medical Details -->
        <h5 class="mt-4 text-primary">Medical Details</h5>
        <p><strong>Medications: </strong><?php echo $record['Medications']; ?></p>
        <p><strong>Allergies: </strong><?php echo $record['Allergies']; ?></p>
        <p><strong>Surgeries: </strong><?php echo $record['Surgeries']; ?></p>

        <div class="mt-4">
          <!-- Buttons for Update, Delete, Print -->
          <form method="post" class="d-inline">
            <button type="submit" name="update" class="btn btn-primary">Update Record</button>
          </form>
          <form method="post" class="d-inline">
            <button type="submit" name="delete" class="btn btn-danger">Delete Record</button>
          </form>
          <form method="post" class="d-inline">
            <button type="submit" name="print" class="btn btn-secondary">Print Record</button>
          </form>
        </div>
      <?php else: ?>
        <!-- If the record is empty -->
        <div class="alert alert-warning" role="alert">
          You have not added your medical history yet. Please <a href="add-med-history.php" class="alert-link">add your medical history.</a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php include '../attrib/footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
