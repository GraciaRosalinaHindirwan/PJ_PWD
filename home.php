<?php 
include_once("koneksi.php");
require_once("route.php");
require_once("auth.php");

if (!isLogin()) {
    redirect("login.php");
}

$username = getLoggedUser()["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<style>
    .help-link {
  color: #2D336B;
  font-size: 18px;
  text-decoration: none;
  transition: all 0.3s ease-in-out;
}

.help-link:hover {
  color:rgb(79, 92, 206); 
  transform: scale(1.15); 
  text-shadow: 0 0 5 rgb(134, 139, 183); 
}

  #carouselExampleCaptions {
            max-width: 800px; 
            margin: 0 auto; 
        }
</style>
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="img/logo2.png" alt="logo">
                </span>

                <div class="text header-text">
                    <span class="name">One World Help Care</span>
                    <span class="profession"> Charity Website </span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="home-new.php">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text"> Dashboard </span>
                        </a>
                    </li>
                      <li class="nav-link">
                        <a href="dokumentasi.php">
                            <i class='bx bxs-file-doc icon'></i>
                            <span class="text nav-text"> Documentation </span>
                        </a>
                    </li>
                      <li class="nav-link">
                        <a href="tutorial.php">
                            <i class='bx bx-help-circle icon'></i>
                            <span class="text nav-text"> Tutorial </span>
                        </a>
                    </li>
                      <li class="nav-link">
                        <a href="editProfile.php">
                            <i class='bx bx-edit icon'></i>
                            <span class="text nav-text"> Edit Profile </span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                 <li class="">
                        <a href="logout.php">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text"> Logout </span>
                        </a>
                    </li>
                    <li class="">
                        <form action="delete.php" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete your account? This action is irreversible!');" class="d-inline">
                            <button type="submit" class="nav-link btn btn-link text-danger">
                            <span class="text nav-text" style="color:red;"> Delete Account </span>
                        </button>
                        </form>
                    </li>
            </div>
        </div>
    </nav>

    <!-- Welcome Section -->
<section class="welcome-section" style="margin-top: 70px;">
    <h1 style="font-weight:600; color: #2D336B;">Hello <?php echo htmlspecialchars($username); ?> !</h1>
    <p style="font-size: 20px; font-weight:400; color: #2D336B;">Welcome to OWHC</p>
</section>

<!-- About Section -->
 <section id="about" style=" padding: 20px 20px; margin-bottom: 50px; ">
  <div style="display: flex; flex-wrap: wrap; max-width: 1000px; margin: auto; align-items: center;">  

    <div style="flex: 1; padding: 20px; display: flex; flex-direction: column; gap: 20px;">
      <img src="img/charity.jpg" alt="About 1" style="width: 100%; border-radius: 12px;">
      <img src="img/charity2.jpg" alt="About 2" style="width: 100%; border-radius: 12px;">
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

<!-- Carousel Section -->

<div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
          <p style="font-size: 20px; font-weight:500; padding-top: 35px; text-align: center; color: #2D336B;">Please Choose a cause to support below:</p>
            <div class="carousel-item active">
                <img src="img/pendidikan.jpg" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Support Children</h5>
                    <p>Help underprivileged children with food, shelter, and education.</p>
                    <a href="select.php" class="btn donate-btn">Help Now</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/kesehatan.jpg" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Help to Healthcare</h5>
                    <p>Provide medical support to those in need</p>
                    <a href="select.php" class="btn donate-btn">Help Now</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/bencana.jpg" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Protect the Environment</h5>
                    <p>Support eco-friendly initiatives and reforestation efforts.</p>
                    <a href="select.php" class="btn donate-btn">Help Now</a>
                </div>
            </div>
             <div class="carousel-item">
                <img src="img/ekonomi.jpg" class="d-block w-100" alt="Healthcare Donation">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Economic Empowerment</h5>
                    <p>Support dreams. Provide capital for small businesses.</p>
                    <a href="select.php" class="btn donate-btn">Help Now</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

<!--Tutorial Section-->
<div style="padding: 40px 0; text-align: center; margin-top: 50px;" class="help">
  <h2 style="color: #2D336B;">Did You Need Help? </h2>
  <p style="color: #2D336B;">Here's the Tutorial for help you</p>
  <a href = "tutorial.php" class="bi bi-question-circle help-link"> Click Me! </a>
</div>

<!-- Contact Section -->
<section style="padding: 40px 0; text-align: center; margin-top: 50px;">
  <h2 style="color: #2D336B;">Need Assistance?</h2>
  <p style="color: #2D336B;">Feel free to contact our support team anytime.</p>
  <div style="margin-top: 20px; color: #2D336B;">
    <p><strong>📞 Call:</strong> 0800-9210-008</p>
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
        <img src="img/foto3.jpg" class="rounded-circle border border-white border-4" style="width: 160px; height: 160px; object-fit: cover;" alt="Rachma Alycia">
        <p class="fw-bold mt-2">Rachma Alycia</p>
      </div>

      <!-- Founder 2 -->
      <div class="col-6 col-md-4 mb-4">
        <img src="img/mita2.jpg" class="rounded-circle border border-white border-4" style="width: 160px; height: 160px; object-fit: cover;" alt="Miftahul Jannah">
        <p class="fw-bold mt-2">Miftahul Jannah</p>
      </div>

      <!-- Founder 3 -->
      <div class="col-6 col-md-4 mb-4">
        <img src="img/gres.jpg" class="rounded-circle border border-white border-4" style="width: 160px; height: 160px; object-fit: cover;" alt="Gracia Rosalina">
        <p class="fw-bold mt-2">Gracia Rosalina</p>
      </div>

    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>


</body>
</html>