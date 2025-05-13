
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
</head>
<style>
  .navbar {
    background: linear-gradient(to right,rgb(214, 203, 203), #A9B5DF) !important;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
</style>
<body>

<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <div class="logo-container">
    <img src="owhc1-removebg-preview.png" id="logo" style="width: 200px; height: auto;"> 
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon bg-light"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto" style="padding-right: 30px; font-size: 18px; font-weight: 600;">
        <li class="nav-item" style="padding-right: 20px;">
          <a class="nav-link" href="#">Documentation</a>
        </li>
        <li class="nav-item" style="padding-right: 20px;">
          <a class="nav-link" href="#">Help</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Welcome Section -->
<section class="welcome-section">
    <h1 style="font-weight:600;">Welcome to OWHC</h1>
    <p style="font-size: 18px; font-weight:400;">When we all help everyone cares</p>
    <p style="font-size: 16px; font-weight:400; padding-top: 35px;">Please Choose a cause to support below:</p>
</section>

<!-- Carousel Section -->
<div class="container mb-4">
    <div id="donationCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="pendidikan.jpg" class="d-block w-100" alt="Children Donation">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Support Children</h5>
                    <p>Help underprivileged children with food, shelter, and education.</p>
                    <a href="donate.php" class="btn btn-warning donate-btn">Donate Now</a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="kesehatan.jpg" class="d-block w-100" alt="Environment Donation">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Donate to Healthcare</h5>
                    <p>Provide medical support to those in need.</p>
                    <a href="donate.php" class="btn btn-warning donate-btn">Donate Now</a>
                    
                </div>
            </div>

            <div class="carousel-item">
                <img src="bencana.jpg" class="d-block w-100" alt="Healthcare Donation">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Protect the Environment</h5>
                    <p>Support eco-friendly initiatives and reforestation efforts.</p>
                    <a href="donate.php" class="btn btn-warning donate-btn">Donate Now</a>
                    
                </div>
            </div>

            <div class="carousel-item">
                <img src="ekonomi.jpg" class="d-block w-100" alt="Healthcare Donation">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Economic Empowerment</h5>
                    <p>Support dreams. Provide capital for small businesses.</p>
                    <a href="donate.php" class="btn btn-warning donate-btn">Donate Now</a>
                </div>
            </div>

        </div>
        <button style="margin-left: -50px;" class="carousel-control-prev" type="button" data-bs-target="#donationCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button style="margin-right: -50px;" class="carousel-control-next" type="button" data-bs-target="#donationCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

<!-- About and contact Section -->
 <section id="about" style=" padding: 60px 20px;">
  <div style="display: flex; flex-wrap: wrap; max-width: 1000px; margin: auto; align-items: center;">  

    <div style="flex: 1; padding: 20px; display: flex; flex-direction: column; gap: 20px;">
      <img src="charity.jpg" alt="About 1" style="width: 100%; border-radius: 12px;">
      <img src="charity2.jpg" alt="About 2" style="width: 100%; border-radius: 12px;">
    </div>

    <div style="flex: 1; padding: 15px;">
    <center>
      <h1 style="color: #2D336B; font-size: 50px; margin-bottom: 40px; padding-top: -70px;">About Us</h1>
      <p style="color: #2D336B; font-size: 20px; line-height: 1.6; margin-left: 30px;  ">
        One World Help Care (OWHC) is a non-profit organization dedicated to bringing hope, care, and support to communities in need across the globe. Our mission is to unite hearts and hands to build a better world through collective help and compassion.
      </p>  
    </center>
    </div>

  </div>
</section>

<!-- Contact Section -->
<section style="padding: 40px 0; text-align: center;">
  <h2 style="color: #2D336B;">Need Assistance?</h2>
  <p style="color: #2D336B;">Feel free to contact our support team anytime.</p>
  <div style="margin-top: 20px; color: #2D336B;">
    <p><strong>📞 Hotline:</strong> 0800-9210-008</p>
    <p><strong>📧 Email:</strong> supportowhc@gmail.com</p>
  </div>
</section>


<!-- Founder Section -->
<section class="py-5 mt-5">
  <div class="container text-center">
    <h2 class="mb-5" style="color: #2D336B;">Meet Our Founders</h2>
    <div class="row justify-content-center">
      
      <!-- Founder 1 -->
      <div class="col-6 col-md-4 mb-4">
        <img src="foto3.jpg" class="rounded-circle border border-white border-4" style="width: 160px; height: 160px; object-fit: cover;" alt="Rachma Alycia">
        <p class="fw-bold mt-2">Rachma Alycia</p>
      </div>

      <!-- Founder 2 -->
      <div class="col-6 col-md-4 mb-4">
        <img src="mita.jpg" class="rounded-circle border border-white border-4" style="width: 160px; height: 160px; object-fit: cover;" alt="Miftahul Jannah">
        <p class="fw-bold mt-2">Miftahul Jannah</p>
      </div>

      <!-- Founder 3 -->
      <div class="col-6 col-md-4 mb-4">
        <img src="gres.jpg" class="rounded-circle border border-white border-4" style="width: 160px; height: 160px; object-fit: cover;" alt="Gracia Rosalina">
        <p class="fw-bold mt-2">Gracia Rosalina</p>
      </div>

    </div>
  </div>
</section>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>