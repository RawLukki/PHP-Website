<?php
if (!defined('CONST_INCLUDE'))
die ('Acces direct interdit !');

Class VueActu{

    public function __construct()
    {
        
    }

    public function afficheEvent($donnesEvent){
        print '<div class="presentationActu">
        <p>
        Cette page contient la liste des événements prochains de votre IUT. </br>
         Ils sont mis à jours à chaque fois qu\'un nouvelle événement est prévu dans l\'établissement. </br>
        Vous pourrez aussi consulter les annonces de la direction envers les étudiants, ou bien, les incidents techniques repérés dans les salles de cours.
        </p>

        </div>
    
        <div class="evenementActu">
        <h1>Evénements</h1>
        </div>
        ';
       
        foreach($donnesEvent as $donnesEv){
            echo '<div class="retour1"><h3>'.'Titre : '.$donnesEv["titreEvent"].'</h3>'.'<p>'.' Contenu : '.$donnesEv["contenuEvent"].'</p>'.'<p>'.' Auteur : '.$donnesEv["login"].'</p>'.'<p>'. 'Date de début : '.$donnesEv["dateDebut"].'</p>'.'<p>'.'Date de fin : '.$donnesEv["dateFin"].'</p></div>'; 
        }
    }
    public function form_Event() {
        print'
        <form action="index.php?module=mod_actu&action=insertEvent" method="post">
        <div class="typeEvent">

        <div class="titreandcontenu">
            <label for="titreEvent">Titre événement :</label> </br>
            <input type="text" name="titreEvent" id="titreEvent" placeholder="Renseignez le titre de l\'événement ici" required> </br> </br>
            <label for="event">Contenu événement :</label> </br>
            <input type="text" name="event" id="event" placeholder="Renseignez votre événement ici" required> </br></br>
        </div>

        <input type="hidden" name="token" value="'.$_SESSION["token"].'"/>
        <label for="dateDebut">Date début:</label>
        <input type="date" name="dateDebut" id="debut" required> 
        <label for="dateFin">Date fin :</label>
        <input type="date" name="dateFin" id="fin" required> </br></br>

            <button type="submit" class="btn btn-primary bg-dark" name="submitEvent">Envoyer</button>
            <button type="reset" class="btn btn-primary bg-dark" name="resetTextEvent">Reset</button>
        </div>
    </form>';

    }
 
  
        public function afficheActu($donnesActu){
                print'
                <div class="actuIncidents">
                <h1>Actu/Incident</h1>
                </div>
        
        ';
       
        foreach($donnesActu as $donnesAct){
            echo '<div class="retour2"> <h3>'.'Titre : '.$donnesAct["titre"].'</h3>'.'<p>'.' Contenu : '.$donnesAct["contenu"].'</p>'.'<p>'.' Auteur : '.$donnesAct["login"].'</p>'.'<p>'.'Heure annonce : '.$donnesAct["heureAnnonce"].'</p>'.'<p>'.'Date annonce : '.$donnesAct["dateAnnonce"].'</p> </div>'; 
        }
    ;
    }

    

    public function form_Actu() {
        print '
            <form action="index.php?module=mod_actu&action=insertActu" method="post">
            <div class="typeActu">

                <div class="titreandcontenuActu">
                    <label for="titreactu">Titre Actu :</label> </br>
                    <input type="text" name="titreactu" id="titreactu" placeholder="Renseignez le titre de la news ou de l\'incident ici" required> </br></br>
                    <label for="actu">Contenu Actu/Incident :</label> </br>
                    <input type="text" name="actu" id="actu" placeholder="Renseignez votre news ou les détails de l\'incident ici" required> </br> </br>
                </div>   

                <label for="heureActu">Heure annonce :</label>
                <input type="time" name="heureActu" id="heureActu" required> 
                <input type="hidden" name="token" value="'.$_SESSION["token"].'"/>
                <label for="dateActu">Date annonce:</label>
                <input type="date" name="dateActu" id="dateActu" required> </br></br>

                <button type="submit" class="btn btn-primary bg-dark" name="submitActu">Envoyer</button>
                <button type="reset" class="btn btn-primary bg-dark" name="resetTextActu">Reset</button>
            </div>
        </form>
        ';
    }
}

?>