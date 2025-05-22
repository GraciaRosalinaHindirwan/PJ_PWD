<?php 
require_once("koneksi.php");
require_once("route.php");
require_once("auth.php");

if (!isLogin()) {
    redirect("login.php");
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    redirect("editProfile.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $new_email = $_POST["email"];
   $new_username = $_POST["username"];
}

$id = $_SESSION["id"];
try {
    $connection = getConnection();

    //check email, usn
    $check_sql = "SELECT id FROM user WHERE (username = ? OR email = ?) AND id != ?";
    $stmt = $connection->prepare($check_sql);
    $stmt->execute([$new_username, $new_email, $id]);
    $result = $stmt->fetchAll();

    if ($result) {
        redirect("editProfile.php");
    }

    //update
    $sql = "UPDATE user SET username = ?, email = ? WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$new_username, $new_email, $id]);
    $_SESSION["username"] = $new_username;

} catch (PDOException $e) {
    echo "Error updating data: " . $e->getMessage();
    redirect("editProfile.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <script>alert("Data Successful Change");</script>

<div class="card" style="width: 50vh;">
  <div class="card-body">
    <h5 class="card-title">Changes Data</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Success</h6>
    <p class="card-text">You already changes data to username <b><?php echo($new_username) ?></b> and email <b><?php echo($new_email)?></b></p>
   <a href="home.php" class="btn btn-primary">Go Home</a>
  </div>
</div>
</body>
</html>