<?php
session_start();
include("connexion_base.php");
if (!($_SESSION['id_etudiant'])) {
    header("location: index.php");
}

// affichage des informations de l'étudiant existant dans la base de données
$id_etudiant = $_SESSION['id_etudiant'];
$sql="SELECT * FROM etudiant WHERE id_etudiant = '$id_etudiant'";
$data = $dbh->query($sql)->fetchAll();
foreach($data as $row){
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
                    <li class="nav-item" >
                        <a class="nav-link" href="accueil.php" >Accueil</a>
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
    <style>
            .navbar-nav .nav-link:hover {
                border-bottom: 2px solid red;
            }
        </style>

<div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            votre profil

        </h4>
        <!-- menu à gauche -->
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">informations générales</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Changer de mot de passe</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info de payement des frais et de la cartes</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <!-- contenu du profil -->
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <form action="traitement_profil.php" method="post">
                                    <label class="btn btn-outline-primary">
                                        modifiez votre photo noter que c'est la photo que vous aurez sur votre carte d'étudiant
                                        <input type="file" name="photo" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <!-- affichage du message de confirmation -->
                            <?php
                            if (!empty($_SESSION['message_modif'])) {
                            $message = $_SESSION['message_modif'];
                            $color = '';
                            if ($message == 'Information mises à jour avec succès!') {   
                            $color = 'text-success';
                            } elseif ($message == 'erreur lors de la mise à jour des informations') {
                            $color = 'text-danger';
                            }
                            elseif ($message == 'Aucune information à mettre à jour') {
                            $color = 'text-primary';
                            }
                            ?>
                            <h5 class="text-center <?php echo $color; ?> alert"><?php echo $message; ?></h5>
                            <?php } ?>

                            

                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Nom</label>
                                    <input type="text" name="nom_etudiant" class="form-control mb-1" value="<?php echo $nom_etudiant;?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">post-nom</label>
                                    <input type="text" name="postnom_etudiant" class="form-control" value="<?php echo $postnom_etudiant;?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">prenom</label>
                                    <input type="text" name="prenom_etudiant" class="form-control mb-1" value="<?php echo $prenom_etudiant;?>">   
                                </div>
                                <div class="form-group">
                                    <label class="form-label">matricule</label>
                                    <input type="number" name="matricule" class="form-control" value="<?php echo $matricule;?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">email</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo $email;?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">date de naissance</label>
                                    <input type="date" name="date_naissance" class="form-control" value="<?php echo $date_naissance;?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">adresse</label>
                                    <input type="text" name="adresse_etudiant" class="form-control" value="<?php echo $adresse_etudiant;?>">
                                </div>
                                <div class="form-group">
                            <label for="">faculté</label>
                            <select id="" name="faculte" class="form-control" required>
                                <option value="sciences informatique">Sciences Informatique</option>
                                <option value="économie">Économie</option>
                                <option value="relation internationale">Relation Internationale</option>
                                <option value="architectecture">architecture</option>
                                <option value="polytechnique">politechnique</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="">licence</label>
                            <select id="" name="licence" class="form-control" required>
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
                            </div>
                        </div>
                        <!-- info de payement des frais et de la carte -->

                        <script>
                            // Récupérer le mot de passe actuel depuis la base de données
                            var motDePasseActuel = "<?php echo $mot_de_passe; ?>";

                            // Vérifier si le mot de passe actuel correspond à celui entré par l'utilisateur
                            function verifierMotDePasseActuel() {
                                var motDePasseActuelInput = document.getElementById("mot_de_passeA").value;
                                if (motDePasseActuelInput !== motDePasseActuel) {
                                    alert("Le mot de passe actuel est incorrect");
                                    return false;
                                }
                                return true;
                            }

                            // Vérifier si le nouveau mot de passe correspond à celui répété
                            function verifierNouveauMotDePasse() {
                                var nouveauMotDePasse = document.getElementById("mot_de_passe").value;
                                var motDePasseRepete = document.getElementById("mot_de_passeC").value;
                                if (nouveauMotDePasse !== motDePasseRepete) {
                                    alert("Le nouveau mot de passe ne correspond pas au mot de passe répété");
                                    return false;
                                }
                                return true;
                            }

                            // Valider le formulaire avant de le soumettre
                            function validerFormulaire() {
                                if (!verifierMotDePasseActuel() || !verifierNouveauMotDePasse()) {
                                    return false;
                                }
                                return true;
                            }

                            // Ajouter un événement de soumission du formulaire
                            var formulaire = document.getElementById("account-change-password");
                            formulaire.addEventListener("submit", function(event) {
                                if (!validerFormulaire()) {
                                    event.preventDefault();
                                }
                            });
                        </script>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                     <h3>ici vous retrouvrez les informations en liens avec les payements de vos frais et de larte d'étudiant</h3>   
                                
                                <div class="form-group">
                                    <label class="form-label">selectionné le payement dont vous voulez connaitre le statut</label>
                                    <select class="form-control" name="tranche">
                                        <option value="" selected disabled>Select a payment option</option>
                                        <option value="premiere">première tranche</option>
                                        <option value="deuxieme">deuxième tranche</option>
                                        <option value="troisieme">troisième tranche</option>
                                        <option value="carte_etudiant">frais de la carte d'étudiant</option>
                                        <option value="enrolement">frais d'enrolement</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">information sur le payement</h6>
                            </div>
                        </div>
                       
                        <div class="tab-pane fade" id="account-notifications">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Activity</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone comments on my article</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone answers on my forum
                                            thread</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone follows me</span>
                                    </label>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Application</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">News and announcements</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Weekly product updates</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Weekly blog digest</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="submit" name="modifier" class="btn btn-primary">enregistrer les modifications</button>&nbsp;
        </div>
        </form>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    </script>

</body>
</html>