<?php
include("connexion_base.php");
//recupération des info de la base de donnée en vu de l'insersion dans la carte
session_start();
$id_etudiant = $_SESSION['id_etudiant'];
$sql="SELECT * FROM etudiant WHERE id_etudiant = '$id_etudiant'";
$data = $dbh->query($sql)->fetchAll();
?>