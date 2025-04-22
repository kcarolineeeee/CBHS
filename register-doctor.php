<?php
include "dbconfig.php";

$errors = [];

function getValue($field) {
    return isset($_POST[$field]) ? htmlspecialchars($_POST[$field]) : '';
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $password = $_POST["Password"];
    $rePassword = $_POST["Re-Password"];

    if ($password !== $rePassword) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        try {
            $pdo->beginTransaction();

            $stmt = $pdo->prepare("INSERT INTO doctor 
                (Firstname, MI, Lastname, Extension, Birthdate, Sex, Email, ContactNum, Address, LicenseNum, Specialization, Password)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->execute([
                $_POST['Firstname'], $_POST['MI'], $_POST['Lastname'], $_POST['Extension'],
                $_POST['Birthdate'], $_POST['Sex'], $_POST['Email'], $_POST['ContactNum'], $_POST['Address'],
                $_POST['LicenseNum'], $_POST['Specialization'], password_hash($password, PASSWORD_DEFAULT)
            ]);

            $doctorId = $pdo->lastInsertId();

            // Experiences
            $companies = $_POST['CompanyName'] ?? [];
            $startYears = $_POST['YearStarted'] ?? [];
            $endYears = $_POST['YearEnded'] ?? [];
            $positions = $_POST['Position'] ?? [];

            $expStmt = $pdo->prepare("INSERT INTO doctor_experience (DocID, CompanyName, YearStarted, YearEnded, Position) VALUES (?, ?, ?, ?, ?)");
            for ($i = 0; $i < count($companies); $i++) {
                if (!empty($companies[$i])) {
                    $expStmt->execute([
                        $doctorId,
                        $companies[$i],
                        $startYears[$i],
                        $endYears[$i],
                        $positions[$i]
                    ]);
                }
            }

            // Clinics
            $clinicNames = $_POST['ClinicName'] ?? [];
            $clinicAddresses = $_POST['ClinicAddress'] ?? [];
            $clinicContacts = $_POST['ClinicContact'] ?? [];

            $clinicStmt = $pdo->prepare("INSERT INTO clinics (DocID, ClinicName, ClinicAddress, ClinicContact) VALUES (?, ?, ?, ?)");
            for ($i = 0; $i < count($clinicNames); $i++) {
                if (!empty($clinicNames[$i])) {
                    $clinicStmt->execute([
                        $doctorId,
                        $clinicNames[$i],
                        $clinicAddresses[$i],
                        $clinicContacts[$i]
                    ]);
                }
            }

            $pdo->commit();

            echo "<p style='color:green;'>Doctor registered successfully!</p>";
            // Clear form inputs after successful registration
            $_POST = [];
        } catch (Exception $e) {
            $pdo->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctor Registration</title>
</head>
<body>
    <h1>Register a Doctor</h1>

    <?php
    if (!empty($errors)) {
        foreach ($errors as $err) {
            echo "<p style='color:red;'>$err</p>";
        }
    }
    ?>

    <form method="POST">
        <h3>Personal Information</h3>
        <input type="text" name="Firstname" placeholder="First Name" value="<?= getValue('Firstname') ?>" required>
        <input type="text" name="MI" placeholder="Middle Initial" value="<?= getValue('MI') ?>">
        <input type="text" name="Lastname" placeholder="Last Name" value="<?= getValue('Lastname') ?>" required>
        <input type="text" name="Extension" placeholder="Extension" value="<?= getValue('Extension') ?>">
        <input type="date" name="Birthdate" value="<?= getValue('Birthdate') ?>">
        <select name="Sex">
            <option value="Male" <?= getValue('Sex') === 'Male' ? 'selected' : '' ?>>Male</option>
            <option value="Female" <?= getValue('Sex') === 'Female' ? 'selected' : '' ?>>Female</option>
            <option value="Other" <?= getValue('Sex') === 'Other' ? 'selected' : '' ?>>Other</option>
        </select>
        <input type="email" name="Email" placeholder="Email" value="<?= getValue('Email') ?>">
        <input type="text" name="ContactNum" placeholder="Contact Number" value="<?= getValue('ContactNum') ?>">
        <input type="text" name="Address" placeholder="Address" value="<?= getValue('Address') ?>">
        <input type="text" name="LicenseNum" placeholder="License Number" value="<?= getValue('LicenseNum') ?>">
        <input type="text" name="Specialization" placeholder="Specialization" value="<?= getValue('Specialization') ?>">

        <h3>Experience/s</h3>
        <div id="experienceContainer">
            <?php
            $count = count($_POST['CompanyName'] ?? []);
            if ($count == 0) $count = 1;
            for ($i = 0; $i < $count; $i++): ?>
                <div class="experience-group">
                    <input type="text" name="CompanyName[]" placeholder="Company Name" value="<?= $_POST['CompanyName'][$i] ?? '' ?>">
                    <input type="number" name="YearStarted[]" placeholder="Year Started" value="<?= $_POST['YearStarted'][$i] ?? '' ?>">
                    <input type="number" name="YearEnded[]" placeholder="Year Ended" value="<?= $_POST['YearEnded'][$i] ?? '' ?>">
                    <input type="text" name="Position[]" placeholder="Position" value="<?= $_POST['Position'][$i] ?? '' ?>">
                </div>
            <?php endfor; ?>
        </div>
        <button type="button" onclick="addExperience()">Add Experience</button>

        <h3>Clinic Information (Optional)</h3>
        <div id="clinicContainer">
            <?php
            $clinicCount = count($_POST['ClinicName'] ?? []);
            if ($clinicCount == 0) $clinicCount = 1;
            for ($i = 0; $i < $clinicCount; $i++): ?>
                <div class="clinic-group">
                    <input type="text" name="ClinicName[]" placeholder="Clinic Name" value="<?= $_POST['ClinicName'][$i] ?? '' ?>">
                    <input type="text" name="ClinicAddress[]" placeholder="Clinic Address" value="<?= $_POST['ClinicAddress'][$i] ?? '' ?>">
                    <input type="text" name="ClinicContact[]" placeholder="Clinic Contact" value="<?= $_POST['ClinicContact'][$i] ?? '' ?>">
                </div>
            <?php endfor; ?>
        </div>
        <button type="button" onclick="addClinic()">Add Clinic</button>

        <h3>Security</h3>
        <input type="password" name="Password" placeholder="Password">
        <input type="password" name="Re-Password" placeholder="Re-enter Password">

        <br><br>
        <button type="submit">Submit</button>
    </form>

    <script>
        function addExperience() {
            const container = document.getElementById("experienceContainer");
            const html = `
                <div class="experience-group">
                    <hr>
                    <input type="text" name="CompanyName[]" placeholder="Company Name">
                    <input type="number" name="YearStarted[]" placeholder="Year Started">
                    <input type="number" name="YearEnded[]" placeholder="Year Ended">
                    <input type="text" name="Position[]" placeholder="Position">
                </div>`;
            container.insertAdjacentHTML("beforeend", html);
        }

        function addClinic() {
            const container = document.getElementById("clinicContainer");
            const html = `
                <div class="clinic-group">
                    <hr>
                    <input type="text" name="ClinicName[]" placeholder="Clinic Name">
                    <input type="text" name="ClinicAddress[]" placeholder="Clinic Address">
                    <input type="text" name="ClinicContact[]" placeholder="Clinic Contact">
                </div>`;
            container.insertAdjacentHTML("beforeend", html);
        }
    </script>
</body>
</html>
