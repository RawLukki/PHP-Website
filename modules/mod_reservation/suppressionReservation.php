<?php
session_start();
try {
    $dns = "mysql:host=78.198.82.2;dbname=sql4462480;charset=utf8";
    $bdd = new PDO($dns, "karotine", "cHqYHwNqaV");
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
try {
    if (isset($_REQUEST['idR'])) {
        $idR = $_REQUEST['idR'];
        $requete = $bdd->prepare('DELETE FROM reservation where idReservation=? ');
        $requete->execute(array("$idR"));
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
unset($requete);
unset($bdd);