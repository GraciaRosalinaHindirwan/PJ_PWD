<?php 
require_once("koneksi.php");
require_once("route.php");
require_once("auth.php");

if (!isLogin()) {
    redirect("login.php");
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
   redirect(edit.php);
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
    $stmt->execute([$new_email, $new_username, $id]);
    $result = $stmt->fetchAll();

    if ($result) {
        redirect("edit.php");
    }

    //update
    $sql = "UPDATE user SET username = ?, email = ? WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$new_email, $new_username, $id]);

} catch (PDOException $e) {
    echo "Error updating data: " . $e->getMessage();
    redirect("edit.php");
}

?>