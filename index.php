<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero {
            background-image: url('https://images.unsplash.com/photo-1580127252363-1d29a1ff0603?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            color: white;
            padding: 250px 0;
            text-align: center;
        }
        .carousel-image {
            width: 100%;
            height: 400px; 
            object-fit: cover; 
        }
    </style>
</head>
<body>

    <?php include './attrib/header.php'; ?>
    <header class="hero">
        <h1>Online Medical Consultation</h1>
        <p>Caring for our community, one consultation at a time.</p>
        <a href="appointment-public.php" class="btn btn-light">Make an Appointment</a>
    </header>

    <section class="container text-center mt-5 bg-light p-5 rounded">
        <h2>Welcome to Our Online Consulting Site</h2>
        <p>This website is committed to making our barangay have convenient and trustworthy online health consultations. Built to care for the health and well-being of all our residents, the site brings you in touch with licensed medical doctors for consultations, guidance, and referrals all within the comfort of your home.</p>
    </section>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 bg-primary text-white p-4 rounded">
                <h2>Services</h2>
                <p>We provide easy and safe online medical consultations for our barangay. From routine checkups to health recommendations and referrals, our licensed doctors are available to assist the well-being of all residents from home.</p>
                <a href="#" class="btn btn-secondary">See All Services</a>
            </div>
            <div class="col-md-6">
                <div id="servicesCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://parthadental.com/wp-content/uploads/2022/10/dental-care1.webp" alt="Service 1" class="carousel-image"> 
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/400x400?text=Service+2" alt="Service 2" class="carousel-image"> 
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/400x400?text=Service+3" alt="Service 3" class="carousel-image"> 
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#servicesCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#servicesCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div id="blogCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://ik.imagekit.io/tvlk/loc-asset/gNr3hLh55ZCkPJisyxFK-v9MmzxPu57ZRVI+10VZ2S4b1PNW4T++cbA6yK4gzhAhs9o2HLZ9vs7gy3rpcIU+oKi5EygzQLRjTUv7fRblEVA=/images/1525320105800-1498x1000-FIT_AND_TRIM-80dd28040c119dde93ded990d182f1e0.jpeg?tr=q-40,c-at_max,w-1280,h-720&_src=imagekit" alt="Blog 1" class="carousel-image"> 
                        </div>
                        <div class="carousel-item">
                            <img src="https://gttp.images.tshiftcdn.com/357067/x/0/baguio.jpg" alt="Blog 2" class="carousel-image"> 
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/400x400?text=Blog+3" alt="Blog 3" class="carousel-image"> 
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#blogCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#blogCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-6 bg-info text-white p-4 rounded">
                <h2>Blog</h2>
                <p>Keep up-to-date with the newest medical tips, public health news, and useful advice on how to maintain your barangay healthy and vibrant.</p>
                <a href="#" class="btn btn-light">Read Blogs</a>
            </div>
        </div>
    </div>
    <br><br>

    <?php include './attrib/footer.php'; ?>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>