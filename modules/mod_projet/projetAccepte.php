<?php
try {
    $dns = "mysql:host=78.198.82.2;dbname=sql4462480;charset=utf8";
    $bdd = new PDO($dns, "karotine", "cHqYHwNqaV");
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
try {
    if (isset($_REQUEST['idP'])) {
        $idProjet = $_REQUEST['idP'];
        $requete = $bdd->prepare('UPDATE projet SET valider=1 where idProjet=? ');
        $requete->execute(array("$idProjet"));
        
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
unset($requete);
unset($bdd);