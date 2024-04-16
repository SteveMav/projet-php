<?php
session_start();
if(!($_SESSION['id_etudiant'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Université américaine de Kinshasa</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="accueil.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="icon" href="./images/Logo.png" type="image/ico">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0f162e !important;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./images/Logo.png" alt="auk" width="60">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" >
                        <a class="nav-link" href="accueil.php" style="border-bottom: 2px solid white;">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="payement.php">Frais académiques</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="carte.php">Carte d'étudiant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profil.php">Votre profil</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-login btn-block bg-primary" href="logout.php">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <style>
            .navbar-nav .nav-link:hover {
                border-bottom: 2px solid red;
            }
        </style>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <a href="payement.php" class="text-decoration-none">
                    <div class="card border-danger mb-3" style="height: 600px !important;">
                        <div class="card-body">
                            <h5 class="card-title">Payez vos frais académiques ici</h5>
                            <p class="card-text">Payez facilement et en toute sécurité vos frais</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="payement.php" class="text-decoration-none">
                    <div class="card border-danger mb-3" style="height: 600px !important;">
                        <div class="card-body">
                            <h5 class="card-title">Payez ici les frais d'enrolement</h5>
                            <p class="card-text">Payez facilement et en toute sécurité vos frais</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="carte.php" class="text-decoration-none" >
                    <div class="card border-danger mb-3" style="height: 600px !important;">
                        <div class="card-body">
                            <h5 class="card-title">Payez et formulez ici votre carte d'élève</h5>
                            <p class="card-text">Payez facilement et en toute sécurité votre carte d'étudiant</p>
                            <p class="card-title">avec ce nouveau système en ligne </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- un footer ici -->
    <footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2024 Copyright:
    <a class="text-dark" href="https://american.french-american.edu/">Université américaine de Kinshasa</a>
  </div>
</footer>   
    
    <script src="bootstrap.bundle.min.js"></script>
    
</body>
</html>
