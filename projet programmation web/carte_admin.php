<?php
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
    <title>carte admin</title>
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
                    <a class="nav-link" href="payement_admin.php" >Frais académiques</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="carte_admin.php" style="border-bottom: 2px solid white;">Carte d'étudiant</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-login btn-block bg-primary" href="logout.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style>
                    .a {
    background-color: #0f162e;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-weight: 500;
}

                   .a:hover{ color: #eb0c0c;
    background-color: #0f162e;}
    .nav-link:hover{
        border-bottom: 2px solid red;
    }

</style>

<!-- affichage dans un tableau très style les cartes d'étudiant dont le frais a été payé -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- barre de recherche pour filtrer les étudiants -->
            <form action="" method="post" class="mt-5">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Rechercher un étudiant par nom" name="recherche">
                    <button class="btn a" name="cherche" type="submit">Rechercher</button>
                </div>
            </form>
            <?php
            if (isset($_POST['cherche'])) {
                // Votre code de recherche ici
                $recherche = $_POST['recherche'];
                $sql = "SELECT * FROM cartes_etudiant WHERE id_etudiant IN (SELECT id_etudiant FROM etudiant WHERE nom_etudiant LIKE :recherche)";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':recherche', $recherche, PDO::PARAM_STR);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    echo "<h4 class='text-center'>Liste des étudiants ayant une carte d'étudiant avec certaines de leurs informations</h4>";
                    echo "<div class='table-responsive'>";
                    echo "<table class='table table-bordered'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>nom</th>";
                    echo "<th>prenom</th>";
                    echo "<th>email</th>";
                    echo "<th>faculté</th>";
                    echo "<th>adresse</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $id_etudiant = $row['id_etudiant'];
                        $sql_etudiant = "SELECT * FROM etudiant WHERE id_etudiant = :id";
                        $stmt_etudiant = $dbh->prepare($sql_etudiant);
                        $stmt_etudiant->bindParam(':id', $id_etudiant, PDO::PARAM_INT);
                        $stmt_etudiant->execute();
                        if ($stmt_etudiant->rowCount() > 0) {
                            $row_etudiant = $stmt_etudiant->fetch(PDO::FETCH_ASSOC);
                            echo "<tr>";
                            echo "<td>" . $row_etudiant['nom_etudiant'] . "</td>";
                            echo "<td>" . $row_etudiant['prenom_etudiant'] . "</td>";
                            echo "<td>" . $row_etudiant['email'] . "</td>";
                            echo "<td>" . $row_etudiant['faculte'] . "</td>";
                            echo "<td>" . $row_etudiant['adresse'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
                } else {
                    echo "<h4 class='text-center'>Aucun étudiant trouvé</h4>";
                }

            }
            ?>
            <hr>

            <h4 class="text-center">Liste des étudiants ayant une carte d'étudiant avec certaines de leurs informations</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>nom</th>
                            <th>prenom</th>
                            <th>email</th>
                            <th>faculté</th>
                            <th>adresse</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Votre code de récupération des cartes d'étudiant 
                        $dbh = new PDO("mysql:host=localhost;dbname=auk_paye", "root", "");
                        $sql = "SELECT * FROM cartes_etudiant";
                        $result = $dbh->query($sql);
                        if ($result->rowCount() > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                $id_etudiant = $row['id_etudiant'];
                                $sql_etudiant = "SELECT * FROM etudiant WHERE id_etudiant = :id";
                                $stmt_etudiant = $dbh->prepare($sql_etudiant);
                                $stmt_etudiant->bindParam(':id', $id_etudiant, PDO::PARAM_INT);
                                $stmt_etudiant->execute();
                                if ($stmt_etudiant->rowCount() > 0) {
                                    $row_etudiant = $stmt_etudiant->fetch(PDO::FETCH_ASSOC);
                                    echo "<tr>";
                                    echo "<td>" . $row_etudiant['nom_etudiant'] . "</td>";
                                    echo "<td>" . $row_etudiant['prenom_etudiant'] . "</td>";
                                    echo "<td>" . $row_etudiant['email'] . "</td>";
                                    echo "<td>" . $row_etudiant['faculte'] . "</td>";
                                    echo "<td>" . $row_etudiant['adresse'] . "</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<footer class="bg-light text-center text-lg-start shadow-lg mt-5">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Contact</h5>
                <p>
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

<script src="bootstrap.min.js"></script>
</body>
</html>
