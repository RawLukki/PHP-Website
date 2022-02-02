<?php

include_once 'cont_header.php';
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');
Class ModHeader {
	private $action;
	private $controleur;
	
	public function __construct() {

		$this->controleur = new ContHeader();
		$this->controleur->afficheHeader();
	}



}