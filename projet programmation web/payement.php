<?php
include("connexion_base.php");
session_start();
if(!($_SESSION['id_etudiant'])){
    header("location: index.php");
}
if(isset($_POST['statut_payement'])){
    $tranche = $_POST['tranche'];
    $id_etudiant = $_SESSION['id_etudiant'];
    $sql = "SELECT * FROM frais_academique WHERE id_etudiant = '$id_etudiant' AND tranche = '$tranche'";
    $data = $dbh->query($sql);
    $result = $data->fetch();
    if($result){

        $_SESSION['message_statut'] = "vous avez déjà payé pour cette tranche";
        $color = "alert-success";
    } else {
        $_SESSION['message_statut'] = "Payement non effectué";
        $color = "alert-danger";
    }
    header("location: payement.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Université américaine de Kinshasa</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="payement.css">
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
                    <li class="nav-item" >
                        <a class="nav-link" href="payement.php" style="border-bottom: 2px solid white;">Frais académiques</a>
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
        <h2 class="text-danger text-center mt-4">ici le payement de vos frais académiques</h2>
    </div>
    
    <div class="container light-style flex-grow-1 container-p-y">
        <h2 class="font-weight-bold py-3 mb-4 text-primary">
            le payement de vos frais

        </h2>
        <!-- menu à gauche -->
        <div class="container">
        <div class="row">
  <div class="col-md-3 border">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link a" id="menu_click" href="#formulaire1">première tranche</a>
      </li>
      <li class="nav-item">
        <a class="nav-link a" id="menu_click" href="#formulaire2">deuxième tranche</a>
      </li>
      <li class="nav-item">
        <a class="nav-link a" id="menu_click" href="#formulaire3">troisième tranche</a>
      </li>
      <li class="nav-item">
        <a class="nav-link a" id="menu_click" href="#formulaire4">enrolement</a>
      </li>
      <li class="nav-item">
        <a class="nav-link a" id="menu" href="#formulaire5">statut payement</a>
      </li>
    </ul>
    <script>
                    document.addEventListener("DOMContentLoaded", function() {
                      document.querySelector("footer").style.position = "fixed";
                      document.querySelector("footer").style.bottom = "0";
                      document.querySelector("footer").style.width = "100%";
                    });
                    document.getElementById("menu").addEventListener("click", function() {
                        document.querySelector("footer").style.position = "fixed";
                        document.querySelector("footer").style.bottom = "0";
                        document.querySelector("footer").style.width = "100%";
                    });
                    var menuClickElements = document.querySelectorAll("#menu_click");
                    menuClickElements.forEach(function(element) {
                      element.addEventListener("click", function() {
                        document.querySelector("footer").style.position = "relative";
                      });
                    });
                  </script>
  </div>
  <div class="col-md-9">
    <div id="formulaire1"> 
      <!-- Formulaire 1 -->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Première tranche</h5>
              </div>
              <div class="card-body">
                <p class="card-text">Le montant de la première tranche est de 320$</p>
                <form action="traitement_payement.php" method="post">
                <div class="form-group">
            <label for="nomCarte">Nom sur la carte :</label>
            <input type="text" class="form-control" id="nomCarte" name="nom_carte_payement">
          </div>
          <div class="form-group">
            <label for="nomCarte">numéro de la carte :</label>
            <input type="number" class="form-control" id="nomCarte" name="numero_carte">
          </div>
          <div class="form-group">
            <label for="nomCarte">date d'expiration :</label>
            <input type="date" class="form-control" id="date_d'expiration" name="date_expiration" min="<?php echo date('Y-m-d'); ?>" required>
          </div>
          <div class="form-group">
            <label for="nomCarte">code de sécurité :</label>
            <input type="number" class="form-control" id="nomCarte" name="nom_carte_payement">
          </div>
          <button type="submit" name="payer_premiere" class="btn p mt-3">payer</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
    <div id="formulaire2"> 
      <!-- Formulaire 2 -->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">deuxième tranche</h5>
              </div>
              <div class="card-body">
                <p class="card-text">le motant de la deuxième tranche est de 330$</p>
                <form action="traitement_payement.php" method="post">
                  <div class="form-group">
                    <label for="nomCarte">Nom sur la carte :</label>
                    <input type="text" class="form-control" id="nomCarte" name="nom_carte_payement">
                  </div>
                  <div class="form-group">
                    <label for="numeroCarte">Numéro de carte :</label>
                    <input type="number" class="form-control" id="numeroCarte" name="numero_carte" min="<?php echo date('Y-m-d');?>" required>
                  </div>
                  <div class="form-group">
                    <label for="exp">date d'expiration :</label>
                    <input type="date" class="form-control" id="exp" name="date_expiration" required>
                  </div>
                  <div class="form-group">
                    <label for="codeSecurite">Code de sécurité :</label>
                    <input type="number" class="form-control" id="codeSecurite" name="code_securite" required>
                  </div>
                  <button type="submit" class="btn p mt-3" name="payer_deuxieme">payer</button>
                </form>
              </div>
            </div>
          </div> 
        </div>
      </div> 
    </div>
    <div id="formulaire3"> 
      <!-- Formulaire 3 -->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">troisème tranche</h5>
              </div>
              <div class="card-body">
                <p class="card-text">le montant de la troisième tranche est de 250$</p>
                <form action="traitement_payement.php" method="post">
                  <div class="form-group">
                    <label for="nomCarte">Nom sur la carte :</label>
                    <input type="text" class="form-control" id="nomCarte" name="nom_carte_payement">
                  </div>
                  <div class="form-group">
                    <label for="numeroCarte">Numéro de carte :</label>
                    <input type="number" class="form-control" id="numeroCarte" name="numero_carte" required>
                  </div>
                  <div class="form-group">
                    <label for="dateExpiration">Date d'expiration :</label>
                    <input type="date" class="form-control" id="dateExpiration" name="date_expiration" min="<?php echo date('Y-m-d');?>" required>
                  </div>
                  <div class="form-group">
                    <label for="codeSecurite">Code de sécurité :</label>
                    <input type="number" class="form-control" id="codeSecurite" name="code_securite" required>
                  </div>
                  <button type="submit" class="btn p mt-3" name="payer_troisieme">payer</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="formulaire4"> 
      <!-- Formulaire 4 -->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">enrolement</h5>
              </div>
              <div class="card-body">
                <p class="card-text">le motant de l'enrolement est de 20$ pour chaque tranche</p>
                <form action="traitement_payement.php" method="post">
                  <div class="form-group">
                    <label for="choix tranche">choix de la tranche</label>
                    <select name="tranche_enrolement" id="tranche_enrolement" class="form-control">
                      <option value="premiere">première</option>
                      <option value="deuxieme">deuxième</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nomCarte">Nom sur la carte :</label>
                    <input type="text" class="form-control" id="nomCarte" name="nom_carte_payement">
                  </div>
                  <div class="form-group">
                    <label for="numeroCarte">Numéro de carte :</label>
                    <input type="number" class="form-control" id="numeroCarte" name="numero_carte" required>
                  </div>
                  <div class="form-group">
                    <label for="dateExpiration">Date d'expiration :</label>
                    <input type="date" class="form-control" id="dateExpiration" name="date_expiration" min="<?php echo date('Y-m-d');?>" required>
                  </div>
                  <div class="form-group">
                    <label for="codeSecurite">Code de sécurité :</label>
                    <input type="number" class="form-control" id="codeSecurite" name="code_securite" required>
                  </div>
                  <button type="submit" class="btn p mt-3" name="payer_enrolement">payer</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="formulaire5"> 
      <!-- Formulaire 5 -->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">statut de payement de frais</h5>
              </div>
              <div class="card-body">
                <p class="card-text">choisissez la tranche de payement dont vous voulez connaitre le statut</p>
               
                <!-- affichage du message de confirmation -->
                <?php if(isset($_SESSION['message_statut']))
                if($_SESSION['message_statut'] == "vous avez déjà payé pour cette tranche"){
                    echo "<div class='alert alert-success'>".$_SESSION['message_statut']."</div>";
                } else {
                    echo "<div class='alert alert-danger'>".$_SESSION['message_statut']."</div>";
                }
                ?>
                <form action="" method="post">
                  <div class="form-group">
                    <label for="choixTranche">choix de la tranche</label>
                    <select name="tranche" id="tranche" class="form-control">
                      <option value="premiere">première</option>
                      <option value="deuxieme">deuxième</option>
                      <option value="troisieme">troisième</option>
                      <option value="enrolement_premiere">première tranche de l'enrolement</option>
                      <option value="enrolement_deuxieme">deuxième tranche de l'enrolement</option>
                    </select>
                  </div>
                  <button type="submit" class="btn p mt-3" name="statut_payement">voir le statut</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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
afficherFormulaire('formulaire5'); 
</script>


            
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

                   .p:hover{ color: red;
    background-color: #0f162e;}
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

</body>