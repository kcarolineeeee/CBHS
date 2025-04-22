<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Barangay Ambiong Health Center</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        
        /* Blog Section Styles */
        .page-title-area {
            background-color: var(--light-blue);
            padding: 50px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .page-title-area::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(26,115,232,0.1) 0%, rgba(255,255,255,0) 70%);
        }
        
        .page-title {
            font-size: 36px;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 10px;
            position: relative;
        }
        
        .breadcrumb-item {
            font-size: 16px;
            color: var(--primary-blue);
        }
        
        .breadcrumb-item.active {
            color: var(--text-dark);
        }
        
        .blog-section {
            padding: 80px 0;
        }
        
        .section-heading {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .section-heading h2 {
            font-size: 32px;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        .section-heading h2::after {
            content: '';
            position: absolute;
            width: 50%;
            height: 3px;
            background-color: var(--primary-blue);
            bottom: -10px;
            left: 25%;
        }
        
        .section-heading p {
            color: #666;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .blog-card {
            border: 1px solid #e6e6e6;
            border-radius: 8px;
            margin-bottom: 30px;
            background-color: #ffffff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        
        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,105,225,0.1);
        }
        
        .blog-image {
            width: 100%;
            height: 200px;
            overflow: hidden;
            position: relative;
        }
        
        .blog-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .blog-card:hover .blog-image img {
            transform: scale(1.1);
        }
        
        .blog-category {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--primary-blue);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .blog-content {
            padding: 20px;
        }
        
        .blog-meta {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 10px;
        }
        
        .blog-meta span {
            margin-right: 15px;
            font-size: 13px;
            color: #777;
        }
        
        .blog-meta i {
            color: var(--primary-blue);
            margin-right: 5px;
        }
        
        .blog-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--dark-blue);
        }
        
        .blog-title a {
            color: var(--dark-blue);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .blog-title a:hover {
            color: var(--primary-blue);
        }
        
        .blog-excerpt {
            color: #555;
            margin-bottom: 20px;
            font-size: 15px;
            line-height: 1.6;
        }
        
        .read-more {
            display: inline-block;
            padding: 8px 20px;
            background-color: var(--light-blue);
            color: var(--primary-blue);
            border-radius: 4px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .read-more:hover {
            background-color: var(--primary-blue);
            color: white;
        }
        
        /* Custom navbar modifications */
        .navbar-header {
            display: flex;
            justify-content: space-between;
            width: 100%;
            align-items: center;
        }
        
        .brand-container {
            display: flex;
            align-items: center;
            flex: 1;
        }
        
        /* Modal Styles */
        .modal-content {
            border-radius: 10px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .modal-header {
            background-color: var(--light-blue);
            border-bottom: none;
            padding: 20px 30px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        
        .modal-title {
            color: var(--dark-blue);
            font-weight: 700;
        }
        
        .modal-body {
            padding: 30px;
        }
        
        .modal-footer {
            border-top: none;
            padding: 15px 30px 25px;
        }
        
        .btn-close-modal {
            background-color: var(--primary-blue);
            color: white;
            padding: 8px 25px;
            border-radius: 4px;
            border: none;
            transition: all 0.3s ease;
        }
        
        .btn-close-modal:hover {
            background-color: var(--dark-blue);
        }
        
        .article-image {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .article-meta {
            display: flex;
            margin-bottom: 20px;
        }
        
        .article-meta span {
            margin-right: 20px;
            color: #777;
            font-size: 14px;
        }
        
        .article-content {
            color: #444;
            font-size: 16px;
            line-height: 1.8;
        }
        
        .article-content p {
            margin-bottom: 20px;
        }
        
        .article-content h4 {
            color: var(--dark-blue);
            margin-top: 30px;
            margin-bottom: 15px;
            font-weight: 600;
        }
        
        /* Responsive adjustments */
        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 0.85rem;
                white-space: normal;
            }
            
            .logo {
                width: 40px;
                height: 40px;
                min-width: 40px;
            }
            
            .page-title {
                font-size: 28px;
            }
            
            .section-heading h2 {
                font-size: 26px;
            }
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
    <!-- Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <h1 class="page-title">Latest Health Articles</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center bg-transparent">
                    <li class="breadcrumb-item"><a href="Home.php" style="text-decoration: none;">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Blog Section -->
    <section class="blog-section">
        <div class="container">
            <div class="section-heading">
                <h2>Health & Wellness Blog</h2>
                <p>Stay informed with the latest health tips, community updates, and medical advice from our healthcare professionals serving Barangay Ambiong in Baguio City.</p>
            </div>
            
            <div class="row">
                <!-- Blog Post 1 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Family Health Tips">
                            <span class="blog-category">Family Health</span>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="far fa-calendar"></i> April 15, 2025</span>
                                <span><i class="far fa-user"></i> Dr. Santos</span>
                            </div>
                            <h3 class="blog-title"><a href="#" data-bs-toggle="modal" data-bs-target="#article1Modal">Essential Health Tips for Ambiong Families</a></h3>
                            <div class="blog-excerpt">
                                <p>Discover the most effective health practices tailored for families in Baguio City's highland climate. Learn about nutrition, exercise, and preventive care specifically for our community.</p>
                            </div>
                            <a class="read-more" data-bs-toggle="modal" data-bs-target="#article1Modal">Read Article</a>
                        </div>
                    </div>
                </div>
                
                <!-- Blog Post 2 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXX-w39Zrx8rEda-dMh2EibDZ-uYHc0xvMC_5FplQXeA&s&ec=72940543" alt="Vaccination Updates">
                            <span class="blog-category">Immunization</span>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="far fa-calendar"></i> April 10, 2025</span>
                                <span><i class="far fa-user"></i> Nurse Reyes</span>
                            </div>
                            <h3 class="blog-title"><a href="#" data-bs-toggle="modal" data-bs-target="#article2Modal">Vaccination Schedule for Barangay Ambiong</a></h3>
                            <div class="blog-excerpt">
                                <p>Important updates on vaccination schedules available at our health center. Learn about our upcoming immunization drives and how to register for these essential health services.</p>
                            </div>
                            <a class="read-more" data-bs-toggle="modal" data-bs-target="#article2Modal">Read Article</a>
                        </div>
                    </div>
                </div>
                
                <!-- Blog Post 3 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_rzehSINz_TsbfVkbtAX62OHSNZiAD_S_hwR1vPM5dg&s&ec=72940543" alt="Mental Health">
                            <span class="blog-category">Mental Health</span>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="far fa-calendar"></i> April 5, 2025</span>
                                <span><i class="far fa-user"></i> Dr. Cruz</span>
                            </div>
                            <h3 class="blog-title"><a href="#" data-bs-toggle="modal" data-bs-target="#article3Modal">Mental Health Resources in Baguio City</a></h3>
                            <div class="blog-excerpt">
                                <p>Discover mental health support services available for Ambiong residents. Find resources, community events, and professional support available in our barangay for all age groups.</p>
                            </div>
                            <a class="read-more" data-bs-toggle="modal" data-bs-target="#article3Modal">Read Article</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- More posts button -->
            <div class="text-center mt-4">
                <a href="#" class="btn btn-login">View More Articles</a>
            </div>
        </div>
    </section>

    <!-- Article 1 Modal -->
    <div class="modal fade" id="article1Modal" tabindex="-1" aria-labelledby="article1ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="article1ModalLabel">Essential Health Tips for Ambiong Families</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Family Health" class="article-image">
                    
                    <div class="article-meta">
                        <span><i class="far fa-calendar"></i> April 15, 2025</span>
                        <span><i class="far fa-user"></i> Dr. Santos</span>
                        <span><i class="far fa-folder"></i> Family Health</span>
                    </div>
                    
                    <div class="article-content">
                        <p>Living in Baguio City's highland climate presents unique health considerations for families in Barangay Ambiong. The cooler temperatures, higher altitude, and seasonal variations require specific approaches to family health and wellness. Here are essential health practices tailored specifically for our community.</p>
                        
                        <h4>Nutrition Adapted to Highland Living</h4>
                        <p>Families in Ambiong should focus on locally available, nutrient-dense foods that support health in cooler climates. Include plenty of fresh vegetables from local markets, with emphasis on green leafy vegetables like cabbage, broccoli, and Baguio beans. Incorporate root vegetables like potatoes, carrots, and turnips which provide essential carbohydrates and nutrients. Make sure to include sufficient protein from fish, lean meats, beans, and eggs to maintain energy levels in the cooler weather.</p>
                        
                        <h4>Hydration Despite the Cool Climate</h4>
                        <p>Even though the highland climate doesn't make you feel as thirsty as lowland areas, proper hydration remains crucial. Families should aim for 8-10 glasses of water daily. Warm drinks like herbal teas can be excellent alternatives that provide both hydration and warmth during cooler days. Avoid excessive caffeine and sugary drinks that can impact health and sleep quality.</p>
                        
                        <h4>Exercise Adapted to Altitude</h4>
                        <p>Physical activity at Baguio's higher altitude requires gradual adaptation. Begin with less intense activities and progressively increase duration and intensity. Take advantage of the numerous parks and open spaces in and around Ambiong for family walks and outdoor activities. Indoor exercises are also important during rainy seasons - simple activities like stretching, dancing, or yoga can be done at home.</p>
                        
                        <h4>Respiratory Health Protection</h4>
                        <p>The combination of cooler temperatures and occasional fog can affect respiratory health. Ensure homes are well-ventilated while maintaining comfortable temperatures. Reduce indoor pollution by avoiding smoking and using proper ventilation when cooking. Consider using humidifiers during particularly dry periods to maintain healthy airways.</p>
                        
                        <h4>Mental Wellness in the Community</h4>
                        <p>Take advantage of Ambiong's strong community bonds to support family mental health. Participate in community activities and gatherings that foster social connections. Spend time outdoors in nature, which has proven benefits for mental wellbeing. Practice mindfulness and relaxation techniques as a family to manage stress and anxiety.</p>
                        
                        <h4>Preventive Healthcare Schedule</h4>
                        <p>Regular check-ups at Barangay Ambiong Health Center are essential for preventive care. Schedule annual physical examinations for all family members. Keep vaccinations up-to-date according to the Department of Health recommendations. Take advantage of free health screenings offered regularly at our health center.</p>
                        
                        <p>By following these recommendations tailored specifically for our highland community, families in Barangay Ambiong can maintain optimal health throughout the year. Remember that our health center is always available to provide guidance, support, and care for your family's specific health needs.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Article 2 Modal -->
    <div class="modal fade" id="article2Modal" tabindex="-1" aria-labelledby="article2ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="article2ModalLabel">Vaccination Schedule for Barangay Ambiong</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1FFH1ku6FMNNJntWT6wiu_GPl_XQK6SaPCGQT5UzS018GK-xflOJnfjdTc7_23ZqSG84&usqp=CAU" alt="Vaccination Updates" class="article-image">
                    
                    <div class="article-meta">
                        <span><i class="far fa-calendar"></i> April 10, 2025</span>
                        <span><i class="far fa-user"></i> Nurse Reyes</span>
                        <span><i class="far fa-folder"></i> Immunization</span>
                    </div>
                    
                    <div class="article-content">
                        <p>Barangay Ambiong Health Center is committed to providing comprehensive immunization services to our community. Vaccinations are one of the most effective ways to prevent infectious diseases and maintain public health. Here's everything you need to know about our vaccination programs and schedules.</p>
                        
                        <h4>Upcoming Vaccination Drive</h4>
                        <p>We're pleased to announce our next community vaccination drive scheduled for May 2-6, 2025, from 8:00 AM to 4:00 PM daily at the Barangay Ambiong Health Center. This initiative aims to ensure that all residents, especially children and elderly individuals, are up-to-date with their recommended immunizations.</p>
                        
                        <h4>Available Vaccines</h4>
                        <p>During our vaccination drive, the following vaccines will be available free of charge:</p>
                        <p>- BCG (for newborns)<br>
                        - Hepatitis B<br>
                        - Pentavalent vaccine (DPT-HepB-HIB)<br>
                        - Oral Polio Vaccine (OPV)<br>
                        - Inactivated Polio Vaccine (IPV)<br>
                        - Pneumococcal Conjugate Vaccine (PCV)<br>
                        - Measles, Mumps, Rubella (MMR)<br>
                        - Rotavirus vaccine<br>
                        - Influenza vaccine (seasonal flu shots)<br>
                        - Tetanus toxoid (for pregnant women)<br>
                        - COVID-19 vaccines (including boosters)</p>
                        
                        <h4>Registration Process</h4>
                        <p>To ensure efficient service during the vaccination drive, we encourage pre-registration. You can register in the following ways:</p>
                        <p>1. Visit the Barangay Ambiong Health Center in person to fill out a registration form<br>
                        2. Call our hotline at (074) 123-4567<br>
                        3. Register online through our website<br>
                        4. Contact your local Barangay Health Worker</p>
                        
                        <h4>Required Documents</h4>
                        <p>Please bring the following documents when coming for vaccination:</p>
                        <p>- Barangay ID or any government-issued ID<br>
                        - Immunization cards (for children)<br>
                        - Previous vaccination records (if available)<br>
                        - For children: birth certificate</p>
                        
                        <h4>Standard Childhood Immunization Schedule</h4>
                        <p>Our health center follows the Department of Health's Expanded Program on Immunization (EPI) schedule:</p>
                        <p>- Birth: BCG, Hepatitis B<br>
                        - 6 weeks: Pentavalent 1, OPV 1, PCV 1, Rotavirus 1<br>
                        - 10 weeks: Pentavalent 2, OPV 2, PCV 2, Rotavirus 2<br>
                        - 14 weeks: Pentavalent 3, OPV 3, PCV 3, IPV<br>
                        - 9 months: Measles<br>
                        - 12-15 months: MMR</p>
                        
                        <h4>Adult Vaccination Recommendations</h4>
                        <p>Adults should remain current with these vaccinations:</p>
                        <p>- Tetanus-diphtheria (Td) booster every 10 years<br>
                        - Annual influenza vaccine<br>
                        - COVID-19 vaccines and boosters as recommended<br>
                        - Pneumococcal vaccine for adults 65 years and older or those with certain medical conditions</p>
                        
                        <h4>Special Considerations for Baguio City Residents</h4>
                        <p>Due to our higher altitude and cooler climate in Baguio City, respiratory infections can be common. We strongly recommend influenza vaccinations for all residents, especially during the rainy season from June to October.</p>
                        
                        <p>For any questions about vaccinations or to check if you or your family members are due for any immunizations, please don't hesitate to contact our health center. Our healthcare professionals are ready to provide guidance specific to your health needs.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Article 3 Modal -->
    <div class="modal fade" id="article3Modal" tabindex="-1" aria-labelledby="article3ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="article3ModalLabel">Mental Health Resources in Baguio City</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://images.unsplash.com/photo-1542736667-069246bdbc6d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Mental Health" class="article-image">
                    <div class="article-meta">
                       <span><i class="far fa-calendar"></i> April 5, 2025</span>
                       <span><i class="far fa-user"></i> Dr. Cruz</span>
                       <span><i class="far fa-folder"></i> Mental Health</span>
                   </div>
                   
                   <div class="article-content">
                       <p>Mental health is an essential component of overall well-being, yet it often receives less attention than physical health. For residents of Barangay Ambiong and the broader Baguio City community, we want to highlight the mental health resources available to support you and your loved ones.</p>
                       
                       <h4>Mental Health Services at Barangay Ambiong Health Center</h4>
                       <p>Our health center has expanded its mental health services to better serve our community. We now offer:</p>
                       <p>- Free initial mental health consultations every Tuesday and Thursday<br>
                       - Basic counseling services with our trained healthcare providers<br>
                       - Mental health assessments and referrals to specialized services when needed<br>
                       - Monthly mental wellness workshops open to all community members</p>
                       
                       <h4>Baguio City Mental Health Resources</h4>
                       <p>Beyond our barangay, Baguio City offers several quality mental health services:</p>
                       <p>- Baguio General Hospital Psychiatric Department: Comprehensive psychiatric services including evaluation, medication management, and therapy<br>
                       - Saint Louis University Mental Health Clinic: Offers affordable counseling services provided by licensed professionals<br>
                       - Baguio Center for Young Adults: Specialized mental health support for teenagers and young adults<br>
                       - Cordillera Mental Health Association: Community support groups and advocacy programs</p>
                       
                       <h4>Coping with Highland Living Challenges</h4>
                       <p>Living in Baguio's highland environment presents unique mental health considerations. The extended rainy season and foggy days can contribute to seasonal mood changes for some residents. Here are some strategies specifically developed for our community:</p>
                       <p>- Light therapy during foggy or cloudy periods<br>
                       - Indoor physical activities to maintain endorphin levels during inclement weather<br>
                       - Community gatherings that foster connection during isolated weather periods<br>
                       - Mindfulness practices that incorporate our natural surroundings</p>
                       
                       <h4>Mental Health First Aid</h4>
                       <p>Our health center regularly conducts Mental Health First Aid training sessions for community members. These sessions teach valuable skills:</p>
                       <p>- Recognizing signs of common mental health challenges<br>
                       - Providing initial support to someone experiencing a mental health crisis<br>
                       - Connecting individuals to appropriate professional help<br>
                       - Reducing stigma around mental health discussions</p>
                       
                       <h4>Resources for Special Populations</h4>
                       <p>We recognize that certain groups have unique mental health needs:</p>
                       <p>- Senior Citizens: Weekly support groups at the Ambiong Community Center<br>
                       - Students: School-based counseling programs in partnership with local schools<br>
                       - Indigenous Communities: Culturally-sensitive mental health services that respect traditional practices<br>
                       - Overseas Filipino Workers' Families: Support services for families managing separation and reintegration</p>
                       
                       <h4>Telehealth Options</h4>
                       <p>For those unable to visit in-person services, several telehealth options are available:</p>
                       <p>- National Center for Mental Health Crisis Hotline: 1553 (toll-free for Globe/TM users)<br>
                       - Department of Health Mental Health Program online consultations<br>
                       - Baguio Mental Health Network telehealth appointments<br>
                       - Mobile apps recommended by Philippine Mental Health Association</p>
                       
                       <p>Remember that seeking help for mental health concerns shows strength, not weakness. Our community is here to support one another through all aspects of health and wellness. If you or someone you know is struggling, please reach out to any of these resources—you don't have to face challenges alone.</p>
                   </div>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">Close</button>
               </div>
           </div>
       </div>
   </div>

   <!-- Bootstrap JS and Font Awesome -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>