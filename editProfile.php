<?php
require_once ("koneksi.php");
require_once ("auth.php");
require_once("route.php");

if (!isLogin()) {
    redirect("login.php");
}

$id = $_SESSION["id"];
try {
  $connection = getConnection();
  $sql = "SELECT email, username FROM user WHERE id = ?";
  $stmt = $connection->prepare($sql);
  $stmt->bindParam(1, $id); //1 untuk placeholder
  $stmt -> execute();
  $result = $stmt->fetch(); //ambil satu baris
  
  if($result){
    $current_email = $result['email']; //data yang baru saja di ambil dari DB
    $current_usn = $result['username']; 
  } else {
    $current_email = '';
    $current_usn = '';
  }
} catch (PDOException $e) {
  $_SESSION['error_message'] = "Something is Wrong. TRY AGAIN";
  exit();
}

?>

<html>
  <head>
    <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="editProfile.css">
  </head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top" style="margin-bottom: 50px;">
  <div class="container-fluid">
    <div class="logo-container">
    <img src="img/owhc1-removebg-preview.png" id="logo" style="width: 200px; height: auto;"> 
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon bg-light"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto" style="padding-right: 30px; font-size: 18px; font-weight: 600;">
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php 
 if (isset($_SESSION['error_message'])) {
        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_message'] . '</div>';
        unset($_SESSION['error_message']); // Hapus pesan setelah ditampilkan
    }
    if (isset($_SESSION['success_message'])) {
        echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
        unset($_SESSION['success_message']); // Hapus pesan setelah ditampilkan
    }
?>

<div class="card mx-auto" style="margin-top: 130px; max-width: 600px;">
  <div class="card-header text-center">
    Change your data!
  </div>

  <div class="card-body d-flex flex-column align-items-center text-center">
    <img src="img/meng.jpg" class="img-fluid rounded-circle mb-4" 
         alt="Profile picture"
         style="width: 200px; height: 200px; object-fit: cover;">

    <form action="update.php" method="POST" style="width: 100%; max-width: 400px;">
      <input type="hidden" name="id" value="<?=$data['id']?>">

      <div class="mb-3 text-start">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $current_email ?>" required>
      </div>

      <div class="mb-3 text-start">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= $current_usn ?>" required>
      </div>

      <div class="button-group d-flex justify-content-center gap-3">
        <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
        <a href="home.php" class="btn btn-primary">BACK TO HOME</a>
      </div>
    </form>
  </div>
</div>
  
  </body>
</html>