<?php 
include_once("koneksi.php");
require_once("route.php"); 
require_once("auth.php");

if (!isLogin()) {
    redirect("login.php");
}

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = ($_POST["name"]);
    $donationType = ($_POST["donationType"]);
    $amount = ($_POST["amount"]);
    $massage = ($_POST["massage"]);
    $date = ($_POST["date"]);
    
    if (empty($name)) {
      $errors[] = "name cannot be empty";
    } if (empty($date)) {
      $errors[] = "date must be fill";
    }   if ($amount === false || $amount <= 0) { 
        $errors[] = "Jumlah donasi harus berupa angka positif.";
    }
    
    if (!empty($errors)) {
      $_SESSION['errors'] = $errors;
      redirect("form.php"); 
      exit(); 
    } else {
      try {
        $connection = getConnection();
        $sql = "INSERT INTO donate (name, donation_type, amount, massage, date) VALUE (?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($sql); //prepared statement 
        $stmt->execute([$name, $donationType, $amount, $massage, $date]);
        $_SESSION["success_message"] = "Form Successfully Submitted";
        redirect("thanks.php");
        exit();
      } catch (PDOException $e) {
        $_SESSION['errors'] =  "Something is Wrong";
        redirect("form.php");
        exit();
        }
    }
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
         <?php
                if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
                echo '<div class="alert alert-danger" role="alert">';
                foreach ($_SESSION['errors'] as $error) {
                    echo '<div>' . htmlspecialchars($error) . '</div>';
                }
                echo '</div>';
                unset($_SESSION['errors']); 
            }?>

            <?php if (isset ($_SESSION["success_massage"])) : ?>
                <?php $success_massage = $_SESSION["success_massage"];
                unset($_SESSION["success_massage"]);
                ?>
            <p style = "color:red;"><?= $success_massage ?></p>
            <?php endif; ?>

        <form action="form.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

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

            <label for="amount">Donation Amount (Rp):</label>
            <input type="number" id="amount" name="amount" required>

            <label for="pesan">Message (optional):</label>
            <textarea id="pesan" name="massage" rows="4"></textarea>

            <label for="date">Date: </label>
            <input type="date" id="date" name="date" required>

            <button type="submit">Donation Now</button>
        </form>
    </div>
    <script>
        function selectAmount(amount) {
            document.getElementById('amount').value = amount;
        }
    </script>
</body>

</html>
