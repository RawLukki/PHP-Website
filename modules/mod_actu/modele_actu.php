<?php
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');
include_once 'connexion.php';

Class ModeleActu extends Connexion {

	public function __construct() {

	}

	public function selectEvent(){
		$select = self::$bdd->prepare('SELECT * FROM evenement INNER JOIN utilisateur ON evenement.idUtilisateur = utilisateur.idUtilisateur ORDER BY idEvenement DESC limit 10');
		$select->execute();
		$returnActu = $select->fetchAll();
		return $returnActu;
	}

	public function selectActu(){
		$select = self::$bdd->prepare('SELECT * FROM actualite  INNER JOIN utilisateur ON actualite.idUtilisateur = utilisateur.idUtilisateur ORDER BY idActualite DESC limit 10');
		$select->execute();
		$returnActu = $select->fetchAll();
		return $returnActu;
	}

	public function selectLogin(){
		$select = self::$bdd->prepare('SELECT * FROM evenement INNER JOIN utilisateur ON evenement.idUtilisateur = utilisateur.idUtilisateur');
		$select->execute();
		$returnActu = $select->fetchAll();
		return $returnActu;
	}

	public function insertEvent($title,$content,$datDebut,$datFin,$sessionId){
		$insert = self::$bdd->prepare('INSERT into evenement VALUES (default,?,?,?,?,?)');
		$insert->execute(array("$title","$content","$datDebut","$datFin","$sessionId"));
		
	}

	public function insertActu($title, $content,$heure,$date,$sessionId){
		$insert = self::$bdd->prepare('INSERT into actualite VALUES (default,?,?,?,?,?)');
		$insert->execute(array("$title","$content","$heure","$date","$sessionId"));
		
	}
	
}
?>