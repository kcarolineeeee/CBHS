<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Telehealth Consultation</title>

    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        h2, h5 {
            font-family: 'Merriweather', serif;
        }

        .hero-section {
            background: linear-gradient(to right, #e9f1ff, #ffffff);
            padding: 80px 20px;
            text-align: center;
        }

        .hero-section h2 {
            font-size: 2.5rem;
            color: #0d6efd;
        }

        .hero-section p {
            font-size: 1.1rem;
            color: #333;
            margin-top: 20px;
        }

        .cta-buttons {
            margin-top: 40px;
        }

        .cta-buttons a {
            margin: 0 10px;
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 30px;
        }

        .img-preview {
            max-width: 100%;
            height: auto;
            margin-top: 40px;
            border-radius: 1rem;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }
    </style>
    
</head>
<body>

    <?php include './attrib/header.php'; ?>

    <section class="hero-section">
        <div class="container">
            <h2 class="fw-bold text-uppercase">Make an appointment</h2>
            <hr class="w-25 mx-auto mb-5">
            <p>Get connected with certified healthcare professionals via message, chat, or even through phone call from the comfort of your home.</p>
            <p class="mt-4 text-muted">
                <strong>Note:</strong> You must be logged in to book a consultation. Please log in or create an account to continue.
            </p>
            <div class="cta-buttons">
                <a href="login.php" class="btn btn-primary">Login</a>
                <a href="register.php" class="btn btn-outline-primary">Register</a>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php include './attrib/footer.php'; ?>

</body>
</html>
