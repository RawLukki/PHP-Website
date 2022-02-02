<?php
include_once 'cont_projet.php';
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
class ModProjet
{
    private $controleur;
    private $action;

    public function __construct()
    {
        $this->controleur = new ContProjet();

        if (isset($_GET['action']))
            $this->action = $_GET['action'];
        else
            $this->action = 'Projet';

        switch ($this->action) {

            case 'soumettreProjet':
                $this->controleur->envoiFormulaire();
                break;

            default:
                $this->controleur->affichage();
                break;
        }
    }
}
