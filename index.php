<!DOCTYPE HTML>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Import du datepicker-->
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://jqueryui.com/resources/demos/datepicker/i18n/datepicker-fr.js"></script>

    <script type="text/javascript" src="../js/datepicker-fr.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="css/chat.css" rel="stylesheet">
    <link href="css/profil.css" rel="stylesheet">
    <link href="css/styleActu.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styleReservation.css">
    <link rel="stylesheet" href="css/styleProjet.css">

    <script src="js/profil.js"></script>
    <script src="js/reservation.js"></script>
    <script src="js/project.js"></script>

</head>

<body>
    <header>
    <?php
	define('CONST_INCLUDE', NULL);
	session_start();
	include_once 'connexion.php';
	include_once 'modules/mod_header/mod_header.php';
	Connexion::initConnexion();
	new ModHeader();
	?>

        

    </header>
    <div class="main">
    <?php


    //echo password_hash("profValide", PASSWORD_DEFAULT);
    //echo "<pre>";
    //print_r($_SESSION);
    //echo "</pre>";
    if (isset($_GET['module']))
        $module = $_GET['module'];
    else
        $module = "accueil";

    switch ($module) {
        case 'mod_connexion':
			include_once 'modules/mod_connexion/mod_connexion.php';
			$mod = new ModConnexion();
			break;
		case 'mod_messagerie' :
			include_once 'modules/mod_messagerie/mod_messagerie.php';
			$mod = new ModMessagerie();
			break;
		case 'mod_profil' : 
			include_once 'modules/mod_profil/mod_profil.php';
			$mod = new ModProfil();
			break;
		case 'mod_actu' : 
			include_once 'modules/mod_actu/mod_actu.php';
			$mod = new ModActu();
			break;
        	case 'mod_projet':
        		include_once 'modules/mod_projet/mod_projet.php';
            		$mod = new ModProjet();
            		break;
		case 'mod_reservation' : 
			include_once 'modules/mod_reservation/mod_reservation.php';
			$mod = new ModReservation();
			break;
        	default:
        		include_once 'modules/mod_accueil/mod_accueil.php';
            		$mod = new ModAccueil();
            		break;
    }

    ?>
    </div>
    

</body>

<footer>

    <div class="logo_Paris8">
        <a href="https://www.univ-paris8.fr/" target="_blank">
            <img class="socialImg" src="ressources/accueil/logo.png" alt="IUT" />
        </a>
    </div>

    <div class="information">
        <h>IUT DE MONTREUIL :</h></br>
        <div class="parInfo">
            <p>140 rue Nouvelle France, 93100 Montreuil</p>
            <p>Tel. : 01 48 70 37 00</p>
        </div>


    </div>

    <div class="contact">
        <h>Contacts :</h></br>
        <div id="au_sein_IUT">

            <p>Directrice de l'IUT : <a href="mlamolle@iut.univ-paris8.fr">mlamolle@iut.univ-paris8.fr</a>
            </p>

            <p>Responsable du patrimoine de l’IUT : <a
                    href="efiloche@iut.univ-paris8.fr">efiloche@iut.univ-paris8.fr</a>
            </p>

            <p>Service informatique : <a href="ccri@iut.univ-paris8.fr">ccri@iut.univ-paris8.fr</a>
            </p>
        </div>

        <div id="karotine">
            <p>Createur du site : <a href="karotine@gmail.com">karotine@gmail.com</a>
            </p>
        </div>
    </div>

    <div class="reseaux_sociaux">
        <h>Rejoignez-nous :</h></br>

        <div id="haut">
            <a href="https://www.youtube.com/user/IUT93M" target="_blank">
                <img class="socialImg" src="ressources/accueil/logo yt.png" alt="Youtube" />
            </a>
            <a href="https://mobile.twitter.com/iutdemontreuil" target="_blank">
                <img class="socialImg" src="ressources/accueil/logo tw.png" alt="twitter" />
            </a>
        </div>

        <div id="bas">
            <a href="https://www.facebook.com/IUT.Montreuil" target="_blank">
                <img class="socialImg" src="ressources/accueil/logo insta.png" alt="Instagram" />
            </a>
            <a href="https://fr-fr.facebook.com/IUT.Montreuil/" target="_blank">
                <img class="socialImg" src="ressources/accueil/logo fb.png" alt="Facebook">
            </a>
        </div>
    </div>
    <div class="mention_legale">
        <hr>
        <p>© Universite Paris 8, IUT de Montreuil 2021 - Tous droits reservés</p>
    </div>
</footer>

</html>
