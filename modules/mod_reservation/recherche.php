<?php

try {
    $dns = "mysql:host=78.198.82.2;dbname=sql4462480;charset=utf8";
    $bdd = new PDO($dns, "karotine", "cHqYHwNqaV");
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
try {
    if (isset($_REQUEST["term"])) {
        $param = $_REQUEST["term"];

        $requete = $bdd->prepare('SELECT nom FROM emplacement where capacite>? and capacite-? < 7 ');
        $requete->execute(array("$param","$param"));

        if ($requete->rowCount() > 0) {
            while ($ligne = $requete->fetch()) {
                echo '<option>' . $ligne["nom"] . '</option>';
            }
        } else {
            echo "<p class='mx-5'>Aucune salle ne correspond à vos critéres</p>";
        }
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
unset($requete);
unset($bdd);