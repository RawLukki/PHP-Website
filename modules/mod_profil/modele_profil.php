<?php
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');
include_once 'connexion.php';

Class ModeleProfil extends Connexion {

    public function __construct() {
		
	}

	public function insereImage($profileImageName,$id) {
		//$sql = "INSERT INTO users SET profile_image='$profileImageName where idUtilisateur= ?'";
		$selectPreparee = self::$bdd->prepare('UPDATE utilisateur SET profile_image = ? where idUtilisateur = ? ;');
		return $selectPreparee->execute(array("$profileImageName","$id"));
	}

    
}