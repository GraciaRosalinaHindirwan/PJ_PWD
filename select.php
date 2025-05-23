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
    <title>Select Page </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="select.css">
</head>

<body>
    <header>
        <img src="img/owhc.png" alt="logo owhc">
    </header>
    <h2 class="text-center" style="color: #22243e;">Choose How You Want to Help</h2>

<div class="card-container">
    <div class="card" style="width: 60vh;">
    <img src="img/volunteer.jpg" class="card-img-top" alt="volunteer img">
        <div class="card-body">
            <h5 class="card-title"> Volunteer </h5>
            <p class="card-text">We believe that every small act can create a big impact. 
                If you have a caring heart and want to contribute directly to our mission, 
               
                we invite you to become a volunteer! </p>
            <a href="volunteer.php" class="btn btn-primary"> Join </a>
        </div>
    </div>
    <br>
    <div class="card" style="width: 60vh;">
    <img src="img/donate.jpg" class="card-img-top" alt="donate img">
        <div class="card-body">
            <h5 class="card-title"> Donate </h5>
            <p class="card-text">When you donate to OWHC, 
                you're investing in tangible results. We are committed to transparency, 
                ensuring that your generosity is utilized efficiently and effectively to maximize its impact. </p>
            <a href="form.php" class="btn btn-primary"> Join </a>
        </div>
    </div>
</div>

</body>
</html>