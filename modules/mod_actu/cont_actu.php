<?php
if (!defined('CONST_INCLUDE'))
die ('Acces direct interdit !');
include_once 'modules/mod_actu/vue_actu.php';
include_once 'modules/mod_actu/modele_actu.php';

Class ContActu{
    private $vue;
    private $modele;

    public function __construct(){
        $this->vue= new VueActu();
        $this->modele=new ModeleActu();
    }

    public function printActu(){
        $actualites = $this->modele->selectActu();
        $events = $this->modele->selectEvent();
        if(!isset($_SESSION["token"])){
        $_SESSION["token"] = bin2hex(random_bytes(32));
        }
        $this->vue->afficheEvent($events);
        if(isset($_SESSION['role']) && ($_SESSION['role'] == 1 || $_SESSION['role'] == 2 || $_SESSION['role'] == 4 )) {
        $this->vue->form_Event();
        }
        $this->vue->afficheActu($actualites);
        if(isset($_SESSION['role']) && ($_SESSION['role'] == 1 || $_SESSION['role'] == 2 || $_SESSION['role'] == 4 )) {
        $this->vue->form_Actu();
        }
    }


    public function ajoutEvent(){
        if(!empty($_POST) && $this->checkToken()){
            if(isset($_POST["titreEvent"],$_POST["event"],$_POST["dateDebut"],$_POST["dateFin"])&& !empty($_POST["titreEvent"])&& !empty($_POST["event"])&&!empty($_POST["dateDebut"])&&!empty($_POST["dateFin"])){
                $titre = strip_tags($_POST["titreEvent"]);
                $contenu = htmlspecialchars($_POST["event"]);
                $dateDebut = htmlspecialchars($_POST["dateDebut"]);
                $dateFin = htmlspecialchars($_POST["dateFin"]);
              
                $this->modele->insertEvent($titre,$contenu,$dateDebut,$dateFin,$_SESSION['id']);
                unset($_POST);
                unset($_SESSION["token"]);
            }
            else{
                die("le formulaire est incomplet");
            }
        }
    }

    public function ajoutActu(){      
        if(!empty($_POST) && $this->checkToken()){
            if(isset($_POST["titreactu"],$_POST["actu"],$_POST["heureActu"],$_POST["dateActu"]) && !empty($_POST["titreactu"])&& !empty($_POST["actu"])&& !empty($_POST["heureActu"])&& !empty($_POST["dateActu"])){
                $titreActu = strip_tags($_POST["titreactu"]);
                $contenuActu = htmlspecialchars($_POST["actu"]);
                $heureActu = htmlspecialchars($_POST["heureActu"]);
                $dateActu = htmlspecialchars($_POST["dateActu"]);

                $this->modele->insertActu($titreActu,$contenuActu,$heureActu,$dateActu,$_SESSION['id']);
                unset($_POST);
                unset($_SESSION["token"]);
            }
            else{
                die("le formulaire est incomplet");
            }
         }
    }

    public function checkToken() {
        if (!isset($_POST["token"]) || !isset($_SESSION["token"])) { exit();}
        if ($_POST["token"] == $_SESSION["token"]) return true; 
    }

   
}
?>