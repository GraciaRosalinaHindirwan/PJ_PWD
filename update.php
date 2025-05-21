<?php 
require_once("koneksi.php");
require_once("route.php");
require_once("auth.php");

if (!isLogin()) {
    redirect("login.php");
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
   redirect(editProfile.php);
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
        redirect("edit.php");
    }

    //update
    $sql = "UPDATE user SET username = ?, email = ? WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$new_username, $new_email, $id]);
    $_SESSION["username"] = $new_username;

} catch (PDOException $e) {
    echo "Error updating data: " . $e->getMessage();
    redirect("edit.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data success</title>
</head>
<body>
    <h1>Your Account is Alread Changes</h1>
</body>
</html>