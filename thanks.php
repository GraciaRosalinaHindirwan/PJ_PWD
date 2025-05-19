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
</body>
</html>
