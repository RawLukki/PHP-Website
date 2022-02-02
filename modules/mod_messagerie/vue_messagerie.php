<?php
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');

Class VueMessagerie{

	public function __construct(){
		
	}

	public function afficheMessagerie($conversations,$nouveauMessages) {
		include 'principal.php';
	}

	public function vueSearch($users) {
		include ('vueSearch.php');
	}

	public function afficheChat($chats,$chatWith) {
		include ('chat.php');
	}

	}
	

?>