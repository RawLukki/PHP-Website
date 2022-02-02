<?php
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');
include_once 'modules/mod_accueil/vue_accueil.php';
include_once 'modules/mod_accueil/modele_accueil.php';

Class ContAccueil {
    private $vue;
    private $modele;

    public function __construct () {
        $this->vue = new VueAccueil();
        $this->modele = new ModeleAccueil();
    }

    public function afficheAccueil() {
        $this->vue->afficheAccueil();
    }


}

?>