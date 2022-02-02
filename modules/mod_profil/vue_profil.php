<?php
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');

Class VueProfil{

	public function __construct(){

	}

    function afficheProfil($msg,$msg_class) {
        $this->afficheChangementImage($msg,$msg_class);
    }

    function afficheChangementImage($msg,$msg_class) {
    //     echo ' <form action="index.php/module=mod_profile&action=uploadImage" method="POST">
    //     <input type="file" name="profilePicture"><br><br>
    //     <input type="submit" value="Change!">
    // </form>';

    include('profil.php');
    }
   

}

?>