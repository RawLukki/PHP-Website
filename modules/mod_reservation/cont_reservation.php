<?php

if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
include_once 'modules/mod_reservation/vue_reservation.php';
include_once 'modules/mod_reservation/modele_reservation.php';


class ContReservation
{
    private $vue;
    private $modele;

    public function __construct()
    {
    	if(!isset($_SESSION['id'])) {
    		header("Location: index.php");
    	}
        $this->vue = new VueReservation();
        $this->modele = new ModeleReservation();
    }

    public function printReservation()
    {

        if (!isset($_SESSION["token"])) {
            $_SESSION["token"] = bin2hex(random_bytes(32));
        }

        $id = $this->modele->getUtilisateur($_SESSION['id']);
        if ($id!=NULL && isset($id)) {
            $tab = $this->modele->getListe($id);
            $this->vue->affiche_liste($tab);
        }
        $this->vue->formReservation();
        
    }

    public function ajoutReservation()
    {
        if (!empty($_POST) && $this->checkToken()) {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $nbPrsn = htmlspecialchars($_POST['nbPrsn']);
            $salle = $_POST['salles'];
            $jour = $_POST['jour'];
            $debut = $_POST['arriver'];
            $duree = $_POST['duree'];
            $fin = $this->add_time($debut, $duree);

            if ($duree > '00:15:00' && $salle == 'A0-07 / Karaoke') {
                $this->vue->dureeIncorrecte();
            } else if ($fin > '18:00:00') {
                $this->vue->horaireIncorrecte();
            } else if (empty($nom) || empty($prenom) || empty($nbPrsn) || empty($jour) || empty($debut) || empty($duree) || empty($salle)) {
                $this->vue->messageErreur();
            } else if ($this->modele->dejaReserver($jour, $debut, $salle) == true) {
                $this->vue->DejaReserver();
            } else {
                $this->modele->insertion($salle, $nbPrsn, $jour, $debut, $fin, $duree, $_SESSION['id']);
                $this->vue->reservationReussi();
                unset($_SESSION["token"]);
                unset($_POST);
            }
        } else {
            $this->vue->erreur();
        }
        header ('refresh:2; url=index.php?module=mod_reservation', true, 303);
    }



    public function add_time($t1, $t2)
    {
        //Heures au format (hh:mm:ss) la plus grande puis le plus petite 

        $tab = explode(":", $t1);
        $tab2 = explode(":", $t2);

        $h = $tab[0];
        $m = $tab[1];

        $h2 = $tab2[0];
        $m2 = $tab2[1];


        $ht = $h + $h2;
        $mt = $m + $m2;

        if (strlen($ht) == 1) {
            $ht = "0" . $ht;
        }
        if (strlen($mt) == 1) {
            $mt = "0" . $mt;
        }

        return $ht . ":" . $mt . ":00";
    }

    public function checkToken()
    {
        if (!isset($_POST["token"]) || !isset($_SESSION["token"])) {
            exit();
        }
        if ($_POST["token"] == $_SESSION["token"]) return true;
    }
}
