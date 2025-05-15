<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "donasi";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donation Confirmation</title>
    <link rel="stylesheet">
</head>
<style>
##logo{
    width: 200px;
    height: auto;
    margin-bottom: 5px;
    padding-bottom: 5px;
}

.logo-container {
    display: flex;
    align-items: center;
    background: linear-gradient(to right,rgb(214, 203, 203), #A9B5DF);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: right;
    margin-bottom: 30px;
    margin-top: 0;
    height: 100px;
    position: sticky;
}

.logo-container img {
    height: 100px;
    width: auto;
    margin-right: 12px;
}

.logo-container span {
    font-size: 20px;
    font-weight: bold;
    color: #fff2f2;
}

.nav-links {
    display: flex;
    gap: 20px;
    margin-left: auto;
    padding-right: 30px;
}

.nav-links a {
    text-decoration: none;
    color: #2d336b;
}

body {
    background-image: url(bg_thankspage.jpg);
    background-position: top center;
    background-repeat: no-repeat;
    background-size: cover;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    text-align: center;
}

.content {
    max-width: 600px;
    margin: 50px auto;
    padding: 30px;
    background-color: #a9b5dfb3;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h2 {
    color: #2d336b;
}

p {
    margin: 10px 0;
}

.return-button {
    display: inline-block;
    margin-top: 15px;
    text-decoration: none;
    color: white;
    background-color: #2d336b;
    padding: 10px 15px;
    border-radius: 5px;
}

.return-button:hover {
    background-color: #a9b5dfb3;
}

</style>
<body>
 <nav>
        <div class="logo-container">
            <img src="owhc1-removebg-preview.png" id="logo">

            <div class="nav-links">
                <a href="home.php">Home</a>
                <a href="login.html">Logout</a>
            </div>
        </div>
    </nav>
<?php
echo '<div class="content">';
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
