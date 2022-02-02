<?php

include_once 'cont_messagerie.php';
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');
Class ModMessagerie {
	private $action;
	private $controleur;
	
	public function __construct() {

		$this->controleur= new ContMessagerie();

		if (isset($_GET['action']) )
				$this->action=$_GET['action'];
		else
			$this->action="";


			switch ($this->action) {
				
				case 'chat' : 
					$this->controleur->chat();
					break;
				default :
					$this->controleur->afficheMessagerie();
					break;
			}
    }
}

?>
	