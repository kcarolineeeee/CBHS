<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Barangay Health Connect</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f8f9fa;
    }

    .hero {
      background-image: url('https://images.unsplash.com/photo-1580127252363-1d29a1ff0603?q=80&w=2070');
      background-size: cover;
      background-position: center;
      padding: 300px 0;
      position: relative;
      text-align: center;
      color: white;
    }

    .hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
      position: relative;
      z-index: 2;
    }

    .welcome-section {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 40px;
            margin-top: 50px;
        }

        .welcome-section h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #0d6efd;
        }

        .welcome-section p {
            font-size: 1.1rem;
            color: #333;
            line-height: 1.6;
        }

    a.btn-custom {
      background-color: #0d6efd;
      color: white !important;
      border: none !important;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
    }

    a.btn-custom:hover {
      background-color:#0d6efd;
      cursor: pointer;
    }

    .pulse {
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }

    .section-title {
      font-weight: 700;
      margin-bottom: 20px;
      color:#0d6efd;
    }

    .carousel-image {
      width: 100%;
      height: 300px;
      object-fit: cover;
      border-radius: 10px;
    }

    .rounded-card {
      border-radius: 1rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
    }

    .footer {
      background-color: #003840;
      color: white;
      padding: 40px 0;
    }

    .icon-box {
      font-size: 2.5rem;
      color: #00c9a7;
    }

    .health-tips-card {
      background-color: #ffffff;
      border-radius: 1rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
      padding: 20px;
      margin-bottom: 20px;
    }

    .health-tips-card h5 {
      font-weight: 700;
      color:#0d6efd;
    }

    .health-tips-card p {
      font-size: 1.1rem;
    }

  </style>
