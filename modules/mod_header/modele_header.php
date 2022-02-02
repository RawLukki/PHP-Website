<?php
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');
	
include_once 'connexion.php';

Class ModeleHeader extends Connexion {
	
	public function __construct() {
		
	}

	function getUserImage($id) {
		$selectPreparee = self::$bdd->prepare('SELECT profile_image from utilisateur where idUtilisateur = ? ;');
		
		$selectPreparee->execute(array("$id"));
		return $selectPreparee->fetch();
	}

}
		
