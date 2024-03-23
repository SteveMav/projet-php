<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUK Payment Portal - Login</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="styles_connexion.css">
    
</head>
<body>
    <div class="container mt-5">

        <div class="row ">
            <div class="col-md-6 mx-auto">
                <div class="login-container border border-3 border-danger">
                    <h2 class="text-center">AUK Payment Portal</h2>
                    <form action="traitement_inscription.php" method="post">
                        <div class="form-group">
                            <label for="username">nom</label>
                            <input type="text" id="nom" name="nom" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="post_nom">post nom</label>
                            <input type="text" id="" name="post_nom" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="prenom">prenom</label>
                            <input type="text" id="" name="prenom" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">matricule</label>
                            <input type="number" id="" name="matricule" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">email</label>
                            <input type="text" id="" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">mot de passe</label>
                            <input type="password"  name="mot_de_passe" id="mot_de_passe" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">confirmer de passe</label>
                            <input type="password"  name="mot_de_passe_c" class="form-control" id="mot_de_passe_c" required>
                        </div>


                        <input type="submit" value="enregistrement" name="enregistrer"  class="btn btn-login btn-block">
                        <!-- <button type="submit" class="btn btn-login btn-block" name="enregistrer">enregistrer</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
  var password = document.getElementById("mot_de_passe");
  var confirm_password = document.getElementById("mot_de_passe_c");

  function validatePassword() {
    if (password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Les mots de passe ne correspondent pas");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
</script>
</body>
</html>