</head>
<body>
  <?php include './attrib/header.php'; ?>

  <!-- Hero Section -->
  <header class="hero">
    <div class="hero-content">
      <h1 class="display-4 fw-bold">Online Medical Consultation</h1>
      <p class="lead">Your health, our priority right from your home.</p>
      <a href="appointment-public.php" class="btn btn-primary btn-lg mt-3">Book an Appointment</a>
    </div>
  </header>

  <!-- Welcome Section -->
  <section class="container text-center mt-5 p-4 bg-white rounded-card welcome-section">
        <h2 class="section-title">Welcome to Barangay Health Connect</h2>
        <p>Our mission is to make healthcare accessible to all residents of our barangay. Get connected with licensed medical professionals for online consultations, prescriptions, and wellness advice from the comfort of your home.</p>
    </section>

    <!-- Services -->
    <section id="services" class="container mt-5">
    <h2 class="section-title text-center">Our Services</h2>
    <div class="row text-center">
        <div class="col-md-3 mb-4">
        <div class="bg-white p-4 rounded-card">
            <i class="bi bi-person-circle icon-box"></i>
            <h5 class="mt-3">Online Medical Consultation</h5>
            <p>Consult with licensed doctors online, safely and conveniently.</p>
            <a href="service-public.php#online-consultation" class="btn btn-custom">Read More</a>
        </div>
        </div>
        <div class="col-md-3 mb-4">
        <div class="bg-white p-4 rounded-card">
            <i class="bi bi-prescription icon-box"></i>
            <h5 class="mt-3">E-Prescriptions</h5>
            <p>Receive prescriptions directly on your device.</p>
            <a href="service-public.php#e-prescriptions" class="btn btn-custom">Read More</a>
        </div>
        </div>
        <div class="col-md-3 mb-4">
        <div class="bg-white p-4 rounded-card">
            <i class="bi bi-calendar-check icon-box"></i>
            <h5 class="mt-3">Appointment Scheduling</h5>
            <p>Book checkups with ease—no queues, no hassle.</p>
            <a href="service-public.php#appointment-scheduling" class="btn btn-custom">Read More</a>
        </div>
        </div>
        <div class="col-md-3 mb-4">
        <div class="bg-white p-4 rounded-card">
            <i class="bi bi-folder2-open icon-box"></i>
            <h5 class="mt-3">Patient Registration & Records</h5>
            <p>Securely store and access your health history online.</p>
            <a href="service-public.php#medical-records" class="btn btn-custom">Read More</a>
        </div>
        </div>
        <div class="col-md-3 mb-4">
        <div class="bg-white p-4 rounded-card">
            <i class="bi bi-clipboard2-pulse icon-box"></i>
            <h5 class="mt-3">Health Monitoring & Follow-Ups</h5>
            <p>Stay on track with your health through regular check-ins.</p>
            <a href="service-public.php#health-monitoring" class="btn btn-custom">Read More</a>
        </div>
        </div>
        <div class="col-md-3 mb-4">
        <div class="bg-white p-4 rounded-card">
            <i class="bi bi-exclamation-triangle icon-box"></i>
            <h5 class="mt-3">Emergency Triage Support</h5>
            <p>Get guidance on urgent symptoms before heading to the ER.</p>
            <a href="service-public.php#triage-support" class="btn btn-custom">Read More</a>
        </div>
        </div>
        <div class="col-md-3 mb-4">
        <div class="bg-white p-4 rounded-card">
            <i class="bi bi-journal-medical icon-box"></i>
            <h5 class="mt-3">Health Education & Awareness</h5>
            <p>Learn more about staying healthy with expert tips and news.</p>
            <a href="service-public.php#health-education" class="btn btn-custom">Read More</a>
        </div>
        </div>
        <div class="col-md-3 mb-4">
        <div class="bg-white p-4 rounded-card">
            <i class="bi bi-camera-video icon-box"></i>
            <h5 class="mt-3">Teleconsultation (Chat/Video Call)</h5>
            <p>Connect with doctors in real time via chat or video call.</p>
            <a href="service-public.php#teleconsultation" class="btn btn-custom">Read More</a>
        </div>
        </div>
    </div>
    </section>


  <!-- Blog Section -->
  <section id="blog" class="container mt-5">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div id="blogCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://ik.imagekit.io/tvlk/loc-asset/gNr3hLh55ZCkPJisyxFK-v9MmzxPu57ZRVI+10VZ2S4b1PNW4T++cbA6yK4gzhAhs9o2HLZ9vs7gy3rpcIU+oKi5EygzQLRjTUv7fRblEVA=/images/1525320105800.jpeg" class="carousel-image" alt="Blog 1">
            </div>
            <div class="carousel-item">
              <img src="https://gttp.images.tshiftcdn.com/357067/x/0/baguio.jpg" class="carousel-image" alt="Blog 2">
            </div>
            <div class="carousel-item">
              <img src="https://via.placeholder.com/400x400?text=Health+Blog" class="carousel-image" alt="Blog 3">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 p-4">
        <h2 class="section-title">Health Blog & Tips</h2>
        <p>Stay updated with the latest in community health, wellness tips, and local health drives. Empower your wellness journey with expert advice.</p>
        <a href="Blog-public.php" class="btn btn-custom">Read More</a>
      </div>
    </div>
  </section>

  <!-- Health Tips Section -->
  <section class="container mt-5 p-4 bg-white rounded-card">
    <h2 class="section-title text-center">Health Tips of the Week</h2>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="health-tips-card">
          <h5>Hot Temperature</h5>
          <p>🌞 Stay hydrated by drinking plenty of water. Avoid long exposure to direct sunlight. Wear lightweight, light-colored clothes.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="health-tips-card">
          <h5>Cold Temperature</h5>
          <p>🧣 Keep warm by wearing layers of clothing. Drink warm beverages like tea or soup. Avoid staying outside for long periods.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="health-tips-card">
          <h5>General Health Tips</h5>
          <p>💤 Get at least 7-8 hours of sleep to boost your immune system. 🧼 Wash your hands regularly. 🥦 Eat more fruits and vegetables!</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="health-tips-card">
          <h5>Common Illnesses in the Philippines</h5>
          <p>🤧 Flu and colds are common during the rainy season. Keep a distance from sick individuals and wash your hands frequently.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="health-tips-card">
          <h5>Dengue Prevention</h5>
          <p>🦟 Use mosquito repellents and eliminate stagnant water sources to prevent mosquito breeding. Wear long sleeves and pants when possible.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="health-tips-card">
            <h5>Prevent Heat Stroke</h5>
            <p>☀️ Stay in shaded or air-conditioned places, drink water frequently, and avoid strenuous outdoor activities during peak heat hours. Watch for dizziness or nausea.</p>
        </div>
      </div>
  </section>

  <!-- Testimonials Section -->
  <section id="testimonials" class="container mt-5 text-center">
    <h2 class="section-title">What Our Patients Say</h2>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="bg-white p-3 rounded-card">
          <p>"N/A"</p>
          <strong>- N/A</strong>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="bg-white p-3 rounded-card">
          <p>"N/A"</p>
          <strong>- N/A</strong>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="bg-white p-3 rounded-card">
          <p>"N/A"</p>
          <strong>- N/A</strong>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section id="faq" class="container mt-5">
    <h2 class="text-center fw-bold mb-4">Frequently Asked Questions</h2>
    <div class="accordion" id="faqAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
            How do I book an appointment?
          </button>
        </h2>
        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Click the "Book an Appointment" button on the homepage and fill out the form. You’ll be notified by SMS or email.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
            Are the doctors licensed?
          </button>
        </h2>
        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Yes, all our doctors are licensed and verified to provide medical consultations.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
            How does this website work?
          </button>
        </h2>
        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            After registration and login, users can consult doctors, schedule appointments, receive e-prescriptions, and message doctors directly.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
            Can I message the doctor after the consultation?
          </button>
        </h2>
        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Yes, you can continue messaging the doctor for follow-up questions after your consultation.
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include './attrib/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>