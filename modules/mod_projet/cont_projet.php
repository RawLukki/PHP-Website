<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
include_once 'modules/mod_projet/vue_projet.php';
include_once 'modules/mod_projet/modele_projet.php';

class ContProjet
{
    private $vue;

    public function __construct()
    {
        $this->vue = new VueProjet();
        $this->modele = new Modeleprojet();
    }

    public function affichage()
    {

        if (!isset($_SESSION["token"])) {
            $_SESSION["token"] = bin2hex(random_bytes(32));
        }
        if (isset($_SESSION['role']) && ($_SESSION['role'] == 3)) {
            $this->vue->formProjet();
        }
        if (isset($_SESSION['role']) && ($_SESSION['role'] == 2) ) {
            $tab2 = $this->modele->getProjetProf();
            $this->vue->vueProf($tab2);
        } 
        if (isset($_SESSION['role']) && ($_SESSION['role'] == 1)) {
            $this->vue->formProjet(); 
            $tab2 = $this->modele->getProjetProf();
            $this->vue->vueProf($tab2); 
        }
        else{
            $tab = $this->modele->getProjet();
            $this->vue->vueProjets($tab);
        }
    }

    public function checkToken()
    {
        if (!isset($_POST["token"]) || !isset($_SESSION["token"])) {
            exit();
        }
        if ($_POST["token"] == $_SESSION["token"]) {
            return true;
        }
    }

    public function envoiFormulaire()
    {
        if (!empty($_POST) && $this->checkToken()) {
            $nomOrg = htmlspecialchars($_POST['nomOrg']);
            $nomProj = htmlspecialchars($_POST['nomProjet']);

            $dpt = $_POST['dept'];

            $contenu = htmlspecialchars($_POST['comment']);
            $debut = $_POST['debut'];
            $fin = $_POST['fin'];

            if ($debut >= $fin) {
                $this->vue->dureeIncorrecte();
            } else if (empty($nomProj) || empty($nomOrg) || empty($dpt) || empty($contenu) || empty($debut) || empty($fin)) {
                $this->vue->messageErreur();
            } else {
                $this->modele->insertion($nomOrg, $nomProj, $dpt, $contenu, $debut, $fin, $_SESSION['id']);
                $this->vue->projetEnvoyer();

                unset($_POST);
                unset($_SESSION["token"]);
            }
        }
    }
}
