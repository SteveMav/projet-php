<?php
// connection à la base de données
include("connexion_base.php");

// recupération de l'id de l'étudiant
session_start();
$id_etudiant = $_SESSION['id_etudiant'];

// recupération des informations de l'étudiant du formulaire

if(isset($_POST['modifier'])){
    $tranche = $_POST['tranche'];
    $sql = "UPDATE etudiant SET";
    $updates = array();

    if(!empty($_POST['nom'])){
        $nom = $_POST['nom'];
        $updates[] = "nom_etudiant = '$nom'";
    }

    if(!empty($_POST['prenom'])){
        $prenom = $_POST['prenom'];
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
    //adresse
    if(!empty($_POST['adresse'])){
        $adresse = $_POST['adresse'];
        $updates[] = "adresse = '$adresse'";
    }

    if(!empty($_POST['faculte'])){
        $faculte = $_POST['faculte'];
        $updates[] = "faculte = '$faculte'";
    }

    if(!empty($_POST['mot_de_passe'])){
        $mot_de_passe = MD5($_POST['mot_de_passe']);
        $updates[] = "mot_de_passe = '$mot_de_passe'";
    }

    if(!empty($updates)){
        $sql .= " " . implode(", ", $updates);
        $sql .= " WHERE id_etudiant = '$id_etudiant'";
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

if (!empty($_POST['tranche'])){
    // dans le cas où l'étudiant à selectionné la carte étudiant
    if ($tranche == "carte_etudiant"){
        $check_sql = "SELECT * FROM cartes_etudiant WHERE id_etudiant = '$id_etudiant'";
        $check_data = $dbh->query($check_sql);
        $check_result = $check_data->fetch(PDO::FETCH_ASSOC);
        if ($check_result) {
            $_SESSION['message_tranche'] = "Vous avez déjà payé pour la carte!";
            header("location: profil.php");
        } else {
            $_SESSION['message_tranche'] = "Vous n'avez pas encore payé pour la carte rendez vous à l'onglet carte pour le faire!";
            header("location: profil.php");
        }
    }
        // voir si l'étudiant a déjà payé pour la tranche selectionné

    $check_sql = "SELECT * FROM frais_academique WHERE id_etudiant = '$id_etudiant' AND tranche = '$tranche'";
    $check_data = $dbh->query($check_sql);
    $check_result = $check_data->fetch(PDO::FETCH_ASSOC);
     if ($check_result) {
        $_SESSION['message_tranche'] = "Vous avez déjà payé pour la tranche!";
        header("location: profil.php");
    } else {
        $_SESSION['message_tranche'] = "Vous n'avez pas encore payé pour la tranche rendez vous à l'onglet frais academique pour le faire!";
        header("location: profil.php");
}
}

?>