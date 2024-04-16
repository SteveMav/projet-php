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
    
    <div class="container mt-5">
      <!-- affichage du message de confirmation première tranche -->
      <?php
    if (!empty($_SESSION['message_première'])) {
      $color = '';

      if ( $_SESSION['message_première'] == 'Paiement effectué avec succès!') {
      $color = 'text-success';
      } elseif ($_SESSION['message_première'] == 'Vous avez déjà payé la première tranche!') {
      $color = 'text-primary';
      } elseif ($_SESSION['message_première'] == 'Erreur lors du paiement') {
      $color = 'text-danger';
      }
      ?>

      <h5 class="text-center <?php echo $color; ?> alert"><?php echo $_SESSION['message_première']; ?></h5>

    <?php } ?>
      
      <div class="container mt-2 w-400 border rounded-4 border-3 border-dark bg-primary text-white" style="width: 50%; height: 100px;">
      
        <button class="btn btn-primary" data-toggle="modal" data-target="#premiereTrancheModal">Première tranche</button>
      </div>
            <!-- affichage du message de confirmation deuxième tranche -->
      <?php
    if (!empty($_SESSION['message_deuxième'])) {
      $color = '';

      if ($_SESSION['message_deuxième'] == 'Paiement effectué avec succès!') {
      $color = 'text-success';
      } elseif ($_SESSION['message_deuxième'] == 'Vous avez déjà payé la deuxième tranche!') {
      $color = 'text-primary';
      } elseif ($_SESSION['message_deuxième'] == 'Erreur lors du paiement') {
      $color = 'text-danger';
      }
      ?>
      <h5 class="text-center <?php echo $color; ?> alert"><?php echo $_SESSION['message_deuxième'];?></h5>
    <?php } ?>

      <div class="container mt-2 w-400 border rounded-4 border-3 border-dark bg-primary text-white" style="width: 50%; height: 100px;">
        <button class="btn btn-primary" data-toggle="modal" data-target="#deuxiemeTrancheModal" >deuxième tranche</button>
      </div>
      <!-- affichage du message de confirmation troisième tranche-->
      <?php
    if (!empty($_SESSION['message_troisième'])) {
      $color = '';

      if ($_SESSION['message_troisième'] == 'Paiement effectué avec succès!') {
      $color = 'text-success';
      } elseif ($_SESSION['message_troisième'] == 'Vous avez déjà payé la troisième tranche!') {
      $color = 'text-primary';
      } elseif ($_SESSION['message_troisième'] == 'Erreur lors du paiement') {
      $color = 'text-danger';
      }
      ?>
      <h5 class="text-center <?php echo $color; ?> alert"><?php echo $_SESSION['message_troisième'];?></h5>
    <?php } ?>
      <div class="container mt-2 w-400 border rounded-4 border-3 border-dark bg-primary text-white" style="width: 50%; height: 100px;">
        <button class="btn btn-primary" data-toggle="modal" data-target="#troisiemeTrancheModal">troisième tranche</button>
      </div>
      <!-- affichage du message de confirmation enrolement -->
      <?php
    if (!empty($_SESSION['message_enrolement'])) {
      $color = '';

      if ($_SESSION['message_enrolement'] == 'Paiement effectué avec succès!') {
      $color = 'text-success';
      } elseif ($_SESSION['message_enrolement'] == 'Vous avez déjà payé pour l\'enrolement!') {
      $color = 'text-primary';
      } elseif ($_SESSION['message_enrolement'] == 'Erreur lors du paiement') {
      $color = 'text-danger';
      }
      ?>
      <h5 class="text-center <?php echo $color; ?> alert"><?php echo $_SESSION['message_enrolement'];?></h5>
    <?php } ?>

      <div class="container mt-2 w-400 border rounded-4 border-3 border-dark bg-primary text-white" style="width: 50%; height: 100px;">
        <button class="btn btn-primary" data-toggle="modal" data-target="#enrolementModal">enrolement</button>
      </div>
    </div>


    <!-- boite de dialogue -->
    <div class="modal fade" id="premiereTrancheModal" tabindex="-1" role="dialog" aria-labelledby="premiereTrancheModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formulaireModalLabel">Formulaire de paiement - première tranche</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
        <form method="post" action="traitement_payement.php">
          
          <h5>Informations de paiement</h5>
          <h6>payement par carte</h6>
          </div>
          <div id="cartePaiement">
          <div class="form-group">
            <label for="nomCarte">Nom sur la carte :</label>
            <input type="text" class="form-control" id="nomCarte" name="nom_carte_payement">
          </div>
          <div class="form-group">
            <label for="numeroCarte">Numéro de carte :</label>
            <input type="number" class="form-control" id="numeroCarte" name="numero_carte" required>
          </div>
           <!-- date d'expiration de la carte -->
          <div class="form-group">
          <label for="dateExpiration">Date d'expiration :</label>
          <input type="date" class="form-control" id="dateExpiration" name="date_expiration" required>
          </div>

          <div class="form-group">
            <label for="codeSecurite">Code de sécurité :</label>
            <input type="number" class="form-control" id="codeSecurite" name="code_securite" required>
          </div>
          </div>
          <button type="submit" name="payer_premiere" class="btn btn-primary mt-3" data-toggle="modal" data-target="#maBoiteDialogue">Payer</button>
        </form>
        </div>
      </div>
      
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" name="enregistrement_carte" class="btn btn-primary">Enregistrer</button>
      </div>
      </div>
    </div>
    </div>
  </div>
   

  <div class="modal fade" id="deuxiemeTrancheModal" tabindex="-1" role="dialog" aria-labelledby="deuxiemeTrancheModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formulaireModalLabel">Formulaire de paiement - deuxième tranche</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
        <form method="post" action="traitement_payement.php">
          
          <h5>Informations de paiement</h5>
          <h6>payement par carte</h6>
          </div>
          <div id="cartePaiement">
          <div class="form-group">
            <label for="nomCarte">Nom sur la carte :</label>
            <input type="text" class="form-control" id="nomCarte" name="nom_carte_payement">
          </div>
          <div class="form-group">
            <label for="numeroCarte">Numéro de carte :</label>
            <input type="number" class="form-control" id="numeroCarte" name="numero_carte" required>
          </div>
           <!-- date d'expiration de la carte -->
          <div class="form-group">
          <label for="dateExpiration">Date d'expiration :</label>
          <input type="date" class="form-control" id="dateExpiration" name="date_expiration" required>
          </div>

          <div class="form-group">
            <label for="codeSecurite">Code de sécurité :</label>
            <input type="number" class="form-control" id="codeSecurite" name="code_securite" required>
          </div>
          </div>
          <button type="submit" name="payer_deuxieme" class="btn btn-primary mt-3" data-toggle="modal" data-target="#maBoiteDialogue">Payer</button>
        </form>
        </div>
      </div>
      
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" name="enregistrement_carte" class="btn btn-primary">Enregistrer</button>
      </div>
      </div>
    </div>
    </div>
  </div>
   

  <div class="modal fade" id="troisiemeTrancheModal" tabindex="-1" role="dialog" aria-labelledby="troisiemeTrancheModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formulaireModalLabel">Formulaire de paiement - troisième tranche</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
        <form method="post" action="traitement_payement.php">
          
          <h5>Informations de paiement</h5>
          <h6>payement par carte</h6>
          </div>
          <div id="cartePaiement">
          <div class="form-group">
            <label for="nomCarte">Nom sur la carte :</label>
            <input type="text" class="form-control" id="nomCarte" name="nom_carte_payement">
          </div>
          <div class="form-group">
            <label for="numeroCarte">Numéro de carte :</label>
            <input type="number" class="form-control" id="numeroCarte" name="numero_carte" required>
          </div>
           <!-- date d'expiration de la carte -->
          <div class="form-group">
          <label for="dateExpiration">Date d'expiration :</label>
          <input type="date" class="form-control" id="dateExpiration" name="date_expiration" required>
          </div>

          <div class="form-group">
            <label for="codeSecurite">Code de sécurité :</label>
            <input type="number" class="form-control" id="codeSecurite" name="code_securite" required>
          </div>
          </div>
          <button type="submit" name="payer_troisieme" class="btn btn-primary mt-3" data-toggle="modal" data-target="#maBoiteDialogue">Payer</button>
        </form>
        </div>
      </div>
      
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" name="enregistrement_carte" class="btn btn-primary">Enregistrer</button>
      </div>
      </div>
    </div>
    </div>
  </div>
   

  <div class="modal fade" id="enrolementModal" tabindex="-1" role="dialog" aria-labelledby="enrolementModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formulaireModalLabel">Formulaire de paiement - l'enrolement est à 20$</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
        <form method="post" action="traitement_payement.php">
          
          <h5>Informations de paiement</h5>
          <h6>payement par carte</h6>
          </div>
          <div id="cartePaiement">
          <div>
          <div class="form-group">
            <label for="nomCarte">choix de la tranche de l'enrolement :</label>
            <select class="form-control" id="nomCarte" name="tranche_enrolement">
              <option value="premiere">Première tranche</option>
              <option value="deuxieme">Deuxième tranche</option>
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
           <!-- date d'expiration de la carte -->
          <div class="form-group">
          <label for="dateExpiration">Date d'expiration :</label>
          <input type="date" class="form-control" id="dateExpiration" name="date_expiration" required>
          </div>

          <div class="form-group">
            <label for="codeSecurite">Code de sécurité :</label>
            <input type="number" class="form-control" id="codeSecurite" name="code_securite" required>
          </div>
          </div>
          <button type="submit" name="payer_enrolement" class="btn btn-primary mt-3" data-toggle="modal" data-target="#maBoiteDialogue">Payer</button>
        </form>
        </div>
      </div>
      
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" name="enregistrement_carte" class="btn btn-primary">Enregistrer</button>
      </div>
      </div>
    </div>
    </div>
  </div>
  <footer class="bg-light text-center text-lg-start">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  © 2024 Université américaine de Kinshasa
  </div>
</footer>
   
<script src="bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>