<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUK Payment Portal - Login</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style_inscription.css">
    <link rel="icon" href="./images/Logo.png" type="image/ico">

    
</head>
<body>
    <div class="container">

        <div class="row">
            <div class="col-md-6 mx-auto" style="margin-top: 60px;">
                <div class="login-container border border-3 border-danger" style="padding: 40px;">
                    <h2 class="text-center">AUK Payment Portail</h2>
                    <?php
                    session_start();
                    if(isset($_SESSION['message_email'])){ ?>
                        <div class="alert alert-danger"><?php echo $_SESSION['message_email'];?></div> 
                        <style>.row{ margin-top: -35px !important;} </style>  
                    <?php } ?>
                    
                    <form action="traitement_inscription.php" method="post">
                        <div class="form-group">
                            <label for="username">nom</label>
                            <input type="text" id="nom" name="nom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="prenom">prenom</label>
                            <input type="text" id="" name="prenom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">email</label>
                            <input type="email" name="email" id="">
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
                            <label for="">mot de passe</label>
                            <input type="password"  name="mot_de_passe" id="mot_de_passe" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">confirmer de passe</label>
                            <input type="password"  name="mot_de_passe_c" class="form-control" id="mot_de_passe_c" required>
                        </div>


                        <input type="submit" value="enregistrement" name="enregistrer"  class="btn btn-login btn-block">
                    </form>
                </div>
            </div>
        </div>

        </div>

 <footer class="text-center text-lg-start" >
    <div class="text-center p-3" style="background-color: #b6b9c4;position: absolute; bottom: 0;width: 100%;">
        © 2024 Copyright:
        <a class="text-dark" href="https://american.french-american.edu/">Université américaine de Kinshasa</a>
    </div>
 </footer>   
        <script>
        var password = document.getElementById("mot_de_passe");
        var confirm_password = document.getElementById("mot_de_passe_c");

        function validatePassword() {
                if (password.value.length < 8 || !/[A-Z]/.test(password.value)) {
                        confirm_password.setCustomValidity("Le mot de passe doit contenir au moins 8 caractères et une majuscule");
                } else if (password.value != confirm_password.value) {
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
