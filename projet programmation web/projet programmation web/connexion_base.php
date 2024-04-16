<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = "AUK_paye";
try{
    $dbh = new PDO ("mysql:host=localhost;dbname=$dbname", $username, $password);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "bien";

} catch(PDOException $e) {
    echo "erreur  : " . $e->getMessage();
}

?>
