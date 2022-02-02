<?php

include_once 'cont_reservation.php';
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
class ModReservation
{
    private $controleur;
    private $action;

    public function __construct()
    {
        $this->controleur = new ContReservation();

        if (isset($_GET['action']))
            $this->action = $_GET['action'];
        else
            $this->action = 'Reservation';

        switch ($this->action) {

            case 'ajouterReservation':
                $this->controleur->ajoutReservation();
                break;
            
            default:
                $this->controleur->printReservation();
                break;
        }
    }
}