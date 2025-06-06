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
    <title>Documentation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dokumentasi.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
    .navbar {
        background: linear-gradient(to right, rgb(214, 203, 203), #A9B5DF) !important;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <div class="logo-container">
                <img src="img/owhc1-removebg-preview.png" id="logo" style="width: 200px; height: auto;">
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon bg-light"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" style="padding-right: 30px; font-size: 18px; font-weight: 600;">
                    <li class="nav-item" style="padding-right: 20px;">
                        <a class="nav-link" href="home.php"><i class="bx bx-home-alt icon"> Home</i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="welcome-section" style="margin-top: 70px;">
        <h1 style="font-weight:600; color: #2D336B;">DOCUMENTATION</h1>
    </section>

    <section class="horizontal-scroll-container">
        <div class="horizontal-scroll">
            <div class="card">
                <div class="card-text">
                    On Saturday, the OWHC volunteer team directly handed over donations in the form of basic
                    necessities, suitable clothing, and hygiene kits to residents of Kampung Melayu who were affected by
                    the flood. This assistance is expected to ease their burden and help the post-disaster recovery
                    process. Residents warmly welcomed the arrival of the volunteers and expressed their gratitude for
                    the concern given.
                </div>
            </div>
            <div class="card">
                <img src="img/banjir.jpg" class="card-img-top" alt="Banjir">
                <div class="card-text">Assistance for residents of Kampung Melayu who were affected by the flood</div>
            </div>
            <div class="card">
                <img src="img/santunanyatim.jpg" class="card-img-top" alt="anak yatim">
                <div class="card-text">Assistance for orphans at the Kasih Bunda Orphanage</div>
            </div>
            <div class="card">
                <div class="card-text">
                    As a form of concern and gratitude, assistance was given directly to orphans at the Kasih Bunda
                    Orphanage on Sunday. Assistance in the form of basic necessities, school supplies, and cash funds
                    were distributed in the hope that it could help meet their daily needs and support their education.
                    The atmosphere was full of warmth and happiness when the OWHC volunteers interacted and played with
                    the children.
                </div>
            </div>
        </div>
    </section>
    <section class="horizontal-scroll-container">
        <div class="horizontal-scroll">
            <div class="card">
                <img src="img/gempa.webp" class="card-img-top" alt="gempa">
                <div class="card-text">Donation aid to Palu residents affected by the earthquake</div>
            </div>
            <div class="card">
                <img src="img/pendidikan2.jpg" class="card-img-top" alt="pendidikan anak">
                <div class="card-text">Educational assistance for fishermen's children in Bantul</div>
            </div>
            <div class="card">
                <img src="img/santunan.jpeg" class="card-img-top" alt="Pendidikan">
                <div class="card-text">Orphan and half-brother assistance in the orphan and half-brother love program
                </div>
            </div>
            <div class="card">
                <img src="img/palestina.jpeg" class="card-img-top" alt="Lansia">
                <div class="card-text">Donate to care for Palestine</div>
            </div>
            <div class="card">
                <img src="img/lansia2.avif" class="card-img-top" alt="Kesehatan">
                <div class="card-text">Sharing charity with the elderly in need during the pandemic</div>
            </div>
            <div class="card">
                <img src="img/pendidikan.jpg" class="card-img-top" alt="Pendidikan">
                <div class="card-text">Support for education in remote areas of Indonesia</div>
            </div>
            <div class="card">
                <img src="img/lansia.jpg" class="card-img-top" alt="Lansia">
                <div class="card-text">Sharing happiness with the elderly ahead of Christmas</div>
            </div>
            <div class="card">
                <img src="img/kesehatan.jpg" class="card-img-top" alt="Kesehatan">
                <div class="card-text">Medical check-up with Papuan residents</div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>