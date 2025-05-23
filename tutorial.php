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
    <title>Tutorial Page </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="tutorial.css">
</head>

<body>
    <header>
        <img src="img/owhc.png" alt="logo owhc">
    </header>
    <h2 class="text-center" style="color: #22243e;">Choose what you want to know</h2>

<div class="card-container">
    <div class="card" style="width: 60vh;">
    <img src="img/volunteers.jpg" class="card-img-top" alt="volunteer img">
        <div class="card-body">
            <h5 class="card-title"> Tutorial Volunteer </h5>
            <p class="card-text">This tutorial provides a complete guide for those of you who 
            want to join as a volunteer in our organization. The registration process is easy and only requires a 
            few simple steps. Through this volunteer program, you will not only make a positive impact on society, 
            but also develop your skills, expand your network, and gain valuable experience.</p>
            <a href="tutorVolunteer.php" class="btn btn-primary"> Find Out </a>
        </div>
    </div>
    <br>
    <div class="card" style="width: 60vh;">
    <img src="img/donation.jpg" class="card-img-top" alt="donate img">
        <div class="card-body">
            <h5 class="card-title"> Tutorial Donate </h5>
            <p class="card-text">Through this tutorial, you will be guided step by step to 
            make a donation easily, safely, and transparently. Every contribution, no matter how small, is very 
            meaningful and will be used as well as possible for those in need. By donating, you are helping to create 
            positive change in the world around you.</p>
            <a href="tutorDonate.php" class="btn btn-primary"> Find Out </a>
        </div>
    </div>
</div>
<div class="text-center my-4">
    <a href="home.php" class="btn btn-secondary">Back to Home Page</a>
</div>
</body>
</html>