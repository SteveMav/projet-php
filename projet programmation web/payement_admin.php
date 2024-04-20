<?php
//connexion à la base de donnée
include("connexion_base.php");
session_start();
if(!isset($_SESSION['id_admin'])){
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="accueil.css">
    <link rel="icon" href="./images/Logo.png" type="image/ico">

    <title>payement admin</title>
</head>
<body>
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
                    <a class="nav-link" href="accueil_admin.php" >Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="payement_admin.php" style="border-bottom: 2px solid white;">Frais académiques</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="carte_admin.php">Carte d'étudiant</a>
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
    <h2 class="text-danger text-center mt-4">ici les différents frais académiques effectués sur le site</h2>
</div>

<div class="container light-style flex-grow-1 container-p-y">
    <h5 class="font-weight-bold py-3 mb-4 text-primary">
        affichage des paiements
    </h5>
    <!-- menu à gauche -->
    <div class="container">
        <div class="row">
            <div class="col-md-3 border">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link a" id="menu_click1" href="#formulaire1">première tranche</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" id="menu_click2" href="#formulaire2">deuxième tranche</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" id="menu_click3" href="#formulaire3">troisième tranche</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" id="menu_click4" href="#formulaire4">enrolement</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div id="formulaire1"> 
                    <!-- affichage de tous les paiements de la première tranche dans un tableau -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">première tranche</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Faculté</th>
                                                        <th>Montant</th>
                                                        <th>Date de paiement</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // Récupérer les paiements de la première tranche
                                                    $sql = "SELECT * FROM frais_academique WHERE tranche = 'premiere'";
                                                    $result = $dbh->query($sql)->fetchAll();
                                                    // Afficher les paiements
                                                    foreach ($result as $paiement) {
                                                        $id_etudiant = $paiement['id_etudiant'];
                                                        $sql_etudiant = "SELECT * FROM etudiant WHERE id_etudiant = '$id_etudiant'";
                                                        $result_etudiant = $dbh->query($sql_etudiant)->fetch(PDO::FETCH_ASSOC);
                                                        echo "<tr>";
                                                        echo "<td>" . $result_etudiant['nom_etudiant'] . "</td>";
                                                        echo "<td>" . $result_etudiant['prenom_etudiant'] . "</td>";
                                                        echo "<td>" . $result_etudiant['faculte'] . "</td>";
                                                        echo "<td>100$</td>";
                                                        echo "<td>" . $paiement['date_payement'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="formulaire2">
                    <!-- affichage de tous les paiements de la deuxième tranche dans un tableau -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">deuxième tranche</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Faculté</th>
                                                        <th>Montant</th>
                                                        <th>Date de paiement</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // Récupérer les paiements de la deuxième tranche
                                                    $sql = "SELECT * FROM frais_academique WHERE tranche = 'deuxieme'";
                                                    $result = $dbh->query($sql)->fetchAll();
                                                    // Afficher les paiements
                                                    foreach ($result as $paiement) {
                                                        $id_etudiant = $paiement['id_etudiant'];
                                                        $sql_etudiant = "SELECT * FROM etudiant WHERE id_etudiant = '$id_etudiant'";
                                                        $result_etudiant = $dbh->query($sql_etudiant)->fetch(PDO::FETCH_ASSOC);
                                                        echo "<tr>";
                                                        echo "<td>" . $result_etudiant['nom_etudiant'] . "</td>";
                                                        echo "<td>" . $result_etudiant['prenom_etudiant'] . "</td>";
                                                        echo "<td>" . $result_etudiant['faculte'] . "</td>";
                                                        echo "<td>150$</td>";
                                                        echo "<td>" . $paiement['date_payement'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="formulaire3"> 
                    <!-- affichage de tous les paiements de la troisième tranche dans un tableau -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">troisième tranche</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Faculté</th>
                                                        <th>Montant</th>
                                                        <th>Date de paiement</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // Récupérer les paiements de la troisième tranche
                                                    $sql = "SELECT * FROM frais_academique WHERE tranche = 'troisieme'";
                                                    $result = $dbh->query($sql)->fetchAll();
                                                    // Afficher les paiements
                                                    foreach ($result as $paiement) {
                                                        $id_etudiant = $paiement['id_etudiant'];
                                                        $sql_etudiant = "SELECT * FROM etudiant WHERE id_etudiant = '$id_etudiant'";
                                                        $result_etudiant = $dbh->query($sql_etudiant)->fetch(PDO::FETCH_ASSOC);
                                                        echo "<tr>";
                                                        echo "<td>" . $result_etudiant['nom_etudiant'] . "</td>";
                                                        echo "<td>" . $result_etudiant['prenom_etudiant'] . "</td>";
                                                        echo "<td>" . $result_etudiant['faculte'] . "</td>";
                                                        echo "<td>200$</td>";
                                                        echo "<td>" . $paiement['date_payement'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="formulaire4"> 
                    <!-- affichage de tous les paiements de l'enrolement tranche dans un tableau-->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">enrolement</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Faculté</th>
                                                        <th>Montant</th>
                                                        <th>tranche enrolement</th>
                                                        <th>Date de paiement</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // Récupérer les paiements de l'enrolement
                                                    $sql = "SELECT * FROM enrolement WHERE tranche_enrolement = 'premiere' OR tranche_enrolement = 'deuxieme'";
                                                    $result = $dbh->query($sql)->fetchAll();
                                                    // Afficher les paiements
                                                    foreach ($result as $paiement) {
                                                        $id_etudiant = $paiement['id_etudiant'];
                                                        $sql_etudiant = "SELECT * FROM etudiant WHERE id_etudiant = '$id_etudiant'";
                                                        $result_etudiant = $dbh->query($sql_etudiant)->fetch(PDO::FETCH_ASSOC);
                                                        echo "<tr>";
                                                        echo "<td>" . $result_etudiant['nom_etudiant'] . "</td>";
                                                        echo "<td>" . $result_etudiant['prenom_etudiant'] . "</td>";
                                                        echo "<td>" . $result_etudiant['faculte'] . "</td>";
                                                        echo "<td>20$</td>";
                                                        echo "<td>" . $paiement['tranche_enrolement'] . "</td>";
                                                        echo "<td>" . $paiement['date_payement'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    
    .p {
        background-color: #0f162e;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-weight: 500;
    }

    .p:hover {
        color: red;
        background-color: #0f162e;
    }

    .a:hover {
        background-color: #0f162e;
        color: white;
    }
</style>

<footer class="bg-light text-center text-lg-start mt-5">
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
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
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

<script src="bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>
    // Fonction pour afficher le formulaire correspondant
    function afficherFormulaire(id) {
        // Masquer tous les formulaires
        const formulaires = document.querySelectorAll('.col-md-9 > div');
        formulaires.forEach(formulaire => formulaire.style.display = 'none');

        // Afficher le formulaire sélectionné
        document.getElementById(id).style.display = 'block';
    }

    // Ajouter un écouteur d'événements à chaque lien
    const liens = document.querySelectorAll('.a');
    liens.forEach(lien => {
        lien.addEventListener('click', function(event) {
            event.preventDefault(); // Empêcher le comportement par défaut du lien
            const id = this.getAttribute('href').substring(1); // Extraire l'ID du formulaire
            afficherFormulaire(id);
        });
    });

    // Afficher le premier formulaire par défaut
    afficherFormulaire('formulaire1'); 

    // recupération du lien cliqué et verification de la hauteur de la page et en fonction mettre le footer soit relatif ou fixe
    document.addEventListener("DOMContentLoaded", function() {
    // Sélectionnez votre pied de page
    const footer = document.querySelector("footer");

    // Fonction pour fixer le pied de page en bas
    function fixFooter() {
        footer.style.position = "fixed";
        footer.style.bottom = "0";
        footer.style.width = "100%";
    }

    // Fonction pour rendre le pied de page relatif
    function makeFooterRelative() {
        footer.style.position = "relative";
    }

    // recupération des chaque lien cliqué un à un
    const menuClickElements = document.querySelectorAll(".a");



    // Parcourez chaque élément et appliquez le script
    menuClickElements.forEach(function(element) {
        element.addEventListener("click", function() {
            const linkHeight = element.offsetHeight; // Hauteur de l'élément de lien
            const windowHeight = window.innerHeight; // Hauteur de la fenêtre du navigateur

            if (linkHeight > windowHeight) {
                // Si les données du lien sont plus larges que la hauteur de la page, rendez le pied de page relatif
                makeFooterRelative();
            } else {
                // Sinon, fixez le pied de page en bas
                fixFooter();
            }
        });
    });
});


</script>

</body>
</html>
