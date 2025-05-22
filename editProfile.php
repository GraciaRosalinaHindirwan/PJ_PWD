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
        <li class="nav-item" style="padding-right: 20px;">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card mb-3" style="max-width: 800px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="img/meng.jpg" class="img-fluid rounded-start" alt="Success illustration">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title">Edit Your Account</h1>
                        <p class="card-text">"Please Fill Carefully"</p>
                        <div class="card-text">
                <form action="update.php" method="POST">                   
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingname" placeholder="username" name="username">
                                <label for="floatingname" class="bi bi-person"> Username</label>
                            </div>
                            <br>
                            <div class="form-floating">
                                <input type="email" class="form-control" id="floatingemail" placeholder="email" name="email">
                                <label for="floatingemail" class="bi bi-person"> E-mail</label>
                            </div>
                        </div>
                        <div class="d-flex gap-3 justify-content-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <a href="#" class="btn btn-primary">Delete</a>
                        </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
  </body>
</html>