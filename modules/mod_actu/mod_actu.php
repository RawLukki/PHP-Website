<?php
include_once 'cont_actu.php';
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');

Class ModActu{
    private $controleur;

    public function __construct()
    {
        $this->controleur=new ContActu();
        $this->controleur->printActu();

        if (isset($_GET['action']) )
				$this->action=$_GET['action'];
			else
				$this->action="";

			switch ($this->action) {
				case 'insertEvent' : 
					$this->controleur->ajoutEvent();
					break;
				
				case 'insertActu':
					$this->controleur->ajoutActu();
					break;
    }
}


}

?>