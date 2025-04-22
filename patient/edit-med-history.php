<?php
session_start();
include '../dbconfig.php';

if (!isset($_SESSION['PatientID'])) {
    header("Location: ../index.php");
    exit();
}

$PatientID = $_SESSION['PatientID'];

// FETCH EXISTING DATA
$stmt = $pdo->prepare("SELECT * FROM patient_med_history WHERE PatientID = ?");
$stmt->execute([$PatientID]);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$record) {
    echo "<div class='alert alert-warning'>No medical history found. <a href='med-history.php'>Add Medical History</a></div>";
    exit();
}

if (isset($_POST['update'])) {
    $fields = array_keys($record);
    $updates = implode(', ', array_map(fn($f) => "$f = ?", $fields));
    $stmt = $pdo->prepare("UPDATE patient_med_history SET $updates WHERE PatientID = ?");
    $values = array_map(fn($f) => $_POST[$f] ?? null, $fields);
    $values[] = $PatientID;
    $stmt->execute($values);
    echo "<script>window.location.href='med-history-view.php';</script>";
    exit();
}

function isYesNoField($field) {
    $yesNoFields = [
        'HeartDisease', 'LungDisease', 'Cancer', 'MentalIllness', 'HeartAttack', 'HighBloodPressure',
        'HighCholesterol', 'Stroke', 'Diabetes', 'Asthma', 'Osteoporosis', 'Arthritis', 'Depression', 'Anxiety',
        'FH_HeartDisease', 'FH_Stroke', 'FH_Diabetes', 'FH_Cancer',
        'SmokingStatus', 'AlcoholUse'
    ];
    return in_array($field, $yesNoFields);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Medical History</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php include '../attrib/header-patient.php' ?>

<div class="container mt-5">
  <div class="card border-primary">
    <div class="card-header bg-primary text-white">
      <h4>Edit Medical History</h4>
    </div>
    <div class="card-body">
      <form method="post">
        <?php foreach ($record as $field => $value): ?>
          <?php if ($field === 'PatientID'): ?>
            <input type="hidden" name="<?= $field ?>" value="<?= htmlspecialchars($value) ?>">
          <?php else: ?>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label"><?= $field ?></label>
              <div class="col-sm-9">
                <?php if (isYesNoField($field)): ?>
                  <select name="<?= $field ?>" class="form-select" id="<?= $field ?>-select" onchange="toggleTypeFields()">
                    <option value="">N/A</option>
                    <option value="1" <?= $value == '1' ? 'selected' : '' ?>>Yes</option>
                    <option value="0" <?= $value == '0' ? 'selected' : '' ?>>No</option>
                  </select>
                <?php else: ?>
                  <input type="text" name="<?= $field ?>" class="form-control" value="<?= htmlspecialchars($value ?? 'N/A') ?>">
                <?php endif; ?>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>

        <!-- Conditionally hidden fields for Depression and Anxiety -->
        <div class="mb-3 row" id="depression-container" style="display:none;">
            <label class="col-sm-3 col-form-label">Depression</label>
            <div class="col-sm-9">
                <input type="text" name="Depression" class="form-control" value="<?= htmlspecialchars($record['Depression'] ?? 'N/A') ?>">
            </div>
        </div>
        <div class="mb-3 row" id="anxiety-container" style="display:none;">
            <label class="col-sm-3 col-form-label">Anxiety</label>
            <div class="col-sm-9">
                <input type="text" name="Anxiety" class="form-control" value="<?= htmlspecialchars($record['Anxiety'] ?? 'N/A') ?>">
            </div>
        </div>

        <div class="text-end">
          <button type="submit" name="update" class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-danger" onclick="if(confirm('Are you sure you want to delete this record?')) window.location.href='med-history-delete.php';">Delete</button>
          <button type="button" class="btn btn-secondary" onclick="window.location.href='med-history.php'">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
// Toggle Depression and Anxiety fields based on Mental Illness field
function toggleTypeFields() {
    const mentalIllnessField = document.getElementById('MentalIllness-select');
    const depressionField = document.getElementById('depression-container');
    const anxietyField = document.getElementById('anxiety-container');


}

// Ensure fields are correctly set based on existing values when the page loads
document.addEventListener('DOMContentLoaded', function() {
    toggleTypeFields();  // Call to hide/show fields based on current value
});
</script>

</body>
</html>
