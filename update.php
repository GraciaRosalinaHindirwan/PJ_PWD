<?php
include_once("koneksi.php");
require_once("auth.php");

if (!isLogin()) {
    redirect("login.php");
}

// Ambil ID pengguna dari session
$id = $_SESSION["id"];

// Proses data yang dikirim dari form edit
if (isset($_POST['submit'])) {
    $new_username = $_POST['username'];
    $new_password = $_POST['password']; // Pastikan kamu hashing password sebelum disimpan
    $pdo = getConnection();

    try {
        $query = "UPDATE user SET username = :username";
        if (!empty($new_password)) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $query .= ", password = :password";
        }
        $query .= " WHERE id = :id";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $new_username, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if (!empty($new_password)) {
            $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
        }
        $stmt->execute();

        $stmt_select = $pdo->prepare("SELECT username FROM user WHERE id = :id");
        $stmt_select->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt_select->execute();
        $user_data = $stmt_select->fetch(PDO::FETCH_ASSOC);

        if ($user_data && isset($user_data['username'])) {
            // Simpan nama pengguna yang baru ke dalam session
            $_SESSION['username'] = $user_data['username'];

            header("Location: tampiledit.php");
            exit();
        } else {
            echo "Gagal memperbarui session username.";
        }

    } catch (PDOException $e) {
        echo "Error updating data: " . $e->getMessage();
    }
} else {
    // Jika halaman update diakses tanpa submit form
    echo "Akses tidak valid.";
}
?>