<?php
include("connexion_base.php");
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
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./images/Logo.png" alt="auk" width="60">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item a">
                        <a class="nav-link" href="accueil.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="payement.php">frais académiques</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link " href="carte.php">Carte d'étudiant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-login btn-block bg-primary" href="logout.php">déconnexion</a>²
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <a href="payement.php" class="text-decoration-none">
                    <div class="border border-3 border-danger p-3">
                        <h1 class="paye">Payez vos frais académiques ici</h1>
                        <p>Payez facilement et en toute sécurité vos frais</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="payement.php" class="text-decoration-none">
                    <div class="border border-3 border-danger p-3">
                        <h1 class="paye">Payez ici les frais d'enrolement</h1>
                        <p>Payez facilement et en toute sécurité vos frais</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="carte.php" class="text-decoration-none">
                    <div class="border border-3 border-danger p-3">
                        <h1 class="paye">Obtenez votre carte d'étudiant</h1>
                        <p>Obtenez votre carte d'étudiant en un clic</p>
                    </div>
                </a>
            </div>
        </div>

</body>
</html>

