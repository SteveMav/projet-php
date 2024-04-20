<?php
// connection à la base de données
include("connexion_base.php");
// recupération de l'id de l'étudiant
session_start();
$id_etudiant = $_SESSION['id_etudiant'];
// recupération des informations de l'étudiant du formulaire
if(isset($_POST['modifier'])){
    $photo = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $sql = "UPDATE etudiant SET";
    $updates = array();
    if(!empty($_FILES['photo']['name'])){
        $photo = $_FILES['photo']['name'];
        $updates[] = "photo_etudiant = '$photo'";
        $folder = "./images/".$photo;
        move_uploaded_file($photo_tmp, $folder);
    
    }
    if(!empty($_POST['nom_etudiant'])){
        $nom = $_POST['nom_etudiant'];
        $updates[] = "nom_etudiant = '$nom'";
    }

    if(!empty($_POST['prenom_etudiant'])){
        $prenom = $_POST['prenom_etudiant'];
        $updates[] = "prenom_etudiant = '$prenom'";
    }

    if(!empty($_POST['email'])){
        $email = $_POST['email'];
        $updates[] = "email = '$email'";
    }
    if(!empty($_POST['licence'])){
        $licence = $_POST['licence'];
        $updates[] = "licence = '$licence'";
    }
    // date de naissance
    if(!empty($_POST['date_naissance'])){
        $date_naissance = $_POST['date_naissance'];
        $updates[] = "date_naissance = '$date_naissance'";
    }
    if(!empty($_POST['sexe'])){
        $sexe = $_POST['sexe'];
        $updates[] = "sexe = '$sexe'";
    }
    //adresse
    if(!empty($_POST['adresse_etudiant'])){
        $adresse = $_POST['adresse_etudiant'];
        $updates[] = "adresse = '$adresse'";
    }
    if(!empty($_POST['faculte'])){
        $faculte = $_POST['faculte'];
        $updates[] = "faculte = '$faculte'";
    }
    if(!empty($_POST['mot_de_passe'])){
        $mot_de_passe = hash("sha512", $_POST['mot_de_passe']);
        $updates[] = "mot_de_passe = '$mot_de_passe'";
    }
    if(!empty($updates)){
        $sql .= " " . implode(", ", $updates);
        $sql .= " WHERE id_etudiant = '$id_etudiant'";
        echo $sql;
        $data = $dbh->query($sql);
        $_SESSION['message_modif'] = "Informations mises à jour avec succès!";
    } else {
        $_SESSION['message_modif'] = "Aucune information à mettre à jour";
    }

    header("location: profil.php");
}
else{
    $_SESSION['message_modif'] = "erreur lors de la mise à jour des informations";
    header("location: profil.php");
}



?>