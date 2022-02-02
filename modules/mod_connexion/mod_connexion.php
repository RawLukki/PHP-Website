<?php

include_once 'cont_connexion.php';
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');
Class ModConnexion {
	private $action;
	private $controleur;
	
	public function __construct() {

		$this->controleur= new ContConnexion();

		if (isset($_GET['action']) )
				$this->action=$_GET['action'];
			else
				$this->action="connexion";
		
			switch ($this->action) {
				case 'connexion' : 
					$this->controleur->afficheConnexion();
					break;
				case 'seConnecter' : 
					$this->controleur->seConnecter();
					break;
				case 'deconnexion' : 
					$this->controleur->seDeconnecter();
					break;
				case 'inscrire' : 
				   	$this->controleur->inscrire();
					break;
				
			}
	}

	public function connexion() {
		$this->controleur->afficheConnexion();
	}

	public function seConnecter() {
		$this->controleur->seConnecter();
	}
	public function seDeconnecter() {
		$this->controleur->seDeconnecter();
	}


}
	