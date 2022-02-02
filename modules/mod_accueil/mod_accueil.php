<?php

include_once 'cont_accueil.php';
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');
    
Class ModAccueil {
	private $controleur;
	
	public function __construct() {

		$this->controleur= new ContAccueil();
		$this->controleur->afficheAccueil();

	}

	
}
	
?>