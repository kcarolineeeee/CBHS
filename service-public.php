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

        <!-- Primary Health Consultations -->
        <div class="row service-row align-items-center service-content mb-5"> 
            <div class="col-md-6 image-container"> 
                <img src="https://files01.pna.gov.ph/category-list/2024/03/12/bgo-philhealth-konsulta-package-first-patient-encounter-march-12-2024lta.jpg" alt="Primary Health Consultations" class="img-fluid rounded-3 mb-4 mb-md-0">
            </div>
            <div class="col-md-6">
                <h5 class="fw-bold mb-3" style="color: #0d6efd;">Primary Health Consultations</h5>
                <hr class="w-100 mb-3">
                <p>Visiting the health center for a primary consultation means you’re taking the first step toward feeling better.
                   Whether you’re dealing with a fever, cough, body aches, or just feeling off, our team is here to listen and help. 
                   You’ll be seen by a doctor or nurse who will talk with you about your symptoms, check your vital signs,
                   and provide the care you need. While it might not always be a serious illness, it’s important to have your concerns 
                   checked early to avoid complications. We’re also here for routine check-ups or advice on managing conditions like 
                   high blood pressure or diabetes. Don’t hesitate to ask questions, your health and peace of mind matter to us.</p>
            </div>
        </div>

        <!-- Immunizations -->
        <div class="row service-row align-items-center service-content mb-5">
            <div class="col-md-6 order-md-2 image-container"> 
                <img src="https://www.unicef.org/philippines/sites/unicef.org.philippines/files/styles/press_release_feature/public/UNIPH2019060_0.jpg.webp?itok=XCM2D3dS" alt="Immunizations" class="img-fluid rounded-3 mb-4 mb-md-0">
            </div>
            <div class="col-md-6 order-md-1">
                <h5 class="fw-bold mb-3" style="color: #0d6efd;">Immunizations</h5>
                <hr class="w-100 mb-3">
                <p>Vaccines are one of the most effective ways to protect yourself and your loved ones from dangerous diseases. 
                   Whether it's your child's first injections or your annual flu vaccine, we make the process easy and safe.  
                   Our experts will explain what each vaccine is for and when you need it.  It is acceptable to ask questions—many
                   parents and patients do.  We're here to provide you with the information you require while also ensuring that you
                   feel secure and at ease throughout the process.</p>
            </div>
        </div>

        <!-- Nutrition Programs -->
        <div class="row service-row align-items-center service-content mb-5">
            <div class="col-md-6 image-container"> 
                <img src="https://www.bworldonline.com/wp-content/uploads/2022/11/free-medicine.jpg" alt="Nutrition Programs" class="img-fluid rounded-3 mb-4 mb-md-0">
            </div>
            <div class="col-md-6">
                <h5 class="fw-bold mb-3" style="color: #0d6efd;"> Nutrition Programs </h5>
                <hr class="w-100 mb-3">
                <p>Good diet is the foundation of good health, particularly in children and mothers.  
                   If you're concerned about your weight, growth, or what meals to prepare, we've got
                   you covered.  Our team can help you track your child's progress, provide feeding 
                   suggestions, and even supply vitamin supplements as needed.  We also help underweight
                   or malnourished people through special nutrition programs.  You don't have to figure 
                   it out on your own; we're here to assist you establish healthy habits for your family.</p>
            </div>
        </div>

        <!-- Environmental and Sanitation Services -->
        <div class="row service-row align-items-center service-content mb-5">
            <div class="col-md-6 order-md-2 image-container"> 
                <img src="https://cdn.who.int/media/images/default-source/imported/children-water.jpg" alt="Environmental and Sanitation Services" class="img-fluid rounded-3 mb-4 mb-md-0">
            </div>
            <div class="col-md-6 order-md-1">
                <h5 class="fw-bold mb-3" style="color: #0d6efd;">Environmental and Sanitation Services</h5>
                <hr class="w-100 mb-3">
                <p>Maintaining cleanliness in our environment is just as important as being healthy ourselves. 
                   That's why we collaborate with the community to promote safe drinking water, clean-up campaigns,
                   and disease prevention measures like dengue and leptospirosis.  We think that a clean environment 
                   protects everyone, particularly children and the elderly.  If you have any issues regarding water 
                   safety, or garbage disposal, we are here to assist and advise you</p>
            </div>
        </div>


         <!-- Health Education  -->
         <div class="row service-row align-items-center service-content mb-5">
            <div class="col-md-6 image-container"> 
                <img src="https://scontent.fmnl17-2.fna.fbcdn.net/v/t39.30808-6/464141573_9049136085097563_3412203625803236568_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=cf85f3&_nc_ohc=b6KjiKVgbqcQ7kNvwE4jM-a&_nc_oc=Admd70ZDaKUUTulQH_S9fd9LgUTre7JJT8OGwrOtJmJ_D_-PyZ8zafEVI9e5lf1Q45I&_nc_zt=23&_nc_ht=scontent.fmnl17-2.fna&_nc_gid=31e4E7YQ6uuXo-0kozO_gg&oh=00_AfHOLsORzpC6VOHfZwkma0DtkBpTTtYPW87x90wWu3q4zw&oe=680D94CC" alt="Health Education" class="img-fluid rounded-3 mb-4 mb-md-0">
            </div>
            <div class="col-md-6">
                <h5 class="fw-bold mb-3" style="color: #0d6efd;">Health Education </h5>
                <hr class="w-100 mb-3">
                <p>Making healthier health decisions can sometimes be as simple as having the appropriate information.  
                   Our health education programs are designed to empower you, whether you're learning how to eat healthier,
                   avoid diseases, manage stress, or care for chronic medical conditions.  We provide helpful recommendations 
                   in straightforward manner and welcome queries. It's your health; we're just here to assist guide you.</p>
            </div>
        </div>

        <!-- Family Planning -->
        <div class="row service-row align-items-center service-content mb-5">
            <div class="col-md-6 order-md-2 image-container"> 
                <img src="https://philippines.unfpa.org/sites/default/files/JennyHilario_0.jpg" alt="Family Planning" class="img-fluid rounded-3 mb-4 mb-md-0">
            </div>
            <div class="col-md-6 order-md-1">
                <h5 class="fw-bold mb-3" style="color: #0d6efd;">Family Planning</h5>
                <hr class="w-100 mb-3">
                <p>Planning a family is a personal and significant decision, and we are here to help you with respect and care. 
                   If you're looking for birth control alternatives, considering spacing pregnancies, or simply want to learn more,
                   we'll give you with clear, discreet, and judgment-free information.  You might inquire about pills, injectables, 
                   IUDs, or natural treatments that suit your lifestyle and values.  We'll assist you in making the greatest decision 
                   for both you and your spouse.</p>
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
