<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
class VueProjet
{

    public function vueProjets($tab)
    {
        foreach ($tab as $val) {
            print '<div class="listeProjet">
                <h>Titre : ' . $val["nomProjet"] . '</h><hr>
                
                <p id="auteur"><b>Auteur : ' . $val["nomOrg"] . '</b></p>

                <p id="dpt"><b>Departement : ' . $val["departement"] . '</b></p>
                
                <p id="dateDebut">Date de début : ' . $val["debut"] . '</p>
                
                <p id="dateFin">Date de fin : ' . $val["fin"] . '</p>
                
                <div id="contenu">
                    <p>' . $val["contenu"] . '</p>
                </div>
            </div>';
        }
    }

    public function formProjet()
    {
        print '<div class="btnDefiler">
                <button id="defiler"><b>Créer un projet</b></button>
            </div>
        
        <form name="formProjet" class="formProjet" method="post" action="index.php?module=mod_projet&action=soumettreProjet">
            <h1>Créer votre projet avec l\'IUT de Montreuil :</h1></br>
            <div class="Presentation">
                <h>Organisation:</h></br></br>
                <label id="label">Identité de l\'organisation</label> 
                <input type="text" name="nomOrg" id="nomOrg" placeholder="Saisie ..."/></br></br>
                
                <input type="hidden" name="token" value="' . $_SESSION["token"] . '"/>
                
                <label id="label">Nom du Projet</label> 
                <input type="text" name="nomProjet" id="nomProjet" placeholder="Saisie ..."/></br>
           </div>
           <hr>
           
           <div class="Departement">
                <h>Formations:</h></br>
                
                <select id="dept" name="dept">
                    <option value="">--------Choix--------</option>
                    <option value="INFO">BUT Informatique</option>
                    <option value="GACO">BUT Gestion Administrative et Commerciale des Organisations</option>
                    <option value="INFOCOM">BUT information et Communication</option>
                    <option value="QLIO">BUT Qualité Logistique Industrielle et Organisation</option>
                    <option value="licProMPL">Licence Professionnelle Management des Processus logistiques</option>
                    <option value="licProCom">Licence Professionnelle Métiers de la Communication</option>
                    <option value="licProInfo">Licence Professionnelle Métiers de L’informatique</option>
                    <option value="licProCommerceNum">Licence Professionnelle E-Commerce et Marketing Numérique</option>
                    <option value="licProCommerce">Licence Professionnelle Commerce et distribution</option>
                </select>
           </div>
           
           <hr>
           
           <div class="Projet">
                <div class="Commentaire">
                    <h>Details</h></br>
                    <label for="comment">Exprimez votre projet:</label></br>
                   
                    <div class="comment">
                        <textarea class="textinput" name="comment" row="20" placeholder="Comment"></textarea>
                    </div>
                </div>

                <div class="Periode">
                    <h>Periode de réalisation</h></br>
                    
                    <label for="debut">Début :</label>
                    <input type="date" id="debut" name="debut" min="' . date('Y-m-d') . '" required></br></br>

                    <label for="fin">Fin :</label>
                    <input type="date" id="fin" name="fin" min="' . date('Y-m-d') . '" required>

                </div>
            </div>

                <hr>

            <div class="envoyerProjet">
                <button type="submit" id="submit" name="submit"><b>Envoyer le projet</b></button>
            </div>

        </form>';
    }

    public function vueProf($tab)
    {
        foreach ($tab as $val) {
            print '<div class="listeProjet">
                <h>Titre : ' . $val["nomProjet"] . '</h><hr>
                
                <p id="auteur"><b>Auteur : ' . $val["nomOrg"] . '</b></p>

                <p id="dpt"><b>Departement : ' . $val["departement"] . '</b></p>
                
                <p id="dateDebut">Date de début : ' . $val["debut"] . '</p>
                
                <p id="dateFin">Date de fin : ' . $val["fin"] . '</p>
                
                <div id="contenu">
                    <p>' . $val["contenu"] . '</p>
                </div>
            </div>';

            if ($val["valider"] == 0) {
                print '<div name="projetValide" id="projetValide" >
                    
                    <button id="btnValide" name="btnValide" value=' . $val["idProjet"] . '>Validation</button></br>
                    <hr>
                </div>';
            } else {
                print '<div class="valider">
                    <p id="valide"><b>Projet validé</b></p>
                    <hr>
                </div>';
            }
        }
    }

    public function projetEnvoyer()
    {
        print '<div class="message">
            <span class="input-success">Votre projet a bien été pris en compte</span>
        </div>';
    }
    public function messageErreur()
    {
        print '<div class="message">
            <span class="input-error">Veuillez renseigner correctement tous les champs</span>
        </div>';
    }
    public function dureeIncorrecte()
    {
        print '<div class="message">
            <span class="input-error">La date de début doit être inferieur à celle du fin</span>
        </div>';
    }

    public function accepter()
    {
        print '<div class="message">
            <span class="input-success">Le projet a été accepté</span>
        </div>';
    }
}