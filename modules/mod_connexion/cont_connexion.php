<?php
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');
include_once 'vue_connexion.php';
include_once 'modele_connexion.php';

Class ContConnexion {

		private $vue;
		private $modele;

		public function __construct () {
			$this->vue = new VueConnexion();
			$this->modele = new ModeleConnexion();
		}

		
		public function afficheConnexion() {
			$_SESSION["token"] = bin2hex(random_bytes(32));
			if(isset($_SESSION['login'])) {
				$this->vue->dejaCo();
				if(isset($_SESSION['role']) && $_SESSION['role'] == 1) {
					$this->vue->form_inscription();
				}

			}
			else {
			$this->vue->form_connexion();
			}
		}

		public function seConnecter() {
			if(!isset($_SESSION['login'])) {
				$login = htmlspecialchars($_POST['login']);
				$mdp = htmlspecialchars($_POST['mdp']);
				if($this->modele->seConnecter($login,$mdp)) {
					$utilisateur = $this->modele->getUtilisateur($login);
					$_SESSION['login']= $login;
					$_SESSION['role'] = $utilisateur['idRole'];
					$_SESSION['id'] = $utilisateur['idUtilisateur'];
					$_SESSION['loggedin'] = true;
					$_SESSION['nom'] = $utilisateur['nom'];
					$_SESSION['prenom'] = $utilisateur['prenom'];
					$this->vue->connexionOK();
				}
				else {
					echo "Erreur connection utilisateur/mdp ";

				}

			}
		}

		public function seDeconnecter() {
			$bool = $this->modele->seDeconnecter();
			//var_dump($bool);
			if($bool) {
				echo "<label>Deconnexion réussie</label>";
			}
			else {
				echo "<label>Deconnexion échoué</label>";
			}
			echo '<a href="index.php">Retour INDEX</a>';

			header ('refresh:3; url=index.php', true, 303);
		}

		public function inscrire() {
			
			if(!empty($_POST) && $this->checkToken()){
				if(isset($_POST["login"],$_POST["mdp"],$_POST["nom"],$_POST["prenom"],$_POST["listbox"]) && !empty($_POST["login"])&& !empty($_POST["mdp"])&&!empty($_POST["nom"])&&!empty($_POST["prenom"])&&!empty($_POST["listbox"])){
					$login = htmlspecialchars($_POST['login']);
					$mdp = htmlspecialchars($_POST['mdp']);
					$nom = htmlspecialchars($_POST['nom']);
					$prenom = htmlspecialchars($_POST['prenom']);
					$role = htmlspecialchars($_POST['listbox']);
					$this->modele->inscrire($login,$mdp,$nom,$prenom, $role);
					unset($_POST);
					unset($_SESSION['token']);
				}
				else{
					die("le formulaire est incomplet");
				}
			}
		}

		public function checkToken() {
			if (!isset($_POST["token"]) || !isset($_SESSION["token"])) { exit(); }
			if ($_POST["token"] == $_SESSION["token"]) return true;
			return false; 
		}



}

?>