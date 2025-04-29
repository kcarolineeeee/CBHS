<?php
    include 'Header.php';
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       :root {
        --primary-blue: #1a73e8;
        --light-blue: #e8f0fe;
        --dark-blue: #0d47a1;
        --text-dark: #333333;
        }

        body {
        background-color: #ffffff;
        color: var(--text-dark);
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        }

        .section-title {
        color: var(--primary-blue);
        display: inline-block;
        padding: 5px 15px;
        }

        .form-label {
        color: var(--primary-blue);
        font-weight: 600;
        }

        .form-control,
        .form-select {
        border-radius: 8px;
        border: 1px solid #d0e1fd;
        }

        .btn-blue {
        background-color: var(--primary-blue);
        color: white;
        border: none;
        border-radius: 8px;
        }

        .btn-blue:hover {
        background-color: var(--dark-blue);
        }

        .appointment-section {
        padding: 50px 0;
        padding-bottom: 20%;
        background-color: #fafbfe;
        flex-grow: 1;
        }

                
    </style>

</head>
<body>

<section class="appointment-section">
  <div class="container">
    <div class="text-center mb-4">
      <h1 class="section-title">Appointment Booking</h1>
      <p class="text-muted">Please fill out the form below to schedule your appointment with our health center. All fields are required.</p>
    </div>

    <form method="POST" class="row g-3">

      <div class="col-md-6">
        <label for="specialty" class="form-label">Doctor's Specialty:</label>
        <select class="form-select" name="specialty" required>
          <option value="">Select Specialty</option>
          <option value="1">Psychiatry</option>
          <option value="2">General Medicine</option>
          <option value="3">Dermatology</option>
          <option value="4">Pediatrics</option>
          <option value="5">Cardiology</option>
          <option value="6">Dental</option>
        </select>
      </div>

      <div class="col-md-6">
        <label for="doctors" class="form-label">Doctor:</label>
        <select class="form-select" name="doctors" required>
          <option value="">Select Doctor</option>
          <option value="d1">Dr. Maria Rivera</option>
          <option value="d2">Dr. Shalom Harlow</option>
          <option value="d3">Dr. Karla Atienza</option>
        </select>
      </div>

      <div class="col-md-6">
        <label for="date" class="form-label">Date:</label>
        <input type="date" class="form-control" name="date" required>
      </div>

      <div class="col-md-6">
        <label for="time" class="form-label">Time:</label>
        <input type="time" class="form-control" name="time" required>
      </div>

      <div class="col-md-6">
        <label for="type" class="form-label">Appointment Type:</label>
        <select class="form-select" name="type" required>
          <option value="video">Video Call</option>
          <option value="phone">Phone Call</option>
          <option value="in_person">In-Person</option>
        </select>
      </div>

      <div class="col-md-6">
        <label for="notification" class="form-label">Notification Preference:</label>
        <select class="form-select" name="notification" required>
          <option value="email">Email</option>
          <option value="sms">SMS</option>
          <option value="app">App Notification</option>
        </select>
      </div>

      <div class="col-12">
        <label for="reason" class="form-label">Reason for Visit:</label>
        <textarea class="form-control" name="reason" placeholder="Describe your symptoms..." rows="4" required></textarea>
      </div>

      <div class="col-12 text-center">
        <button type="submit" name="confirm" class="btn btn-blue px-4">Confirm Booking</button>
      </div>
    </form>

    <div class="alert alert-info mt-5" role="alert">
      <strong>Reminder:</strong> If you experience emergency symptoms (e.g. chest pain, severe bleeding), please go to the nearest hospital or call 911 immediately.
    </div>
  </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php
    
    include 'footer.php';
?>
</html>
