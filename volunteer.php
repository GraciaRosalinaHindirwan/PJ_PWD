<?php
include_once("koneksi.php");
include_once("route.php"); 
require_once("auth.php");

if (!isLogin()) {
    redirect("login.php");
}

$name = "";
$skill = "";
$avail = "";
$status = "";
$date = "";

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]); 
    $skill = trim($_POST["skill"]);
    $avail = trim($_POST["avail"]);
    $status = trim($_POST["status"]);
    $date = trim($_POST["date"]);

    // Validasi input
    if (empty($name)) {
        $errors[] = "Nama lengkap harus diisi.";
    }
    if (empty($skill)) {
        $errors[] = "Keterampilan harus diisi.";
    }
    if (empty($avail)) {
        $errors[] = "Ketersediaan harus diisi.";
    }
    if (empty($status)) {
        $errors[] = "Status harus diisi.";
    }
    if (empty($date)) {
        $errors[] = "Tanggal pendaftaran harus diisi.";
    }

    $id = $_SESSION["id"];
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect("volunteer.php"); 
        exit(); 
    } else {
        try {
            $connection = getConnection(); 
            $sql = "INSERT INTO volunteer (user_id, name, skill, avail, status, date) VALUES (?, ?, ?, ?, ?)";
            
            $stmt = $connection->prepare($sql); // 

            $stmt->execute([$id, $name, $skill, $avail, $status, $date]);
            
            $_SESSION['success_message'] = "Pendaftaran berhasil!";
            redirect("success.php"); 
            exit(); 
        } catch (PDOException $e) { 
            $_SESSION['errors'] = ["Terjadi kesalahan: " . $e->getMessage()];
            redirect("volunteer.php"); 
            exit(); 
        }
    }
}
?>
<style>
    .navbar {
    background: linear-gradient(to right,rgb(214, 203, 203), #A9B5DF) !important;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 60px;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="volunteer.css">
</head>
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
    <div class="card" style="margin-top: 130px; ">
        <div class="card-header">
            Please Fill This Form
        </div>
        <div class="card-body">
        <form action="volunteer.php" method="POST">
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

            <h5 class="card-title">Welcome Volunteers!</h5>
            <p class="card-text">"We warmly welcome you to our volunteer team and appreciate you choosing to share your time and skills with us."</p>
            
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullname" aria-describedby="first" name="name">
            </div>
            <div class="mb-3">
                <label for="Skill" class="form-label">Skills</label>
                <input type="text" class="form-control" id="skill" aria-describedby="skill" name="skill">
                <div id="skill" class="form-text">ex:  Graphic Design, Event Management, Marketing </div>
            </div>
             <div class="mb-3">
                <label for="avail" class="form-label">Available</label>
                <input type="text" class="form-control" id="avail" aria-describedby="Avail" name="avail">
                <div id="skill" class="form-text">ex: Monday, Wednesday afternoon, Weekday </div>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" aria-describedby="status" name="status">
                <div id="skill" class="form-text">ex: Pending, Active, not Active </div>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Registation Date</label>
                <input type="date" class="form-control" id="date" aria-describedby="date" name="date">
            </div>
            <button type="submit" class="btn btn-primary"> JOIN </button>
        </form>
        </div>
    </div>
</body>
</html>