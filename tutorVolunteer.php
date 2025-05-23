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
    <title>Tutorial For Volunteer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="tutorVolunteer.css">
</head>
<body>
<header>
    <img src="img/owhc.png" alt="logo owhc">
</header>
<h2 class="text-center" style="color: #2D336B;">Volunteer Tutorial</h2>

<div class="container">
    <p>Volunteering is a meaningful active contribution to society. Here is a complete guide to registering as a volunteer:</p>

    <div class="step">
        <h2>Step 1: Visit the Home Page</h2>
        <p>Access the page <a href="select.php">Volunteer</a> on our website, and click "join".</p>
        <img src="img/volunteer1.png" alt="Visit the registration page">
    </div>

    <div class="step">
        <h2>Step 2: Fill in the Registration Form</h2>
        <p>Complete your personal data and volunteer interest information accurately.</p>
        <img src="img/volunteer2.png" alt="Fill out the volunteer form">
    </div>

    <div class="step">
        <h2>Step 4: Submit the Form</h2>
        <p>After ensuring all information is correct, click "Join".</p>
        <img src="img/volunteer3.png" alt="Submit volunteer registration">
    </div>

    <div class="step">
        <h2>Step 5: Wait for the Selection Process</h2>
        <p>Thank you for your registration! Our team is currently reviewing your information. You will receive a 
        confirmation email within the next few days. In the meantime, please explore other volunteer activities.</p>
        <img src="img/volunteer4.png" alt="Volunteer selection process">
    </div>

    <div class="step">
        <h2>Step 6: Check Active Volunteer List</h2>
        <p>Once the selection process is complete, your name will appear on the list of active volunteers along 
            with your schedule and skills. Be sure to check this page regularly for the latest updates.</p>
        <img src="img/volunteer5.png" alt="Check Active Volunteer List">
    </div>

    <a class="back-link" href="tutorial.php">Return to Tutorial</a>
</div>

</body>
</html>