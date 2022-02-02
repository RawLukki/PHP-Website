<?php

include_once 'cont_profil.php';
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');
Class ModProfil {
	private $action;
	private $controleur;
	
	public function __construct() {

		$this->controleur= new ContProfil();

		if (isset($_GET['action']) )
				$this->action=$_GET['action'];
			else
				$this->action="";

        switch ($this->action){
            case 'uploadImage' : 
                $this->controleur->uploadImage();
                break;
            default : 
                $this->controleur->afficheProfil();
                break;
        }
		
    }
}

?>
	