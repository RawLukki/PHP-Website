<?php
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');
include_once 'vue_header.php';
include_once 'modele_header.php';

Class ContHeader {

		private $vue;
		private $modele;

		public function __construct () {
			$this->vue = new VueHeader();
			$this->modele = new ModeleHeader();
		}

        public function afficheHeader() {
            $this->vue->afficheNav();
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                $userImage = $this->modele->getUserImage($_SESSION['id'])[0];
                if ($userImage == null || empty($userImage)) $userImage = "avatar.jpg";
                $this->vue->afficheHeaderConnecte($userImage);
                $_SESSION['profile_image'] = $userImage;
            }
            else {
                
                $this->vue->afficheHeaderConnexion();
            }
        }





}

?>
