<?php
include("connexion_base.php");

// id_etudiant
session_start();
$id_etudiant = $_SESSION['id_etudiant'];

// recupération des données de la carte
if(isset($_POST['payer'])){
    $nom_carte_payement = $_POST['nom_carte_payement'];
    $numero_carte_paye = $_POST['numero_carte'];
    $date_expiration = $_POST['date_expiration'];
    $code_securite = $_POST['code_securite'];

    // vérification si l'étudiant a déjà payé pour la carte
    $check_sql = "SELECT * FROM cartes_etudiant WHERE id_etudiant = '$id_etudiant'";
    $check_data = $dbh->query($check_sql);
    $check_result = $check_data->fetch(PDO::FETCH_ASSOC);

    if ($check_result) {
        $_SESSION['message'] = "Vous avez déjà payé pour la carte!";
        header("location: carte.php");
    } else {
        $sql = "INSERT INTO cartes_etudiant(nom_carte_payement, numero_carte_paye, date_expiration, code_securite_carte, id_etudiant) VALUES ('$nom_carte_payement', '$numero_carte_paye', '$date_expiration', '$code_securite', '$id_etudiant')";
        $data = $dbh->query($sql);
        $_SESSION['message'] = "Paiement effectué avec succès!";
        header("location: carte.php");
    }

}
else{
    $_SESSION['message'] = "erreur lors du payement";
    header("location: carte.php");
}
?>