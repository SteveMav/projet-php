<?php
include("traitement_carte.php");
if (!($_SESSION['id_etudiant'])) {
  header("location: index.php");
}
foreach ($data as $row){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Université américaine de Kinshasa</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="carte.css">
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
                    <li class="nav-item" >
                        <a class="nav-link" href="carte.php" style="border-bottom: 2px solid white;">Carte d'étudiant</a>
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


  <div class="container mt-5 ">
    <h2 class="text-danger text-center">vous avez là l'apercu de votre futur carte d'étudiant</h2>
    <!-- message de confirmation -->
    <?php
    if (!empty($_SESSION['message'])) {
      $message = $_SESSION['message'];
      $color = '';

      if ($message == 'Paiement effectué avec succès!') {
      $color = 'text-success';
      } elseif ($message == 'Vous avez déjà payé pour la carte!') {
      $color = 'text-primary';
      } elseif ($message == 'Erreur lors du paiement') {
      $color = 'text-danger';
      }
      ?>

      <h5 class="text-center <?php echo $color; ?> alert"><?php echo $message; ?></h5>

    <?php } ?>
    

    <div class="row justify-content-start mt-5">
      <div class="col-md-6 mx-auto">
        <div class="card student-card">
          <div class="card-body">
            <div class="student-avatar">
               <img src="./images/Logo.png" alt="" width="40" class="justify-content-start"> CARTE D'ETUDIANT
            </div>
          
            <h5 class="card-title student-name text-right"><?php echo $row['nom_etudiant'].' '.$row['prenom_etudiant']; ?></h5>
            <div class="student-info">
              <p><strong>numero matricule:</strong> <?php echo $row['matricule'];?></p>
              <p><strong>Date de naissance :</strong> <?php echo date('d/m/Y', strtotime($row['date_naissance'])); ?></p>

              <p><strong>licence:</strong> <?php echo $row['licence'];?></p>
              <p><strong>Faculté:</strong> <?php echo $row['faculte']; }?></p>
              <p><strong>Date d'expiration :</strong> <?php echo date('d-m-Y', strtotime('+1 year')); ?></p>
              <p><strong>Année académique:</strong> 2023-2024</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-6">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formulaireModal">
      Commander la carte
      </button>
    </div>
    </div>

    <div class="modal fade" id="formulaireModal" tabindex="-1" role="dialog" aria-labelledby="formulaireModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formulaireModalLabel">Formulaire de paiement - La carte est à 10$</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
        <form method="post" action="commande_carte.php">
          
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
          <button type="submit" name="payer" class="btn btn-primary mt-3" data-toggle="modal" data-target="#maBoiteDialogue">Payer</button>
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
   


  <footer class="bg-light text-center text-lg-start" id="connexion">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: #b6b9c4;position: absolute;
bottom: 0;
width: 100%;
">
    © 2024 Copyright:
    <a class="text-dark" href="https://american.french-american.edu/">Université américaine de Kinshasa</a>
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
