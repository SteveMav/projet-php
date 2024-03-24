<?php
//connexion à la base de donnée
include("connexion_base.php");
if(isset($_POST['enregistrer'])){
    //recupération des info du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];
    $matricule = $_POST['matricule'];
    $mot_de_passe = MD5($_POST['mot_de_passe']);
    $date_naissance = $_POST['date_naissance'];
    $faculte = $_POST['faculte'];
    $licence = $_POST['licence'];


    
    //insersion dans la base de donnée
    $sth = $dbh->prepare("INSERT INTO etudiant(id_etudiant,nom_etudiant, prenom_etudiant, adresse, matricule, date_naissance, faculte, licence, mot_de_passe ) VALUES (UUID(),'$nom', '$prenom', '$adresse', '$matricule', '$date_naissance', '$faculte', '$licence','$mot_de_passe')");
    $sth->execute();
    header("location:accueil.php");
    



}
?>