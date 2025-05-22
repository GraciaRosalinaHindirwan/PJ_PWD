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
    $sql = "DELETE FROM user WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$id]);
    echo "Account deleted successfully. Redirecting...";
    session_unset(); 
    session_destroy();

    redirect("login.php");
    exit();
} catch (PDOException $e) {
    $_SESSION['error_message'] = "Error Delete Account. TRY AGAIN";
    redirect("home.php");
    exit();
}
