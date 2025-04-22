<?php
session_start();
include '../dbconfig.php';

if (!isset($_SESSION['PatientID'])) {
    header("Location: ../index.php");
    exit();
}


// Flag to determine if the form was submitted successfully
$formSubmitted = false;

if (isset($_POST['submit'])) {
    $allFields = [
      'PatientID', 'HeartDisease', 'HeartDiseaseType', 'LungDisease', 'LungDiseaseType', 'Cancer', 'CancerType',
      'MentalIllness', 'OtherMentalConditions', 'HeartAttack', 'HighBloodPressure', 'HighCholesterol', 'Stroke',
      'Diabetes', 'Asthma', 'Osteoporosis', 'Arthritis', 'Depression', 'Anxiety', 'OtherConditions'
    ];

    $placeholders = implode(',', array_fill(0, count($allFields), '?'));
    $columns = implode(',', $allFields);
    $stmt = $pdo->prepare("INSERT INTO patient_med_history ($columns) VALUES ($placeholders)");
    $values = array_map(fn($f) => $_POST[$f] ?? null, $allFields);
    $stmt->execute($values);
    
    // Set flag to indicate that the form was submitted successfully
    $formSubmitted = true;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medical History</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body { background-color: #ffffff; color: #000; }
    .card-header { background-color: #007bff !important; color: white !important; }
    .btn-primary { background-color: #007bff; border-color: #007bff; }
    .form-label { font-weight: 500; }
    .table th, .table td { vertical-align: middle; }
  </style>
</head>
<body>

<?php include '../attrib/header-patient.php' ?>

<div class="container mt-5">
  <div class="card border-primary">
    <div class="card-header">
      <h4 class="mb-0">Patient Medical History Form</h4>
    </div>
    <div class="card-body">
      <form method="post">
        <!-- Hidden Patient ID -->
        <div class="mb-3 row" style="display:none;">
          <label class="col-sm-3 col-form-label">Patient ID</label>
          <div class="col-sm-9"><input type="number" name="PatientID" value="<?php echo $_SESSION['PatientID']; ?>"></div>
        </div>

        <!-- SECTION: Medical Conditions -->
        <h5 class="mt-4 text-primary">Medical Conditions</h5>
        <?php
        function yesNoSelect($name, $label, $target = null) {
          return "<div class=\"mb-3 row\">
            <label class=\"col-sm-3 col-form-label\">$label</label>
            <div class=\"col-sm-9\">
              <select name=\"$name\" class=\"form-select toggle-trigger\" data-toggle=\"$target\" required>
                <option value=\"\">Choose an option</option>
                <option value=\"1\">Yes</option>
                <option value=\"0\">No</option>
              </select>
            </div>
          </div>";
        }

        function conditionalInput($name, $label) {
          return "<div class=\"mb-3 row toggle-target\" id=\"{$name}-container\" style=\"display:none;\">
            <label class=\"col-sm-3 col-form-label\">$label</label>
            <div class=\"col-sm-9\"><input type=\"text\" name=\"$name\" class=\"form-control\"></div>
          </div>";
        }

        echo yesNoSelect("HeartDisease", "Heart Disease", "HeartDiseaseType");
        echo conditionalInput("HeartDiseaseType", "Heart Disease Type");

        echo yesNoSelect("LungDisease", "Lung Disease", "LungDiseaseType");
        echo conditionalInput("LungDiseaseType", "Lung Disease Type");

        echo yesNoSelect("Cancer", "Cancer", "CancerType");
        echo conditionalInput("CancerType", "Cancer Type");

        echo yesNoSelect("MentalIllness", "Mental Illness", "OtherMentalConditions");
        echo conditionalInput("OtherMentalConditions", "Other Mental Conditions");

        $others = [
          "HeartAttack", "HighBloodPressure", "HighCholesterol", "Stroke",
          "Diabetes", "Asthma", "Osteoporosis", "Arthritis",
          "Depression", "Anxiety"
        ];

        foreach ($others as $field) {
          echo yesNoSelect($field, str_replace('_', ' ', $field));
        }

        echo "<div class='mb-3 row'><label class='col-sm-3 col-form-label'>Other Conditions</label><div class='col-sm-9'><input type='text' name='OtherConditions' class='form-control'></div></div>";
        ?>

        <!-- SECTION: Family History (Not Required) -->
        <h5 class="mt-4 text-primary">Family History</h5>
        <?php
        echo yesNoSelect("FH_HeartDisease", "FH Heart Disease", "FH_HeartDiseaseType");
        echo conditionalInput("FH_HeartDiseaseType", "FH Heart Disease Type");

        $family = ["FH_Stroke", "FH_Diabetes", "FH_Cancer"];
        foreach ($family as $field) {
          echo yesNoSelect($field, str_replace('_', ' ', $field));
        }
        echo "<div class='mb-3 row'><label class='col-sm-3 col-form-label'>FH Other Conditions</label><div class='col-sm-9'><input type='text' name='FH_OtherConditions' class='form-control'></div></div>";
        ?>

        <!-- SECTION: Lifestyle -->
        <h5 class="mt-4 text-primary">Lifestyle</h5>
        <?php
        // Lifestyle with Yes/No options
        function lifestyleSelect($name, $label) {
          return "<div class=\"mb-3 row\">
            <label class=\"col-sm-3 col-form-label\">$label</label>
            <div class=\"col-sm-9\">
              <select name=\"$name\" class=\"form-select\" required>
                <option value=\"\">Choose an option</option>
                <option value=\"1\">Yes</option>
                <option value=\"0\">No</option>
              </select>
            </div>
          </div>";
        }

        echo lifestyleSelect("SmokingStatus", "Do you smoke?");
        echo lifestyleSelect("AlcoholUse", "Do you use alcohol?");
        echo lifestyleSelect("PhysicalActivityLevel", "Do you exercise regularly?");
        ?>

        <!-- SECTION: Medical Details -->
        <h5 class="mt-4 text-primary">Medical Details</h5>
        <?php
        $details = ["Medications", "Allergies", "Surgeries"];
        foreach ($details as $field) {
          echo "<div class='mb-3 row'><label class='col-sm-3 col-form-label'>$field</label><div class='col-sm-9'><input type='text' name='$field' class='form-control'></div></div>";
        }
        ?>

        <div class="text-end">
          <button type="submit" name="submit" class="btn btn-primary">Save Record</button>
          <button type="button" class="btn btn-secondary" onclick="window.location.href='med-history.php'">Cancel</button>

        </div>
      </form>

      <!-- Success Message -->
      <?php if ($formSubmitted): ?>
        <div class="alert alert-success mt-4" role="alert">
          Your medical history has been successfully saved!
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php include '../attrib/footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll('.toggle-trigger').forEach(select => {
    const targetId = select.dataset.toggle;
    const target = document.getElementById(targetId + "-container");
    if (!target) return;

    const toggle = () => {
      if (select.value === "1") {
        target.style.display = 'flex';
      } else {
        target.style.display = 'none';
        const input = target.querySelector('input');
        if (input) input.value = '';
      }
    };

    select.addEventListener('change', toggle);
    toggle();
  });
});
</script>
</body>
</html>
