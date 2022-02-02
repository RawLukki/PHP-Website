<?php
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');

Class VueConnexion{

	public function __construct(){
		
	}

	public function form_connexion() {

			echo '<div class="login-page">
			<div class="form">
			  <div class="login">
				<div class="login-header">
				  <h3>CONNEXION</h3>
				  <p>Entrer vos identifiants pour vous connecter</p>
				</div>
			  </div>
			  <form class="login-form" action = "index.php?module=mod_connexion&action=seConnecter" method = "post">
			  <div class="login-bar">
			  <i class="fas fa-user"></i>
			  <input type="text" name="login" placeholder="Login" required ="required"/>
			  </div>
			  <div class = "password-bar">
			  <i class="fas fa-lock"></i>
			  <input type="password" name="mdp" placeholder="Mot de passe" required ="required"/>
				<button>login</button>
			</div>
				<p class="messageOublie">Mot de passe oublié ? <a href="#">Clique ici</a></p>
			  </form>
			</div>
		  </div>';
	}

	public function form_inscription() {
		echo '<h2>INSCRIPTION</h2>';
		echo '<form name = "form_inscription" 
			action = "index.php?module=mod_connexion&action=inscrire"
			method = "post">
			Login :
			<input type="text" name="login" placeholder="login" required = "required"/> </br>
			mdp:
			<input type="password" name="mdp" placeholder="mot de passe" required = "required"/> </br>
			nom:
			<input type="text" name="nom"> </br>
			prenom:
			<input type="text" name="prenom"> </br>
			<p>Rôle - Single Select<br>
			<select name="listbox" size="3">
			<option value="1" selected>Administrateur</option>
			<option value="2">Personnel</option>
			<option value="3">Organisation</option>
			<option value="4">Etudiant</option>
			<option value="5">Banni</option>
			</select>
			</p>
			<input type="hidden" name="token" value="'.$_SESSION['token'].'"/>';
			echo '<input type="submit" value="envoi">
			</form>';
	}

	public function dejaCo() {
		echo 'Vous etes déja connecté en tant que '.$_SESSION['login'] ;
		echo '</br>';
		echo '<a href="index.php?module=mod_connexion&action=deconnexion">Se deconnecter</a>';

	}

	public function connexionOK() {
		echo 'Connexion réussie en tant que '.$_SESSION['login'];
	}

}

?>
