<?php
include_once("koneksi.php");
include_once("route.php"); 
require_once("auth.php");

if (!isLogin()) {
    redirect("login.php");
}

$connection = getConnection();
$sql = "SELECT * FROM volunteer"; 
$stmt = $connection->prepare($sql);
$stmt -> execute();
$results = $stmt->fetchAll();
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

<div class="container mt-5 pt-5">
    <h1 class="mb-4 mt-5"> HERE'S OUR VOLUNTEERS</h1>
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