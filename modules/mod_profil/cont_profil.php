<?php
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');
include_once 'vue_profil.php';
include_once 'modele_profil.php';

Class ContProfil {

		private $vue;
		private $modele;

		public function __construct () {
			$this->vue = new VueProfil();
			$this->modele = new ModeleProfil();
		}

        function afficheProfil() {
            $this->vue->afficheProfil("","");
        }

        function uploadImage() {
            $msg = "";
            $msg_class= "";
            
            if (isset($_POST['save_profile']) && !empty($_FILES['profileImage']['tmp_name'])) {
        
                $info = getimagesize($_FILES['profileImage']['tmp_name']);
                if ($info === FALSE) {
                    $msg = "Le fichier envoyé n'est pas une image !";
                    $msg_class = "alert-danger";
                }
                else if (($info[2] !== IMAGETYPE_GIF) && ($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)) {
                    $msg = "Image pas sous format gif/jpeg/png";
                    $msg_class = "alert-danger";
                }
                else if($_FILES['profileImage']['size'] > 200000) {
                    $msg = "L'image dépasse 200kb ! ";
                    $msg_class = "alert-danger";
                    }
                else {

    
                $profileImageName = $_SESSION['login']. '.'. pathinfo($_FILES["profileImage"]["name"], PATHINFO_EXTENSION) ;
                
                $target_dir = "ressources/userpics/";
                $target_file = $target_dir . basename($profileImageName);
                
                if(file_exists($target_file)) {
                    unlink($target_file);
                    $msg = "Le fichier existe déjà !";
                    $msg_class = "alert-danger";
                }
                
                if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
                      if($this->modele->insereImage($profileImageName,$_SESSION['id'])){
                        $msg = "Image enregistré";
                        $msg_class = "alert-success";
                      } else {
                        $msg = "Erreur BD";
                        $msg_class = "alert-danger";
                      }
                    } else {
                      $msg = "Erreur inconnu. Veuillez réessayer.";
                      $msg_class = "alert-danger";
                    }
            }
        }
        else {
            $msg = "Vous n'avez pas selectionné d'image";
            $msg_class = "alert-danger";
        }
            $this->vue->afficheProfil($msg,$msg_class);
        }


}


