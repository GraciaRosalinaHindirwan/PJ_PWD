<?php
include_once("koneksi.php");
include_once("route.php"); 
require_once("auth.php");

if (!isLogin()) {
    redirect("login.php");
}

$connection = getConnection();
$sql = "SELECT * FROM donate"; 
$stmt = $connection->prepare($sql);
$stmt -> execute();
$results = $stmt->fetchAll();

//query untuk hitung total donate
$sql_total_amount = "SELECT SUM(amount) AS total_donate FROM donate";
$stmt_total_amount = $connection->prepare($sql_total_amount);
$stmt_total_amount->execute();
$total_amount_row = $stmt_total_amount->fetch();
$total_donate = $total_amount_row['total_donate'] ?? 0;

$target_donate = 10000000;
$persent = 0;
if ($target_donate > 0) {
   $persent = ($total_donate / $target_donate) *100;
   if ($persent > 100) {
    $persent = 100;
   }
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
    <link rel="stylesheet" href="donors.css">
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
          <a class="nav-link" href="home.php"><i class="bx bx-home-alt icon">Dashboard</i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5 pt-5">
    <h1 class="mb-4 mt-5"> HERE'S OUR DONORS</h1>

    <div class="progress-section">
            <h5 class="text-center mb-3" style ="color:white;">Our Goal: IDR <?php echo number_format($target_donate); ?></h5>
            <div class="progress" role="progressbar" aria-label="Donation Progress" aria-valuenow="<?php echo $persent; ?>" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width: <?php echo $persent; ?>%"><?php echo $persent; ?>%</div>
            </div>

            <?php if ($total_donate >= $target_donate): ?>
                <p class="text-success mt-2 mb-0" style ="color:white;" >Goal achieved! Thank you for your incredible support!</p>
            <?php elseif ($persent < 100): ?>
                <p class="text-muted mt-2 mb-0" style ="color:#2d336b !important;" >We are IDR <?php echo number_format($target_donate - $total_donate); ?> away from our goal.</p>
            <?php endif; ?>
        </div>

    <table class="table table-striped table-bordered">
        <th>Name </th>
        <th>Donation_Type </th>
        <th>amount </th>
        <th>massage </th>
        <th>Date </th>

        <tr>
            <?php
            if (count($results) > 0) {
               foreach ($results as $row) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["name"]) . "</td>"; 
                    echo "<td>" . htmlspecialchars($row["donation_type"]) . "</td>"; 
                    echo "<td>" . htmlspecialchars($row["amount"]) . "</td>"; 
                    echo "<td>" . htmlspecialchars($row["massage"]) . "</td>"; 
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