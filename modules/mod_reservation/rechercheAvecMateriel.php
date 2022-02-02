<?php

try {
    $dns = "mysql:host=78.198.82.2;dbname=sql4462480;charset=utf8";
    $bdd = new PDO($dns, "karotine", "cHqYHwNqaV");
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
try {
    if (isset($_REQUEST["term"]) && isset($_REQUEST["materiel"])) {
        $param = $_REQUEST["term"];
        $materiel = $_REQUEST["materiel"];

        $requete = $bdd->prepare('SELECT emplacement.nom FROM emplacement inner join disponible using (idEmplacement)
        inner join materiel on (disponible.idMateriel = materiel.idMateriel)
        where capacite>? and capacite-? < 7 AND  disponible.etat=1 and materiel.nom=? ');

        $requete->execute(array("$param", "$param", "$materiel"));

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