<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Université américaine de Kinshasa</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="accueil.css">
    <!-- Custom CSS -->
    <style>
       
    </style>
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
                    
                    <li class="nav-item dropdown">
                        <a href="payement.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"></a>
                        <ul class="dropdown-menu">
                            <li><a href="" class="dropdown-item">première tranche</a></li>
                            <li><a href="" class="dropdown-item">deuxième tranche</a></li>
                            <li><a href="" class="dropdown-item">troisième tranche</a></li>
                            <li><a href="" class="dropdown-item">enrolement tranche</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="carte.php">Carte d'étudiant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-login btn-block bg-primary" href="connexion.php">déconnexion</a>²
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu -->
    <div class="container mt-5 border border-3 border-danger ">
        <div class="jumbotron animation">
            <h1 class="paye">Payez vos frais académiques ici</h1>
            <p>payez facilement et avec séurité vos frais </p>
        </div>
    </div>
    <div class="container mt-5 border border-3 border-danger">
        <div class="jumbotron animation">
            <h1>Payez vos frais académiques ici</h1>
            <p>Enregistrez-vous pour la nouvelle session et obtenez votre carte d'étudiant.</p>
        </div>
    </div>
    <div class="container mt-5 border border-3 border-danger">
        <div class="jumbotron animation">
            <h1>Payez vos frais académiques ici</h1>
            <p>Enregistrez-vous pour la nouvelle session et obtenez votre carte d'étudiant.</p>
        </div>
    </div>

    
    <script src="bootstrap.bundle.min.js"></script>
    
</body>
</html>
