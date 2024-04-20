<?php
session_start();
include("connexion_base.php");

if (!isset($_SESSION['id_etudiant'])) {
    header("location: index.php");
    exit;
}

// affichage des informations de l'étudiant existant dans la base de données
$id_etudiant = $_SESSION['id_etudiant'];
$mot_de_passe_actuel = $_SESSION['mdp'];
$sql = "SELECT * FROM etudiant WHERE id_etudiant = '$id_etudiant'";
$data = $dbh->query($sql)->fetchAll();

foreach ($data as $row) {
    $nom_etudiant = $row['nom_etudiant'];
    $postnom_etudiant = $row['postnom_etudiant'];
    $prenom_etudiant = $row['prenom_etudiant'];
    $matricule = $row['matricule'];
    $email = $row['email'];
    $date_naissance = $row['date_naissance'];
    $adresse_etudiant = $row['adresse'];
    $faculte = $row['faculte'];
    $licence = $row['licence'];
    $mot_de_passe = $row['mot_de_passe'];
    $photo = $row['photo_etudiant'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Université américaine de Kinshasa</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="profil.css">
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
                    <li class="nav-item">
                        <a class="nav-link" href="accueil.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="payement.php">Frais académiques</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="carte.php">Carte d'étudiant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profil.php" style="border-bottom: 2px solid white;">Votre profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-login btn-block bg-primary" href="logout.php">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container light-style flex-grow-1 container-p-y">
        <h2 class="font-weight-bold py-3 mb-4 text-primary">
            Votre profil
        </h2>

        <!-- menu à gauche -->
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0" style="border-right: 1px solid #b6b9c4;">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active a" id="menu_click" data-toggle="list" href="#account-general">informations générales</a>
                        <a class="list-group-item list-group-item-action a" id="menu" data-toggle="list" href="#account-change-password">Changer de mot de passe</a>
                    </div>
                    <script>
                        document.getElementById("menu").addEventListener("click", function() {
                            document.querySelector("footer").style.position = "fixed";
                            document.querySelector("footer").style.bottom = "0";
                            document.querySelector("footer").style.width = "100%";
                        });

                        //quand on clique sur l'onglet informations générales le footer redevient comme avant
                        document.getElementById("menu_click").addEventListener("click", function() {
                            document.querySelector("footer").style.position = "relative";
                        });
                    </script>
                </div>

                <!-- contenu du profil -->
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <center><img src="./images/<?php echo $photo; ?>" class="my-3 w-25" alt="photo de profil"></center>
                                <div class="media-body ml-4">
                                    <form action="traitement_profil.php" method="post" enctype="multipart/form-data">
                                        <center>
                                            <label> modifiez votre photo noter que c'est la photo que vous aurez sur votre carte d'étudiant</label>
                                            <br>
                                            <input type="file" class="form-control justify-content-center w-25" name="photo" id="">
                                        </center>
                                </div>
                            </div>
                            <hr class="border-light m-0">

                            <!-- affichage du message de confirmation -->
                            <?php if (!empty($_SESSION['message_modif'])) : ?>
                                <?php
                                $message = $_SESSION['message_modif'];
                                $color = '';

                                if ($message == 'Information mises à jour avec succès!') {
                                    $color = 'text-success';
                                } elseif ($message == 'erreur lors de la mise à jour des informations') {
                                    $color = 'text-danger';
                                } elseif ($message == 'Aucune information à mettre à jour') {
                                    $color = 'text-primary';
                                }
                                ?>

                                <h5 class="text-center <?php echo $color; ?>"><?php echo $message; ?></h5>
                            <?php endif; ?>

                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Nom</label>
                                    <input type="text" name="nom_etudiant" class="form-control mb-1" placeholder="<?php echo $nom_etudiant; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">post-nom</label>
                                    <input type="text" name="postnom_etudiant" class="form-control" placeholder="<?php echo $postnom_etudiant; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">prenom</label>
                                    <input type="text" name="prenom_etudiant" class="form-control mb-1" placeholder="<?php echo $prenom_etudiant; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Sexe</label>
                                    <select name="sexe" class="form-control">
                                        <option value="masculin">Homme</option>
                                        <option value="feminin">Femme</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">matricule</label>
                                    <input type="number" name="matricule" class="form-control" placeholder="<?php echo $matricule; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">email</label>
                                    <input type="email" name="email" class="form-control" placeholder="<?php echo $email; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">date de naissance</label>
                                    <input type="date" name="date_naissance" class="form-control" placeholder="<?php echo $date_naissance; ?>" max="2007-01-01">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">adresse</label>
                                    <input type="text" name="adresse_etudiant" class="form-control" placeholder="<?php echo $adresse_etudiant; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">faculté</label>
                                    <select id="" name="faculte" class="form-control">
                                        <option value="sciences informatique">Sciences Informatique</option>
                                        <option value="économie">Économie</option>
                                        <option value="relation internationale">Relation Internationale</option>
                                        <option value="architectecture">architecture</option>
                                        <option value="polytechnique">politechnique</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">licence</label>
                                    <select id="" name="licence" class="form-control">
                                        <option value="premiere">première</option>
                                        <option value="deuxieme">deuxième</option>
                                        <option value="trosieme">trosième</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">mot de passe actuel</label>
                                    <input type="password" id="mot_de_passeA" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">nouveau mot de passe</label>
                                    <input type="password" id="mot_de_passe" name="mot_de_passe" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">répétez le mot de passe</label>
                                    <input type="password" id="mot_de_passeC" class="form-control">
                                </div>
                                <script>
                                    var mot_de_passeA = document.getElementById("mot_de_passeA");
                                    var mot_de_passe = document.getElementById("mot_de_passe");
                                    var mot_de_passeC = document.getElementById("mot_de_passeC");

                                    mot_de_passeC.addEventListener("input", function() {
                                        if (mot_de_passe.value !== mot_de_passeC.value) {
                                            mot_de_passeC.setCustomValidity("Les mots de passe ne correspondent pas");
                                        } else {
                                            mot_de_passeC.setCustomValidity("");
                                        }
                                    });

                                    var mdp_actuel = "<?php echo $mot_de_passe_actuel; ?>";

                                    function validateForm() {
                                        if (mot_de_passe_actuel.value !== mdp_actuel) {
                                            mot_de_passe_actuel.setCustomValidity("Le mot de passe actuel est incorrect");
                                        } else {
                                            mot_de_passe_actuel.setCustomValidity("");
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-right mt-3">
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
                    color: red;
                    background-color: #0f162e;
                }
                .nav-link:hover {
                    border-bottom: 2px solid red;
                }
                .a:hover {
                    background-color: #0f162e;
                    color: white;
                }
            
            </style>
            <button type="submit" name="modifier" id="btn" class="btn mb-3">enregistrer les modifications</button>
        </div>
        </form>
    </div>

    <!-- footer -->
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

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    </script>

</body>

</html>