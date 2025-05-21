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
    $id = $_SESSION["id"];
  } else {
    $current_email = '';
    $current_usn = '';
  }
} catch (PDOException $e) {
  echo "Something's wrong. Try Again";
  exit();
}

?>

<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="edit.css">
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
    .navbar {
    background: linear-gradient(to right,rgb(214, 203, 203), #A9B5DF) !important;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 60px;
    height: auto; 
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
    justify-content: space-between;
    gap: 10px;
    margin-top: 20px;}
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
        <li class="nav-item" style="padding-right: 20px;">
          <a class="nav-link" href="dokumentasi.php">Documentation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="card" style="margin-top: 130px; justify-content: center; ">
    <div class="card-header">
        Change your data!
    </div>
    <div class="card-body">
      <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?=$data['id']?>">
          <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email"  name="email" required>
          </div>
          <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username"  name="username" required>
          </div>
          <div class="button-group">
              <button type="submit" class="btn btn-primary"> SAVE CHANGES </button>
              <button type="submit" class="btn btn-primary"> DELETE ACCOUNT </button>
          </div>
          
        </form>
        </div>
    </div>
  
    </div>
  </div>
  
  </body>
</html>