<?php
include("traitement_carte.php");
if (!($_SESSION['id_etudiant'])) {
  header("location: index.php");
}
$sql="SELECT * FROM cartes_etudiant WHERE id_etudiant = '$id_etudiant'";
$info_carte = $dbh->query($sql)->fetchAll();
foreach($info_carte as $info){
  $date_payement = $info['date_payement'];
  $date_expiration = date('d/m/Y', strtotime('+1 year'));}

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
    <div class="container mt-5">
      <div class="container mt-5 shadow-lg rounded-3" id="carte">
        <div class="container d-flex">
          <div class="container-fluid w-50 justify-content-start" id="gauche"></div>
          <div class="container-fluid w-50 justify-content-start" id="droite"></div>
        </div>
        <div class="container text-center " id="image" style="width: 250px; height: 250px; position: relative; bottom: 150px;">
          <img src="./images/logo.png" alt="" class="bg-whit" width="200px" style="position: relative; top: 50px;">
        </div>
        <div class="container d-flex flex-wrap" style="position: relative; bottom: 230px; height: 260px;">
          <div class="col-md-4">
            <p style="margin-top: 30px; margin-bottom: 0.1em;"><strong>nom</strong></p>
            <p style="margin-bottom: 0.1em;"><strong>prenom</strong></p>
            <p style="margin-bottom: 0.1em;"><strong>sexe</strong></p>
            <p style="margin-bottom: 0.1em;"><strong>lieu et date naissance</strong></p>
            <p style="margin-bottom: 0.1em;"><strong>faculté et departement</strong></p>
            <p style="margin-bottom: 0.1em;"><strong>promotion</strong></p>
            <p style="margin-bottom: 0.1em;"><strong>matricule</strong></p>
            <p style="margin-bottom: 0.1em;"><strong>adresse</strong></p>
            <p style="margin-bottom: 0.1em;"><strong>validité et date delivrance</strong></p>
          </div>

          <div class="col-md-4">
            <h5 style="margin-bottom: 0.2em;"><u>carte d'étudiant</u></h5>
            <p style="margin-top: 5px; margin-bottom: 0.1em;  "><strong>:<?php echo $row['nom_etudiant']." ".$row['postnom_etudiant'];?></strong></p>
            <p style="margin-top: 5px; margin-bottom: 0.1em; position: relative; bottom: 5px; "><strong>:<?php echo $row['prenom_etudiant']; ?></strong></p>
            <p style="margin-top: 5px; margin-bottom: 0.1em; position: relative; bottom: 5px; " ><strong>:<?php echo $row['sexe']; ?></strong></p>
            <p style="margin-top: 5px; margin-bottom: 0.1em; position: relative; bottom: 10px; "><strong>:<?php echo $row['lieu_naissance']." ".$row['date_naissance']; ?></strong></p>
            <p style="margin-top: 5px; margin-bottom: 0.1em; position: relative; bottom: 14px; "><strong>:<?php echo $row['faculte']; ?></strong></p>
            <p style="margin-top: 5px; margin-bottom: 0.1em; position: relative; bottom: 16px; "><strong>:<?php echo $row['licence']; ?></strong></p>
            <p style="margin-top: 5px; margin-bottom: 0.1em; position: relative; bottom: 20px;"><strong>:<?php echo $row['matricule']; ?></strong></p>
            <p style="margin-top: 5px; margin-bottom: 0.1em; position: relative; bottom: 22px;"><strong>:<?php echo $row['adresse']; ?></strong></p>
            <p style="margin-top: 5px; margin-bottom: 0.1em; position: relative; bottom: 26px;"><strong>:<?php echo date('d/m/Y', strtotime($date_payement))."exp".$date_expiration; ?></strong></p>
            $date_expiration = date('d/m/Y', strtotime('+1 year'));
          </div>
          <div class="col-md-4">
            <img src="./images/<?php echo $row['photo_etudiant'];} ?>" alt="nvidia" class="shadow-lg" width="150px" height="150px" style="border: 2px solid #ffffff00; position: relative; left: 55px; top: 30px;">
            <p style="font-size: smaller; position: relative; top: 40px; left: 30px;" class="text-center"><strong>Marcel Kasenga dimandja</strong></p>
            <p style="font-size: smaller; position: relative; top: 20px; left: 30px;" class="text-center"><strong>président</strong></p>
          </div>
        </div>
        <div class="container text-white" style=" font-size: smaller;background-color:rgba(255, 0, 0, 0.653);position: relative; bottom: 230px; right: 20px; width: 850px;">les autorités tant civique que militaire sont priés de porté toute assistance au porteur de la présente carte</div>
      </div>
    </div>

  <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-6">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formulaireModal" style="position: relative; top:30px; left: 200px" id="button_commande">
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
          <input type="date" class="form-control" id="dateExpiration" name="date_expiration" min="<?php echo date('Y-m-d'); ?>" required>
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
      
       
      </div>
    </div>
    </div>
  </div>
   


    <!-- footer -->
    <style>
      footer{
        margin-top: 100px !important;
        background-color:#f8f9faa4;
      }
      body {
    background-color: #f8f9fa;
}
.navbar {
    background-color: #0f162e;
}

.navbar-brand {
    color: #ffffff;
    font-weight: bold;
}
.navbar-nav .nav-link {
    color: #ffffff;
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
