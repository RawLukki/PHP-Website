<?php

if (!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');
include_once 'connexion.php';

class ModeleReservation extends Connexion
{

	public function getListe($session)
	{
		//query moins safe le mieux c de tjr fais prepare execute
		$requete = self::$bdd->prepare("SELECT emplacement.nom as salle, nbPrsn, dateReservation, heureDebut, heureFin, idReservation
		FROM reservation inner join emplacement using(idEmplacement) 
		where emplacement.idEmplacement=reservation.idEmplacement and idUtilisateur=? order by dateReservation");
		$requete->execute(array($session));
		$result = $requete->fetchAll();
		return $result;
	}

	public function insertion($salle, $nbPrsn, $jour, $debut, $fin, $duree, $session)
	{
		$requete = self::$bdd->prepare('INSERT INTO reservation (dateReservation, heureDebut, heureFin, duree, nbPrsn, idUtilisateur, idEmplacement) 
		VALUES ( ?, ?, ?, ?, ?, ?, ?)');
		$idEmplacement = $this->getEmplacement($salle);

		$requete->execute(array("$jour", "$debut", "$fin", "$duree", "$nbPrsn", "$session", "$idEmplacement"));
	}

	public function getUtilisateur($session)
	{
		$requete = self::$bdd->prepare('SELECT idUtilisateur FROM reservation where idUtilisateur=?');
		$requete->execute(array("$session"));

		if ($requete->rowCount() > 0) {
			while ($ligne = $requete->fetch()) {

				return $ligne["idUtilisateur"];
			}
		}
	}

	public function getEmplacement($salle)
	{
		$requete = self::$bdd->prepare('SELECT idEmplacement FROM emplacement where nom=?');
		$requete->execute(array("$salle"));
		$result = $requete->fetch();

		return $result['idEmplacement'];
	}

	public function dejaReserver($date, $heure, $salle)
	{

		$requete = self::$bdd->prepare('SELECT * from reservation where 
		dateReservation = ? and heureDebut>=? and heureFin>? and idEmplacement=?');
		$requete->execute(["$date", "$heure", "$heure", "$salle"]);

		if ($requete->rowCount() > 0) {
			return true;
		}
		return false;
	}
}