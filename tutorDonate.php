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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial For Donate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="tutorDonate.css">
</head>
<body>
<header>
    <img src="img/owhc.png" alt="logo owhc">
</header>
<h2 class="text-center" style="color: #2D336B;">Donate Tutorial</h2>

<div class="container">
    <p>Donations are the best way to provide real support to those in need. Here is a complete guide to donating easily:</p>

    <div class="step">
        <h2>Step 1: Visit the Home Page</h2>
        <p>Access the page <a href="select.php">Donate</a> on our website, and click "join".</p>
        <img src="img/donate1.png" alt="Visit the registration page">
    </div>

    <div class="step">
        <h2>Step 2: Fill in the Registration Form</h2>
        <p>Complete your personal data and select the type and amount of payment</p>
        <img src="img/donate2.png" alt="Fill out the donate form">
    </div>

    <div class="step">
        <h2>Step 4: Submit the Form</h2>
        <p>After ensuring all information is correct and you have paid, click "Join".</p>
        <img src="img/donate3.png" alt="Submit donate registration">
    </div>

    <div class="step">
        <h2>Step 5: Receive proof of donation</h2>
        <p>Thank you for your donation! Our team will send proof of donation via email. Keep the proof as a receipt.</p>
        <img src="img/donate4.png" alt="Donations accepted">
    </div>

    <div class="step">
        <h2>Step 6: Check Active Volunteer List</h2>
        <p>Once the selection process is complete, your name will appear on the list of donors.
            Be sure to check this page regularly for the latest updates.</p>
        <img src="img/donate5.png" alt="Check Active Volunteer List">
    </div>

    <a class="back-link" href="tutorial.php">Return to Tutorial</a>
</div>

</body>
</html>