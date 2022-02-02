<?php
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');
include_once 'vue_messagerie.php';
include_once 'modele_messagerie.php';

Class ContMessagerie {

		private $vue;
		private $modele;

		public function __construct () {
			$this->vue = new VueMessagerie();
			$this->modele = new ModeleMessagerie();
		}

        public function afficheMessagerie() {
            if(isset($_SESSION['login'])) {
                $conversations = $this->modele->getConversations($_SESSION['id']);
             
                $nouveauMessages = $this->modele->getNouveauMessages($_SESSION['id']);
                
                
                $this->vue->afficheMessagerie($conversations,$nouveauMessages);

            }
            else {
                echo '<label>Erreur !! vous devez être connecté</label>';
                header ('refresh:3; url=index.php', true, 303);
                exit();
            }
        }


        public function chat() {
            if (isset($_SESSION['login'])) {
                if (!isset($_GET['id'])) {
                    header("Location: index.php?module=mod_messagerie");
                    exit;
                }
                $chatWith = $this->modele->getUserWithId(htmlspecialchars($_GET['id']));
                if (empty($chatWith)) {
                    header("Location: index.php?module=mod_messagerie");
                    exit;
                }

                $chats = $this->modele->getMessages($_SESSION['id'],htmlspecialchars($_GET['id']));
                $this->vue->afficheChat($chats,$chatWith);

            }
            else {
                header("Location: index.php");
                exit;
            }
        }


		



}

?>
