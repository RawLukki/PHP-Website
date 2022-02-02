<?php
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');
include_once 'connexion.php';

Class ModeleConnexion extends Connexion {
	
	public function __construct() {
		//session_start();
	}

	public function seConnecter($login,$mdp) {
		$selectPreparee = self::$bdd->prepare('SELECT password FROM utilisateur where login = ? ;');
		$selectPreparee->execute(array("$login"));
			$hashrecup = $selectPreparee->fetch();
			//var_dump($hashrecup);
			if (isset($hashrecup) ) {
				if(password_verify($mdp,$hashrecup['password'])) {
					return true;
				}
			}
			return false;
	}

	public function getRole($login) {
		$selectPreparee = self::$bdd->prepare('SELECT idRole FROM utilisateur where login = ?;');
		$selectPreparee->execute(array("$login"));
		return $selectPreparee->fetch()['idRole'];
	}

	public function getId($login) {
		$selectPreparee = self::$bdd->prepare('SELECT idUtilisateur FROM utilisateur where login = ?;');
		$selectPreparee->execute(array("$login"));
		return $selectPreparee->fetch()['idUtilisateur'];
	}

	public function getUtilisateur($login) {
		$selectPreparee = self::$bdd->prepare('SELECT * FROM utilisateur where login = ?;');
		$selectPreparee->execute(array("$login"));
		return $selectPreparee->fetch();
	}

	public function seDeconnecter() {
		return session_unset();
	}

	public function inscrire($login,$mdp,$nom,$prenom,$role) {
		$reqPrepare = self::$bdd->prepare('INSERT INTO utilisateur(login,nom,prenom,password,idRole) VALUES (:login, :nom, :prenom, :password, :idRole)');
		 return $reqPrepare->execute([
			'login' => $login,
			'nom' => $nom,
			'prenom' => $prenom,
			'password' => password_hash($mdp, PASSWORD_DEFAULT),
			'idRole' => $role,
		]);
		
	}
		
}

?>