<?php 
include_once("koneksi.php");
require_once("route.php"); 

if (!isset($_SESSION["username"])) {
    redirect("login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="form.css">
</head>
<style>
    .navbar {
    background: linear-gradient(to right,rgb(214, 203, 203), #A9B5DF) !important;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 60px;

}
</style>

<body>
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
    <div class="logo-container">
    <img src="img/owhc1-removebg-preview.png" id="logo" style="width: 200px; height: auto;"> 
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon bg-light"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto" style="padding-right: 30px; font-size: 18px; font-weight: 600;">
        <li class="nav-item" style="padding-right: 20px;">
          <a class="nav-link" href="dokumentasi.html">Documentation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container" style="margin-top: 140px;">
        <h2>Donation Form</h2>
        <form action="form.php" method="POST">
            <label for="nama">Name:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="qris">Scan QRIS for payment:</label>
            <img src="img/qris.png" alt="QRIS Payment" id="qris">

            <div class="toggle-buttons">
                <input type="radio" id="oneoff" name="donationType" value="One-Off" checked hidden>
                <label for="oneoff" class="toggle-button">One-Off</label>

                <input type="radio" id="monthly" name="donationType" value="Monthly" hidden>
                <label for="monthly" class="toggle-button">Monthly</label>
            </div>


            <div class="amount-buttons">
                <button type="button" onclick="selectAmount(250000)">Rp 250k</button>
                <button type="button" onclick="selectAmount(200000)">Rp 200k</button>
                <button type="button" onclick="selectAmount(150000)">Rp 150k</button>
                <button type="button" onclick="selectAmount(100000)">Rp 100k</button>
                <button type="button" onclick="selectAmount(50000)">Rp 50k</button>
                <button type="button" onclick="selectAmount(10000)">Rp 10k</button>
            </div>

            <label for="jumlah">Donation Amount (Rp):</label>
            <input type="number" id="jumlah" name="jumlah" required>

            <label for="pesan">Message (optional):</label>
            <textarea id="pesan" name="pesan" rows="4"></textarea>

            <button type="submit">Donation Now</button>
        </form>
    </div>
    <script>
        function selectAmount(amount) {
            document.getElementById('jumlah').value = amount;
        }
    </script>
</body>

</html>
