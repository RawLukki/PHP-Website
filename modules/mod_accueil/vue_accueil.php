<?php
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');

class VueAccueil {
	
	public function __construct() {

	}

	public function afficheAccueil() {
        //On peut changer d'images avec les touches du clavier 
	print '<h2 id="titreAccueil">Bienvenue sur le site ShareUrProjet</h2>';
        print '<div class="containerAcc">
        
             <div class="slider">
                <img class="imgslide active" src="ressources/accueil/iut_batF.png" alt="Devanture bâtiment F"> </img>
                <img class="imgslide" src="ressources/accueil/batPrincipal.png" alt="Bâtiment principal"></img>
                <img class="imgslide" src="ressources/accueil/cantine.jpg" alt="Cantine de l\'IUT"></img>
                <img class="imgslide" src="ressources/accueil/BatimentC.jpg" alt="Bâtiment C"></img>
                <img class="imgslide" src="ressources/accueil/BatimentF.jpg" alt="Bâtiment F"></img>
                <img class="imgslide" src="ressources/accueil/Apprenti.jpg" alt="Bâtiment principal"></img>
            </div>

            <div class="cont-btn">
                <div class="btn-nav left">⇦</div>
                <div class="btn-nav right">⇨</div>
            </div>   
        </div>
    
        <hr class="solid">
        
        <div class="fonctionalitecontainer">
            
            <h3>Fonctionnalités</h3>
        
            <div class="infofonctionalite">

                <div class="fonctionalite-item" id=reserver>
                    <div class="imagetitle">
                        <img class="symbole3" src="ressources/accueil/reserver.png" alt="Réservation"> </img>
                        <h4>Réserver</h4>
                    </div>
                    <div class="miniparagraphe">
                        <p>Vous souhaitez occuper une de nos salles 
                        pour travailler sur un projet ?
                        Accéder au calendrier des réservation avec l\'onglet : "Réserver".</p>
                    </div>
                </div>
            
                <div class="fonctionalite-item" id=actualite>
                    <div class="imagetitle">
                        <img class="symbole3" src="ressources/accueil/Actualité.png" alt="Newspaper"> </img>
                        <h4>Actualités</h4>
                    </div>
                    <div class="miniparagraphe">
                    <p>Vous repérez un problème dans une salle ou souhaitez informez les étudiants d\'un événement prochain ?
                        Notifiez le dans l\'onglet : "Actualités".</p>
                    </div>
                    
                </div>
                <div class="fonctionalite-item" id=contacter>
                    <div class="imagetitle">
                        <img class="symbole3" src="ressources/accueil/Contact.png" alt="Enveloppe"> </img>
                        <h4>Contacter</h4>
                    </div>
                    <div class="miniparagraphe">
                        <p>Vous voulez vous entretenir en message privé 
                         avec l\'un de nos utilisateurs? 
                        Faites le avec l\'onglet : "Boîte de Réception".</p>
                    </div>
                    
                </div> 
                <div class="fonctionalite-item" id=projets>
                    <div class="imagetitle">
                        <img class="symbole3" src="ressources/accueil/projets.png" alt="Projets"> </img>
                        <h4>Projets</h4>
                    </div>
                    <div class="miniparagraphe">
                        <p>Vous avez l\' ambition de créer un projet dans l\'IUT ? 
                        Accéder à l\'interface avec l\'onglet : "Projets".</p>
                    </div>
                </div>  
            </div>
        
        </div>
        
        <hr class="solid">
    
        

        <div class="aboutIUT">
            <h>Le Wiki de l\'IUT</h>
            <div class="video">
                <video controls="controls" poster="ressources/accueil/logoIUTdeMontreuil.png" height="300px">
                    <source src="ressources/accueil/videos/presentationIUT.mp4" type="video/mp4">
                        Si vous ne voyez pas la vidéo, le probleme provient de votre navigateur de recherche.
                </video>
            </div>
        
            <div class="infoIUT">
                <p>
                    L’IUT de Montreuil propose des formations universitaires à vocation professionnelle. </br>
                    L’IUT de Montreuil c’est : 4 départements de formation en adéquation avec les besoins des entreprises </br>
                    et du territoire:</br>
                    -Gestion Aadministration et Commerciale des Organisation (GACO)</br>
                    -Informatique (INFO)</br>
                    -Qualité Logistique et Industrielle et Organisation (QLIO)</br>
                    -Information-Communication (INFOCOM)</br>
                    <br>
                    L\'IUT propose un enseignement universitaire de qualité avec une pédagogie adaptée 
                    laissant une large place aux stages et aux travaux dirigés et pratiques en petits groupes. </br>
                    Une équipes pédagogique investie et soucieuse d\'accompagner la réussite de ses étudiants. </br>
                    Un cursus universitaire et professionnel répondant à un programme national. </br>
                    Une offre de mobilité internationale qui ne cesse de se développer. </br>
                    Des installations pédagogiques performantes et modernes à la disposition des différentes formations.
                </p>
            </div>
            
        </div>
        
        <hr class="solid">
        
        <h3 class="accueilh3">L\'IUT DANS SON MILIEU NATUREL</h3>
        
        <div class="activiteesmap">

            <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.7746765364436!2d2.462844641083445!3d48.86250692633431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e612ae6a4cd20d%3A0xfe5502b116430be!2sIUT%20De%20Montreuil!5e0!3m2!1sfr!2sfr!4v1638828840389!5m2!1sfr!2sfr" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        
        <script src="app.js"></script>	
        ';
    }
}
?>
