<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
class VueReservation
{

    function affiche_liste($tab)
    {
        //Donner des noms aux table 
        echo '<h1>Vos reservations actuelles</h1>
            <table>
                <tr class="entete">
                    <td>Salle</td>
                    <td>Personne</td>
                    <td>Date</td>
                    <td>Heure d\'arrivée</td>
                    <td>Heure de départ</td>
                    <td>Actions</td>
                </tr>';
        foreach ($tab as $val) {

            echo '
            <tr class="element" id="element">
                <td>' . $val[0] . '</td>
                <td>' . $val[1] . '</td>
                <td>' . $val[2] . '</td>
                <td>' . $val[3] . '</td>
                <td>' . $val[4] . '</td>
                <td> <button id="btnSupp" name="btnSupp" value=' . $val[5] . '>Supprimer</button> </td>
            </tr>';
        }
        print ' </table>';
        echo "<br>";
    }

    // Affiche du formulaire reservation
    public function formReservation()
    {
        print '<form name="formulaire" action="index.php?module=mod_reservation&action=ajouterReservation" method="post">

        <h1>Formulaire de reservation :</h1>

    <div class="formulaire" id="formulaire">

        <!--Identité du reponsable de la reservation -->
        <div class="identite">
            <h>Identité du Responsable</h>

            <div id="nomPrenomResponsable">
                <div id="nomChamp">
                    <label for="nomUtilisateur">Nom </label>
                    <label for="prenomUtilisateur">Prenom </label>

                </div>

                <div id="saisie">
                    <input type="text" id="nomUtilisateur" name="nom" size="30" onkeyup="majuscule()"
                     placeholder="Entrez votre NOM" />

                    <input type="text" id="prenomUtilisateur" name="prenom" size="30"
                        placeholder="Entrez votre Prenom" />
                    <input type="hidden" name="token" value="' . $_SESSION["token"] . '"/>
                </div>
            </div>

        </div>
        <hr>

        <!--materiel er salle de la reservation -->
        <div class="lieu"> 
            <div class="materielPrsn">
                <h>Groupe et Materiels</h>
                <div class="materiel" id="materiel">

                    <label>Ordinateur <input type="checkbox" class="checkbox_check" id="ordi"
                    value="Ordinateur" onclick="listeSalles()"></label></br>
                    
                    <label>Enceinte <input type="checkbox" class="checkbox_check" id="enceinte" 
                    value="Enceinte" onclick="listeSalles()"></label></br>
                    
                    <label>Projecteur <input type="checkbox" class="checkbox_check" id="proj" 
                    value="Projecteur" onclick="listeSalles()"></label></br>
                    
                    <label>Instruments <input type="checkbox" class="checkbox_check" id="instru" 
                    value="Instruments" onclick="listeSalles()"></label>


                </div>
                
                <div id="personne">
                    <label for="nbPrsn">Nombre de personne</label>
                    <input id="nbPrsn" type="number" name="nbPrsn" max="200" min="3" onkeyup="listeSalles()"
                    placeholder="Combien êtes-vous"  />
                </div>

            </div>

        </div>
        <hr>
        <div class="Salles">
           
                <h>Salles Disponible</h>
                <select id="salles" name="salles">
                    
                </select>
        </div>
        <hr>
        <!--La date et horaires de la reservation -->
        <div class="quand">
            <h>Calendrier et Horaires</h>

            <div id="calendrier">
                <label for="jour">Calendrier :</label>
                <input type="text" name="jour" id="jour" >
            </div>

            <div class="horaire">
                <div id="arriver">
                    <label for="arriver">Arrivée:</label>
                    <input type="time" id="arriver" name="arriver" min="09:00" max="17:00" step="300" 
                    required pattern="[0-9]{2}:[0-9]{2}">
                </div>

                <div id="duree">
                    <label for="duree">Durée :</label>
                    <select id="duree" name="duree">
                        <option value="#"> </option>
                        <option value="00:15:00">15 mn</option>
                        <option value="00:30:00">30 mn</option>
                        <option value="01:00:00">1h00</option>
                        <option value="01:30:00">1h30</option>
                    </select>
                </div>

            </div>

        </div>

        <hr>
        <!--envoie du formulaire -->
        <div class="envoyer">
            <button type="submit" id="btn" name="submit"><b>Reserver</b></button>
            <button id="btn2"><b>Continuer</b></button>
        </div>
        
        </div>
        </form>';
    }


    public function reservationReussi()
    {
        print '<div class ="message">
        <span class="input-success">Votre reservation a bien été prise en compte</span>
        </div>';
    }

    public function messageErreur()
    {
        print '<div class ="message">
        <span class="input-error">Veuillez renseigner correctement tous les champs</span>
        </div>';
    }

    public function DejaReserver()
    {
        print '<div class="message"> 
        <span class="input-error">La salle est déjà occupée</span>
        </div>';
    }

    public function horaireIncorrecte()
    {
        print '<div class="message">
        <span class="input-error">Vous pouvez reserver pour maximum 18H</span>
        </div>';
    }

    public function dureeIncorrecte()
    {
        print '<div class="message">
        <span class="input-error">La durée de reservation excede 15 mn pour le karaoke</span>
        </div>';
    }

    public function erreur()
    {
        print '<div class="message"><span class="input-error">Une erreur est survenue</span></div>';
    }
}