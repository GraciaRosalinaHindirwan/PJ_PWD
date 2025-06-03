<?php
include_once("koneksi.php");
include_once("route.php"); 
require_once("auth.php");

if (!isLogin()) {
    redirect("login.php");
}


//search
if ($_SERVER["REQUEST_METHOD"]=="GET" && !empty($_GET["search"])) {
  $search = ($_GET["search"]);
  
  try {
    $connection = getConnection();
    $sql = "SELECT * FROM volunteer WHERE name LIKE ? OR skill LIKE ? ORDER BY id_volunteer ASC";
      $stmt = $connection->prepare($sql);
      $param = "%" . $search . "%";
      $stmt->execute([$param, $param]);
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      if (empty($results)) {
        $_SESSION["error"] = "Data '" . $search . "' Tidak Ditemukan";
      } else {
        $_SESSION["message_search"] = "Data '" . $search . "' Ditemukan";
      }
    } catch (PDOEsception $e) {
      $_SESSION["error"] = "Data yang dicari tidak ada";
    }
  } else {
    $connection = getConnection();
    $sql = "SELECT * FROM volunteer"; 
    $stmt = $connection->prepare($sql);
    $stmt -> execute();
    $results = $stmt->fetchAll();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check volunteers Here</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="check.css">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
          <a class="nav-link" href="home.php"> <i class="bx bx-home-alt icon"> Home</i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5 pt-5">
  <?php if (isset($_SESSION["error"])) {
                    echo '<div class="alert alert-danger" role="alert">';
                    $error = $_SESSION["error"];
                    echo $error . '<br>';
                    echo '<a href="check.php" class="alert-link">Tampilkan Semua Data</a>';
                    echo '</div>';
                    unset($_SESSION["error"]);
                } ?>
    <?php 
                if (isset($_SESSION["message"])) {
                    echo '<div class="alert alert-success" role="alert">';
                    $message = $_SESSION["message"];
                    echo $message . '<br>';
                    echo '</div>';
                    unset($_SESSION["message"]);
                }
                ?>
    <?php 
                if (isset($_SESSION["message_search"])) {
                    echo '<div class="alert alert-success" role="alert">';
                    $message_search = $_SESSION["message_search"];
                    echo $message_search . '<br>';
                    echo '<a href="check.php" class="alert-link">Tampilkan Semua Data</a>';
                    echo '</div>';
                    unset($_SESSION["message_search"]);
                }
                ?>
    <h1 class="mb-4 mt-5"> HERE'S OUR VOLUNTEERS</h1>
     <form class="d-flex" action="check.php" method="GET">
        <label for="search" class="visually-hidden">Search by Name OR Skill</label>
        <input type="search" class="form-control me-2" id="search" placeholder="search" name="search">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <br>
    <table class="table table-striped table-bordered">
        <th>Name </th>
        <th>Skill </th>
        <th>Avail </th>
        <th>Status </th>
        <th>Registation </th>

        <tr>
            <?php
            if (count($results) > 0) {
               foreach ($results as $row) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["name"]) . "</td>"; 
                    echo "<td>" . htmlspecialchars($row["skill"]) . "</td>"; 
                    echo "<td>" . htmlspecialchars($row["avail"]) . "</td>"; 
                    echo "<td>" . htmlspecialchars($row["status"]) . "</td>"; 
                    echo "<td>" . htmlspecialchars($row["date"]) . "</td>"; 
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No Volunteer Data.</td></tr>";
            }
            ?>
        </tr>
    </table>
    <a href="home.php" class="btn btn-primary mt-3">Back to Home</a>
</div>
</body>
</html>