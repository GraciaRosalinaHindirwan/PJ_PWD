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
  <body>
    <div class="header">
        <img src="img/owhc.png" alt="">
    </div>
  
    <div class="container">
    <div class="edit">
    <h1 style="color: #7886c7;">Edit Profile</h1> <br>

    <form action="update.php" method="post">
    <input type="hidden" name="id" value="<?=$data['id']?>">
    <div class="form-floating">
        <input type="text" class="form-control" id="floatingname" placeholder="username" name="username">
            <label for="floatingname" class="bi bi-person"> Username</label>
        </div>
        <br>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingpw" placeholder="Password" name="password">
            <label for="floatingpw" class="bi bi-key"> Password</label>
        </div>

        <div>
            <button type="submit" class="btn btn-outline-primary" id="CTA" name="submit">UPDATE</button>
        </div>
    </form>
    </div>
  </div>
  
  </body>
</html> 