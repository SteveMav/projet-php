<?php
include("connexion_base.php");

$message = '';

if (isset($_POST['connexion'])){
    $email = $_POST['email'];
    $password = MD5($_POST['mot_de_passe']);
    $sql= $dbh->prepare("SELECT*FROM etudiant WHERE email= :email AND mot_de_passe= :mot_de_passe");
            $sql->execute(array(
                ':email' => $email,
                ':mot_de_passe' => $password
            ));

                if($sql->rowCount() > 0){
                    header("location: accueil.php?");
                }
                else{
                    $message = "Nom d'utilisateur ou mot de passe incorrect";
                } 
            }  
?>
