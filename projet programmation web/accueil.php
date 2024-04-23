<?php
session_start();
if(!($_SESSION['id_etudiant'])){
    header("location: index.html");
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
    <div class="container">
        <div class="row align-items-center header" style="height: 500px;">
            <div class="col-md-6 header_a">
                <h1 class="">bienvenue dans AUK paye un site de payement de l'université américaine de kinshasa</h1>
                <p class="">Nous sommes là pour faciliter votre processus de paiement des frais académiques. Découvrez notre plateforme sécurisée qui vous permet de régler vos frais en toute simplicité, vous rapprochant ainsi de la réalisation de vos ambitions éducatives.</p>

                <style>
                    .btn {
                        background-color: #0f162e;
                        color: #ffffff;
                        border: none;
                        border-radius: 5px;
                        padding: 10px 20px;
                        font-weight: 500;
                    }

                    #btn:hover {
                        color: #eb0c0c;
                        background-color: #0f162e;
                    }
                </style>
                <a href="payement.php" class="btn" id="btn"> Accedez <i class="fa fa-arrow-rigth"></i></a>
            </div>
            <div class="col-md-6 d-none d-sm-block mb-0">
                <!-- Image of a person's profile surrounded by abstract shapes -->
                <img src="./images/etudiant_accueil.png" alt="Profile" class="img-fluid image_header" width="100%">
            </div>
        </div>
    </div>

    <div class="container-fluid p-5 mt-5" style=" background-image: url(./images/backf.jpg); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="row" style="background: none">
            <div class="col-md-3 mx-5 " style="background: none">
                <a href="payement.php" class="text-decoration-none shadow-lg" style="background: none">
                    <div class="card  mb-3" style="height: 600px !important; background: none">
                        <div class="card-body" style="color: #ffffff;background-color: #0c0c1684;">
                            <h5 class="card-title">Payez vos frais académiques ici</h5>
                            <p class="card-text">Payez facilement et en toute sécurité vos frais</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mx-5" style="background: none">
                <a href="payement.php" class="text-decoration-none shadow-lg " style="background: none">
                    <div class="card  mb-3" style="height: 600px !important;background: none">
                        <div class="card-body" style="color: #ffffff;background-color: #0c0c1684;">
                            <h5 class="card-title">Payez ici les frais d'enrolement</h5>
                            <p class="card-text">Payez facilement et en toute sécurité vos frais</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mx-5 " style="background: none">
                <a href="carte.php" class="text-decoration-none shadow-lg" style="background: none">
                    <div class="card  mb-3" style="height: 600px !important;background: none">
                        <div class="card-body" style="color: #ffffff;background-color: #0c0c1684;">
                            <h5 class="card-title">Payez et formulez ici votre carte d'élève</h5>
                            <p class="card-text">Payez facilement et en toute sécurité votre carte d'étudiant</p>
                            <p class="card-title">avec ce nouveau système en ligne </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Add animation to elements -->
    <style>
        .header_a {
            animation: slideInLeft 1s ease-in-out;
        }

        .image_header {
            animation: slideInRight 1s ease-in-out;
        }

        .card {
            animation: slideInUp 1s ease-in-out;
        }

        @keyframes slideInLeft {
            from {
                transform: translateX(-100%);
            }

            to {
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(0);
            }
        }

        @keyframes slideInUp {
            from {
                transform: translateY(100%);
            }

            to {
                transform: translateY(0);
            }
        }
    </style>
    <footer class="bg-light text-center text-lg-start">
        <div class="container-fluid p-4 shadow-lg " style="background-color: aliceblue;">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase mx-5">Contact</h5>
                    <p class="mx-5">
                        Université américaine de Kinshasa<br>
                        Adresse: 123 Rue de l'Université, Kinshasa<br>
                        Téléphone: +243833650168<br>
                        Email: info@auk.edu
                    </p>
                </div>
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0 ">
                    <h5 class="text-uppercase">Liens utiles</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="https://american.french-american.edu/" class="text-dark text-decoration-none">Site web de l'université</a>
                        </li>
                        <li>
                            <a href="https://american.french-american.edu/contact" class="text-dark text-decoration-none">Contact</a>
                        </li>
                        <li>
                            <a href="https://american.french-american.edu/about" class="text-dark text-decoration-none">À propos</a>
                        </li>
                    </ul>   
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024 Université américaine de Kinshasa. Tous droits réservés.
        </div>  
    </footer>
<script>
  
  

</script>
<script src="bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 
</body>
</html>
  
