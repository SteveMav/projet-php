<?php
// Connexion à la base de données
include("connexion_base.php");
session_start();   
$_SESSION['message_email'] = "";

if(isset($_POST['enregistrer'])){
    // Récupération des informations du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = MD5($_POST['mot_de_passe']);
    $faculte = $_POST['faculte'];

    //voir si l'email est dans la base données
    $sql = $dbh->prepare("SELECT * FROM etudiant WHERE email = :email");
    $sql->execute(array(
        ':email' => $email
    ));
    if($sql->rowCount() > 0){
        $_SESSION['message_email'] = "l'email rentré est déjà utilisé!";
        header("location: inscription.php");
    }
    else{
        // Insertion dans la base de données
        $sth = $dbh->prepare("INSERT INTO etudiant(nom_etudiant, prenom_etudiant, faculte, mot_de_passe, email) VALUES ('$nom', '$prenom', '$faculte', '$mot_de_passe', '$email')");
        $sth->execute();

        // Récupérer l'ID de l'étudiant inséré
        $last_insert_id = $dbh->lastInsertId();

        // Démarrer la session

        // Stocker l'ID dans la session
        $_SESSION['id_etudiant'] = $last_insert_id;

        // Redirection vers la page d'accueil
        header("location:accueil.php");
    }

   
}
?>
