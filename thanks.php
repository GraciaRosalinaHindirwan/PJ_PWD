<?php
include_once("koneksi.php");
require_once("route.php"); 
require_once("auth.php");

if (!isLogin()) {
    redirect("login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donation Confirmation</title>
    <link rel="stylesheet">
</head>

<body>
 <nav>
        <div class="logo-container">
            <img src="img/owhc1-removebg-preview.png" id="logo">

            <div class="nav-links">
                <a href="home.php">Home</a>
                <a href="login.html">Logout</a>
            </div>
        </div>
    </nav>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $donationType = htmlspecialchars($_POST['donationType']);
    $jumlah = (int) $_POST['jumlah'];
    $pesan = htmlspecialchars($_POST['pesan']);

    $stmt = $conn->prepare("INSERT INTO donasi (nama, email, donation_type, jumlah, pesan) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssds", $nama, $email, $donationType, $jumlah, $pesan);

    if ($stmt->execute()) {
        echo "<h2>Thank you for your donation, $nama!</h2><br>";
        echo "<p>Email: $email</p>";
        echo "<p>Donation type: $donationType</p>";
        echo "<p>Donation amount: Rp " . number_format($jumlah, 0, ',', '.') . "</p>";
        if (!empty($pesan)) {
            echo "<p>Your message: $pesan</p><br>";
        }
        echo "<a href='home.html' class='return-button'>Return to home page</a>";
    } else {
    echo '<div class="content"><p>Please fill out the form first!</p></div>';
    }

    $stmt->close();
    $conn->close();
    echo '</div>';
} else {
    echo "<p>Please fill out the form first!</p>";
}
?>
</body>
</html>
