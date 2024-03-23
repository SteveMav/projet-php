<?php
include("connexion_base.php");
if(isset($_POST['enregistrer'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];
    $matricule = $_POST['matricule'];
    $mot_de_passe = MD5($_POST['mot_de_passe']);
    $date_naissance = $_POST['date_naissance'];
    $telephone = $_POST['telephone'];
    //fontion verif_password


    

    $sth = $dbh->prepare("INSERT INTO etudiant(id_etudiant,mot_de_passe ) VALUES (UUID(),'$password')");
    $sth->execute();
    header("location:accueil.php");
    



}
?>