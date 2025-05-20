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
   $new_email = $_POST["username"];
   $new_username = $_POST["username"];
}

$id = $_SESSION["id"];
try {
    $connection = getConnection();

    //check email, usn
    $check_sql = "SELECT id FROM user WHERE(username = :username OR email = :email) AND id != :current_id";
    $stmt = $connection->prepare($check_sql);
    $stmt->execute();
    $result = $stmt->fetchAll($new_email, $new_username, $id);

    if ($result) {
        redirect("edit.php");
    }

    //update
    $sql = "UPDATE user SET username = :username, email = :email WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$new_email, $new_username, $id]);

} catch (PDOException $e) {
    echo "Error updating data: " . $e->getMessage();
    redirect("edit.php");
}

?>