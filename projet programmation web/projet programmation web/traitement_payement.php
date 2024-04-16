<?php
include("connexion_base.php");

// Gestion des tranches
if (isset($_POST['payer_premiere'])) {
    payer_tranche('première');
} elseif (isset($_POST['payer_deuxieme'])) {
    payer_tranche('deuxième');
} elseif (isset($_POST['payer_troisieme'])) {
    payer_tranche('troisième');
}

function payer_tranche($tranche) {
    global $dbh;
    session_start();
    $id_etudiant = $_SESSION['id_etudiant'];

    // Récupération des données du formulaire de paiement
    $date_payement = date('Y-m-d');
    $date_expiration = $_POST['date_expiration'];
    $numero_carte_paye = $_POST['numero_carte'];
    $nom_carte_payement = $_POST['nom_carte_payement'];

    // Vérification si l'étudiant a déjà payé pour la tranche
    $check_sql = "SELECT * FROM frais_academique WHERE id_etudiant = '$id_etudiant' AND tranche = '$tranche'";
    $check_data = $dbh->query($check_sql);
    $check_result = $check_data->fetch(PDO::FETCH_ASSOC);

    if ($check_result) {
        $_SESSION['message_' . $tranche] = "Vous avez déjà payé la $tranche tranche!";
    } else {
        $sql = "INSERT INTO frais_academique(numero_carte_payement, nom_carte_payement, id_etudiant, date_payement, exp_carte, tranche) VALUES ('$numero_carte_paye', '$nom_carte_payement', '$id_etudiant', '$date_payement', '$date_expiration','$tranche')";
        $data = $dbh->query($sql);
        $_SESSION['message_' . $tranche] = "Paiement effectué avec succès!";
    }

    header("location: payement.php");
}

// payement de l'enrolement
if (isset($_POST['payer_enrolement'])){
    session_start();
    $id_etudiant = $_SESSION['id_etudiant'];
    
    //recupération des données du formulaire de payement
    $nom_carte_payement = $_POST['nom_carte_payement'];
    $numero_carte_paye = $_POST['numero_carte'];
    $date_expiration = $_POST['date_expiration'];
    $code_securite = $_POST['code_securite'];
    $tranche_enrolement = $_POST['tranche_enrolement'];

    // vérification si l'étudiant a déjà payé pour l'enrolement
    $check_sql = "SELECT * FROM enrolement WHERE id_etudiant = '$id_etudiant' AND tranche_enrolement = '$tranche_enrolement'";
    $check_data = $dbh->query($check_sql);
    $check_result = $check_data->fetch(PDO::FETCH_ASSOC);

    if ($check_result) {
        $_SESSION['message_enrolement'] = "Vous avez déjà payé pour l'enrolement!";
        header("location: payement.php");
    } else {
        $sql = "INSERT INTO enrolement(nom_carte_payement, numero_carte_payement, exp_carte, code_securite_carte, id_etudiant, tranche_enrolement) VALUES ('$nom_carte_payement', '$numero_carte_paye', '$date_expiration', '$code_securite', '$id_etudiant', '$tranche_enrolement')";
        $data = $dbh->query($sql);
        $_SESSION['message_enrolement'] = "Paiement effectué avec succès!";
        header("location: payement.php");
    }
}
?>