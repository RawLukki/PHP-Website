<?php
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');

Class VueHeader{

	public function __construct(){
		
	}

    public function afficheNav() {
       echo '<div class="divLogo">
       <a href="index.php">
			<h><img id="logo" src="ressources/accueil/logo3.png" alt="Logo du site"><h>
       </a>
   </div>';

        echo '<nav class="menuNav">
        <a href="index.php">ACCUEIL</a>
        <a href="index.php?module=mod_reservation">RESERVATION</a>
        <a href="index.php?module=mod_actu">ACTUALITES</a>
	<a href="index.php?module=mod_projet">PROJETS</a>
      
        <div id="indicator"></div>
    </nav>';
    }
    
    public function afficheHeaderConnexion() {
          echo'  <a href="index.php?module=mod_connexion" class="btnfos btnfos-1">
          <svg>
            <rect x="0" y="0" fill="none" width="100%" height="100%"/>
          </svg>
         Connexion
        </a> ';
    }

    public function afficheHeaderConnecte($userImage) {
        echo '<div class="nav_user">
			<ul>
				<li class="nr_li listePhoto">
					<img src="ressources/userpics/'.$userImage.'" alt="profile_img">
					
					<div class="liste_menu">
						<div class="liste_menu_gauche">
							<ul>
								<li><a href="index.php?module=mod_profil"><i class="fas fa-user"></i></a></li>
								<li><a href="index.php?module=mod_connexion&action=deconnexion"><i class="fas fa-sign-out-alt"></i></a></li>
							</ul>
						</div>
						<div class="liste_menu_droit">
							<ul>
								<li><a href="index.php?module=mod_profil">Profil</a></li>
								<li><a href="index.php?module=mod_connexion&action=deconnexion">Deconnecter</a></li>';
							if(isset($_SESSION['role']) && $_SESSION['role'] == 1) echo '<li><a href="index.php?module=mod_connexion">Inscrire</a></li>';
							echo'</ul>
						</div>
					</div>
				</li>
				<li class="nr_li">
						<div id="imageBoite" onclick="window.location.href=\'index.php?module=mod_messagerie\'"><i class="fas fa-envelope-open-text"></i></div>
				</li>
				<li id ="userName">
					<span >Bienvenue '.$_SESSION['prenom'] .' '.$_SESSION['nom'].'</span>
				</li>
			</ul>
		</div>
	</div>';

	echo '<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

	<script>
	
		var liste = document.querySelector(".listePhoto");
	
	liste.addEventListener("click", function(){
		this.classList.toggle("active");
	})

	
	</script>';
    }

}

?>
