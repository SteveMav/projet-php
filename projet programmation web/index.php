<?php
include("traitement_connexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUK Payment Portal - Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="styles_connexion.css">
    <link rel="icon" href="./images/Logo.png" type="image/ico">

    <!-- Custom styles -->
    
</head>
<body>
    <div class="container mt-5" id="formulaire">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-container border border-3 border-danger" style="margin-top: 140px; padding: 20px;">
                    <h2 class="text-center">CONNECTEZ VOUS A AUK PAIEMENT</h2>
                    <?php if(!empty($message)): ?>
                        <div class="alert alert-danger">
                            <?= $message; ?>
                        </div>
                    <?php endif; ?>
                    <form action="traitement_connexion.php" method="post">
                        <div class="form-group">
                            <label for="username">email</label>
                            <input type="email" id="username" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">    
                            <label for="password">mot de passe</label>
                            <input type="password" id="password" name="mot_de_passe" class="form-control" required>
                        </div>
                        <input type="submit" value="connexion" name="connexion" class="btn btn-login btn-block">
                        <a href="inscription.php" class="btn btn-login btn-block">inscription</a>
                    </form>
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

</body>
</html>
