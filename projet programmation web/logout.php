<?php
// déconnexion de l'utilisateur
session_start();
session_destroy();
header("location: index.php");
?>