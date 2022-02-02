<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
include_once 'connexion.php';
class ModeleProjet extends Connexion
{
    public function getProjet()
    {
        $requete = self::$bdd->prepare('SELECT nomProjet, nomOrg,departement,contenu, debut, fin FROM projet
        where valider=1 order by debut');
        $requete->execute();
        $result = $requete->fetchAll();
        return $result;
    }

    public function insertion($nomOrg, $nomProj, $dpt, $contenu, $debut, $fin, $session)
    {
        $requete = self::$bdd->prepare('INSERT INTO projet (nomProjet, nomOrg, departement, contenu, debut, fin, idUtilisateur) 
        VALUES ( ?, ?, ?, ?, ?, ?, ?)');
        $requete->execute(array("$nomProj", "$nomOrg", "$dpt", "$contenu", "$debut", "$fin", "$session"));
    }

    public function getUtilisateur($nomOrg)
    {
        $requete = self::$bdd->prepare('SELECT idUtilisateur FROM utilisateur where nom = ? and idRole = 3');
        $requete->execute(array("$nomOrg"));
        $result = $requete->fetch();
        if ($requete->rowCount() > 0) {
            return $result['idUtilisateur'];
        }
        return false;
    }

    public function getProjetProf()
    {
        $requete = self::$bdd->prepare('SELECT nomProjet, nomOrg,departement,contenu, debut, fin, idProjet, valider FROM projet order by debut');
        $requete->execute();
        $result = $requete->fetchAll();
        return $result;
    }

}