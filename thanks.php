<?php
require_once("koneksi.php");
require_once("route.php"); 
require_once("auth.php");

if (!isLogin()) {
    redirect("login.php");
}
$username = $_SESSION["username"];

$donationType = $_SESSION["last_donation_type"] ?? "Tidak Tersedia";
$amount = $_SESSION["last_donation_amount"] ?? 0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donation Confirmation</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="thanks.css">
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
 <nav>
        <div class="logo-container">
            <img src="img/owhc1-removebg-preview.png" id="logo">

            <div class="nav-links">
                <a href="home.php"><i class="bx bx-home-alt icon">Dashboard</i></a>
            </div>
        </div>
    </nav>

<div class="card" style="margin-top: 130px;">
  <div class="card-body">
    <h5 class="card-title">Thank you for your donation, <?=$username?></h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Your kindness and generosity are deeply appreciated.</h6>
    <p class="card-text"><p>Donation Type: <?php echo htmlspecialchars($donationType);?></p>
    <p>Donation Amount: IDR <?php echo number_format($amount); ?></p></p>
    <a href="donors.php" class="btn btn-primary mt-3">Check Other Donors </a>
  </div>
</div>

</body>
</html>