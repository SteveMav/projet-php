<?php
include("connexion_base.php");

$message = '';

if (isset($_POST['connexion'])){
    $email = $_POST['email'];
    $password = hash('sha512', $_POST['mot_de_passe']);
    $sql= $dbh->prepare("SELECT*FROM etudiant WHERE email= :email AND mot_de_passe= :mot_de_passe");
            $sql->execute(array(
                ':email' => $email,
                ':mot_de_passe' => $password
            ));

                if($sql->rowCount() > 0){
                    session_start();
                    $_SESSION['id_etudiant'] = $sql->fetch()['id_etudiant'];
                    $_SESSION['mdp'] = $password;
                    header("location: accueil.php");


                }
                //connexion admin
                else {
                    $sql = $dbh->prepare("SELECT * FROM administrateur WHERE email_admin = :email_admin AND motdepasse_admin = :motdepasse_admin");
                    $sql->execute(array(
                        ':email_admin' => $email,
                        ':motdepasse_admin' => $password
                    ));

                    if ($sql->rowCount() > 0) {
                        session_start();
                        $_SESSION['id_admin'] = $sql->fetch()['id_admin'];
                        $_SESSION['mdp_admin'] = $password;
                        header("location: accueil_admin.php");
                    } else {
                        $message = "Email ou mot de passe incorrect";
                        header("location: index.php");
                    }
                }
            }  
?>
