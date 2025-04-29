<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Barangay Health Connect</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!--icon link-->

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

   
<!-- Services Section -->
<section id="services" class="container mt-5">
  <h2 class="section-title text-center">Our Services</h2>
  <div class="row text-center">
    <!-- First row of 3 boxes -->
    <div class="col-md-4 mb-4">
      <div class="bg-white p-4 rounded-card d-flex flex-column" style="height: 100%;">
        <div class="d-flex justify-content-center align-items-center" style="flex-grow: 1;">
          <i class="fas fa-stethoscope mb-4" style="font-size: 50px; color: #0d6efd;"></i>
        </div>
        <h5>Primary Health Consultations</h5>
        <p>Consult with doctors from the comfort of your home.</p>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="bg-white p-4 rounded-card d-flex flex-column" style="height: 100%;">
        <div class="d-flex justify-content-center align-items-center" style="flex-grow: 1;">
          <i class="fas fa-shield-alt mb-4" style="font-size: 50px; color: #0d6efd;"></i>
        </div>
        <h5>Immunizations</h5>
        <p>Access medical records online and securely.</p>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="bg-white p-4 rounded-card d-flex flex-column" style="height: 100%;">
        <div class="d-flex justify-content-center align-items-center" style="flex-grow: 1;">
          <i class="fas fa-apple-alt mb-4" style="font-size: 50px; color: #0d6efd;"></i>
        </div>
        <h5>Nutrition Programs</h5>
        <p>Monitor your health status remotely with our tools.</p>
      </div>
    </div>

    <!-- Second row of 3 boxes -->
    <div class="col-md-4 mb-4">
      <div class="bg-white p-4 rounded-card d-flex flex-column" style="height: 100%;">
        <div class="d-flex justify-content-center align-items-center" style="flex-grow: 1;">
          <i class="fas fa-hands-helping mb-4" style="font-size: 50px; color: #0d6efd;"></i>
        </div>
        <h5>Environmental and Sanitation Services</h5>
        <p>Ensure environmental health and sanitation standards.</p>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="bg-white p-4 rounded-card d-flex flex-column" style="height: 100%;">
        <div class="d-flex justify-content-center align-items-center" style="flex-grow: 1;">
          <i class="fas fa-book-open mb-4" style="font-size: 50px; color: #0d6efd;"></i>
        </div>
        <h5>Health Education</h5>
        <p>Learn more about staying healthy with expert advice.</p>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="bg-white p-4 rounded-card d-flex flex-column" style="height: 100%;">
        <div class="d-flex justify-content-center align-items-center" style="flex-grow: 1;">
          <i class="fas fa-heart mb-4" style="font-size: 50px; color: #0d6efd;"></i>
        </div>
        <h5>Family Planning</h5>
        <p>Access family planning services for healthier living.</p>
      </div>
    </div>
  </div>

  <!-- See More Button -->
  <div class="text-center mt-4">
    <a href="service-public.php" class="btn btn-primary btn-sm">See More</a>
  </div>
</section>


  <!-- Blog Section -->
  <section id="blog" class="container mt-5">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div id="blogCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item">
              <img src="https://gttp.images.tshiftcdn.com/357067/x/0/baguio.jpg" class="carousel-image" alt="Blog 2">
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
  <section id="faq" class="container mt-5" style="margin-bottom: 40px;">
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
