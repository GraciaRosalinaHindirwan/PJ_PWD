<?php
session_start();
require_once("koneksi.php");

if (!isset($_SESSION["id"])) {
    die("Anda belum login.");
}

$id = $_SESSION["id"];
$pdo = getConnection();

try {
    $stmt = $pdo->prepare("SELECT * FROM user WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>

<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="edit.css">
  </head>

  <style>
    body{
    background: linear-gradient(to left, #FFF2F2, #A9B5DF);
    background-position: top center;
    background-repeat: no-repeat;
    background-size: cover;
    font-family: "Quicksand";
    }
    .navbar-nav .nav-link:hover {
    color: #a6b1e1 !important;
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
  
    <div class="container" style="margin-top: 50px;">
    <div class="edit">
    <h1 style="color: #7886c7;">Edit Account</h1> <br>

    <form action="update.php" method="post">
    <input type="hidden" name="id" value="<?=$data['id']?>">
        <div class="form-floating" style="margin-bottom: 10px;">
            <input type="email" class="form-control" id="floatingemail" placeholder="name@example.com" name="email" required>
            <label for="floatingemail" class="bi bi-envelope"> Email</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingUsername" placeholder="Username" name="username" required>
            <label for="floatingUsername" class="bi bi-person"> Username</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingpw" placeholder="Password" name="password" required>
            <label for="floatingpw" class="bi bi-key"> Password</label>
        </div>
        <div>
            <button type="submit" class="btn btn-outline-primary" id="CTA" name="submit">Save Changes</button>
        </div>
    </form>
    </div>
  </div>
  
  </body>
</html>