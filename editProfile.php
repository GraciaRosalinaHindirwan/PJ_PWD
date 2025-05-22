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

<style>
  body {
    font-family: 'Quicksand', sans-serif;
    background-color: #f8f9fa;
    color: #343a40;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background-image: url(img/edit.jpg);
    background-size: cover;
    background-position: center;
}
#logo{
width: 200px;
height: auto;
margin-bottom: 5px;
padding-bottom: 5px;
}
.logo-container{
margin-top: -29px;
text-align: left;
border-radius: 5px;
height: 100px;
position: sticky;
}
.container{
    margin-top: -50px;
}
.navbar {
    background: linear-gradient(to right,rgb(214, 203, 203), #A9B5DF) !important;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 60px;
    height: auto; 
    }
.nav-link {
    color: white !important;
    position: relative;
    font-weight: 500;
    transition: all 0.3s ease-in-out;
}

.nav-link::after {
    content: '';
    position: absolute;
    width: 0%;
    height: 2px;
    bottom: 0;
    left: 0;
    background-color: #fff2f2;
    transition: 0.3s ease;
}
.nav-link:hover::after {
    width: 100%;
}
    .card {
    background: linear-gradient(to right,rgb(214, 203, 203), #A9B5DF) !important;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    width: 100%;
    max-width: 500px;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.card-header {
    background-color: #2D336B;
    color: #fff2f2;
    border-radius: 8px 8px 0 0;
    padding: 15px;
    text-align: center;
    font-size: 20px;
    font-weight: 600;
}

.card-body {
    padding: 20px;
}

.card-title {
    color: #2c3e50;
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 20px;
    text-align: center;
}

.card-text {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 20px;
    text-align: center;
    color: #555;
}

.form-label {
    font-weight: 500;
    color: #2D336B;
}

.form-control {
    border-radius: 8px;
    border: 2px solid #ced4da;
    padding: 10px;
    font-size: 16px;
    transition: border-color 0.3s ease;
    width: 100%;
}

.form-control:focus {
    border-color: #2D336B;
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
}

.form-text {
    font-size: 14px;
    color: #6c757d;
    margin-top: 5px;
}
.btn-primary {
    background-color: #7886c7;
    color: #fff2f2;
    border-radius: 8px;
    padding: 12px 25px;
    font-size: 18px;
    font-weight: 600;
    border: none;
    transition: background-color 0.3s ease, transform 0.2s ease;
    width: 100%;
}

.btn-primary:hover {
    background-color: #2D336B;
    transform: translateY(-2px);
}

.btn-primary:active {
    background-color:#2D336B;
    transform: translateY(0);
}
.button-group {
  display: flex;
  gap: 16px;             
  justify-content: center;
  align-items: center;
  flex-wrap: nowrap;       
}

.button-group .btn {
  min-width: 150px;
  padding: 12px 20px;
  font-size: 14px;
  line-height: 1.4;
  text-align: center;
  white-space: nowrap;     
  border-radius: 8px;
  font-weight: bold;
}


</style>

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
    <!-- Gambar Profil -->
    <img src="img/meng.jpg" class="img-fluid rounded-circle mb-4" 
         alt="Profile picture"
         style="width: 200px; height: 200px; object-fit: cover;">

    <!-- Form -->
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