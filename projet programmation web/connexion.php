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
    <!-- Custom styles -->
    
</head>
<body>
    <div class="container mt-5">

        <div class="row ">
            <div class="col-md-6 mx-auto">
                <div class="login-container border border-3 border-danger">
                    <h2 class="text-center text-danger">CONNECTEZ VOUS A AUK PAYEMENT </h2>
                    <?php if(!empty($message)): ?>
                        <div class="alert alert-danger">
                            <?= $message; ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="mot_de_passe" class="form-control" required>
                        </div>
                        <input type="submit" value="connexion" name="connexion" class="btn btn-login btn-block">
                        <a href="inscription.php" class="btn btn-login btn-block">inscription</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
