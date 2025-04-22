<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Services</title>

    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        h2, h5 {
            font-family: 'Merriweather', serif;
        }

        .service-content {
            margin-top: 70px; 
            padding: 20px 0; 
            display: flex;
            align-items: center;
        }

        .service-content .col-md-6 {
            transform: translateX(-100%);
            opacity: 0;
            transition: transform 0.8s ease-out, opacity 0.8s ease-out;
            padding: 20px; 
        }

        .service-content .col-md-6:nth-child(2) {
            transform: translateX(100%);
        }

        .service-content.show .col-md-6 {
            transform: translateX(0);
            opacity: 1;
        }

        .service-content .image-container {
            display: flex;
            justify-content: center;
        }

        .service-content img {
            transition: transform 0.3s ease;
            max-width: 70%;
            height: auto;
            margin-bottom: 30px; 
        }

        .service-content img:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

    </style>
</head>
<body>

    <?php include './attrib/header.php'; ?>

    <div class="container py-5">
        <h2 class="text-center mb-4 fw-bold display-5 text-uppercase">OUR <span style="color: #0d6efd;">SERVICES</span></h2>
        <hr class="w-25 mx-auto mb-5">

        <!-- Online Medical Consultation -->
        <div class="row service-row align-items-center service-content mb-5"> 
            <div class="col-md-6 image-container"> 
                <img src="https://storage.googleapis.com/studio-cms-assets/projects/Jgqe6pzBak/s-2400x1600_v-frms_webp_f88ab923-ffc7-4deb-98b5-c81a9ca89083_middle.webp" alt="Online Medical Consultation" class="img-fluid rounded-3 mb-4 mb-md-0">
            </div>
            <div class="col-md-6">
                <h5 class="fw-bold mb-3" style="color: #0d6efd;">Online Medical Consultation</h5>
                <hr class="w-100 mb-3">
                <p>Online consultations allow you to see your usual medical professional from the comfort of your own home or workplace.
                    It won't be all that different from your typical visit because you will be speaking with the doctor in person. We will
                    carefully listen to your concerns even though we are unable to perform physical examinations like testing or listening
                    to your heartbeat. Feel free to ask any questions you may have.</p>
            </div>
        </div>

        <!-- E-Prescriptions -->
        <div class="row service-row align-items-center service-content mb-5">
            <div class="col-md-6 order-md-2 image-container"> 
                <img src="https://img.freepik.com/premium-photo/male-doctor-hand-hold-prescription_151013-12053.jpg" alt="E-Prescriptions" class="img-fluid rounded-3 mb-4 mb-md-0">
            </div>
            <div class="col-md-6 order-md-1">
                <h5 class="fw-bold mb-3" style="color: #0d6efd;">E-Prescriptions</h5>
                <hr class="w-100 mb-3">
                <p>Our system makes it super easy to get your meds through E-Prescriptions.
                    Doctors can send prescriptions directly through the platform, so you can
                    get them safely and quickly from any pharmacy you choose. Plus, it keeps
                    a digital record of all your prescriptions, so you don’t have to worry about losing them!</p>
            </div>
        </div>

        <!-- Appointment Scheduling -->
        <div class="row service-row align-items-center service-content mb-5">
            <div class="col-md-6 image-container"> 
                <img src="https://img.freepik.com/premium-photo/doctor-with-stethoscope-writing-with-pen-about-patient-treatment-scheduling-appointments-woman-lab-coat-sitting-table-with-laptop-health-care-medicine-concept_361816-4910.jpg" alt="Appointment Scheduling" class="img-fluid rounded-3 mb-4 mb-md-0">
            </div>
            <div class="col-md-6">
                <h5 class="fw-bold mb-3" style="color: #0d6efd;">Appointment Scheduling</h5>
                <hr class="w-100 mb-3">
                <p>Our Appointment Scheduling function makes it simple to manage your medical visits.
                    View available times, schedule organize your doctor's appointments online, and
                    get timely reminders. You have complete control over your healthcare schedule by
                    being able to easily rearrange or withdraw appointments.</p>
            </div>
        </div>

        <!-- Patient Registration and Medical Records -->
        <div class="row service-row align-items-center service-content mb-5">
            <div class="col-md-6 order-md-2 image-container"> 
                <img src="https://caas.athenahealth.com/sites/default/files/2024/11/Patientportal_benefits_Hero_1080x607.png" alt="Patient Registration" class="img-fluid rounded-3 mb-4 mb-md-0">
            </div>
            <div class="col-md-6 order-md-1">
                <h5 class="fw-bold mb-3" style="color: #0d6efd;">Patient Registration and Medical Records</h5>
                <hr class="w-100 mb-3">
                <p>Our Patient Registration system is simple and secure, designed to make your healthcare experience a lot easier.
                    When you sign up, you’ll create a digital health profile that holds all your important medical information in one place.
                    You can store things like your contact details, medical history, allergies, medications, and more, making it easy
                    to keep track of everything whenever you need it.</p>
            </div>
        </div>

        <!-- Health Monitoring and Follow-ups -->
        <div class="row service-row align-items-center service-content mb-5">
            <div class="col-md-6 image-container"> 
                <img src="https://media.assettype.com/gulfnews/import/2020/02/04/200204-doctor_1700ebe6a0c_large.jpg?w=1200&h=675&auto=format,compress&fit=max&enlarge=true" alt="Health Monitoring and Follow-ups" class="img-fluid rounded-3 mb-4 mb-md-0">
            </div>
            <div class="col-md-6">
                <h5 class="fw-bold mb-3" style="color: #0d6efd;">Health Monitoring and Follow-ups</h5>
                <hr class="w-100 mb-3">
                <p>With our Health Monitoring and Follow-up service, we’re all about being proactive with your care.
                    By regularly checking in on your health and offering quick support, we aim to keep you in great
                    shape especially if you’re dealing with long-term conditions, pregnancy, or recovering from a
                    previous medication or treatments</p>
            </div>
        </div>

        <!-- Emergency Triage Support -->
        <div class="row service-row align-items-center service-content mb-5">
            <div class="col-md-6 order-md-2 image-container"> 
                <img src="https://img.freepik.com/premium-photo/tablet-typing-doctor-hands-hospital-clinic-management-healthcare-software-research-search-online-services-night-review-medical-professional-worker-digital-technology_590464-215059.jpg" alt="Emergency Triage Support" class="img-fluid rounded-3 mb-4 mb-md-0">
            </div>
            <div class="col-md-6 order-md-1">
                <h5 class="fw-bold mb-3" style="color: #0d6efd;">Emergency Triage Support</h5>
                <hr class="w-100 mb-3">
                <p>The purpose of our user-friendly and safe Patient Registration and Profile Management system
                    is to make your medical experience more efficient. A unique digital health profile, which
                    serves as a central repository for all of your medical data, will be created for you upon
                    registration. Your contact information, medical history, allergies, current medications,
                    and previous illnesses are just a few of the important details you can easily keep and
                    manage with this profile.</p>
            </div>
        </div>

        <!-- Health Education and Awareness -->
        <div class="row service-row align-items-center service-content mb-5">
            <div class="col-md-6 image-container"> 
                <img src="https://agedcareguide-assets.imgix.net/news/articles/wp/Getdeadset.jpg?fm=pjpg&w=1200&h=640&q=65" alt="Health Education and Awareness" class="img-fluid rounded-3 mb-4 mb-md-0">
            </div>
            <div class="col-md-6">
                <h5 class="fw-bold mb-3" style="color: #0d6efd;">Health Education and Awareness</h5>
                <hr class="w-100 mb-3">
                <p>We take care of your health not just throughout consultations and therapies,
                    but also by assisting you in making wise decisions regarding your health.
                    Our Health Education & Awareness service makes useful information that
                    encourages healthy living and warns off illness easily accessible.
                    We go over essential topics like cleanliness, providing you with helpful
                    advice on handwashing, sanitation, and other methods to protect your family
                    from diseases. Along with sharing the most recent information on immunizations,
                    we also address frequently asked issues, explain their significance, and offer
                    recommended injection regimens.</p>
            </div>
        </div>

        <!-- Teleconsultation -->
        <div class="row service-row align-items-center service-content mb-5">
            <div class="col-md-6 order-md-2 image-container"> 
                <img src="https://img.freepik.com/free-photo/medium-shot-employee-holding-tablet_23-2149045998.jpg" alt="Teleconsultation" class="img-fluid rounded-3 mb-4 mb-md-0">
            </div>
            <div class="col-md-6 order-md-1">
                <h5 class="fw-bold mb-3" style="color: #0d6efd">Teleconsultation (Chat/Video Call)</h5>
                <hr class="w-100 mb-3">
                <p>With the help of technology, our teleconsultation service provides healthcare to you.
                    Through video conversations and chat, you may communicate with medical professionals
                    and receive diagnosis and guidance from the comfort of your own home. You won't have
                    to waste time traveling to the clinic just to get consultation from a professional.</p>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const serviceContents = document.querySelectorAll('.service-content');
            serviceContents.forEach((content, index) => {
                setTimeout(() => {
                    content.classList.add('show');
                }, 200 * index);
            });
        });
    </script>

    <?php include './attrib/footer.php'; ?>

</body>
</html>
