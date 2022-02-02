<?php
	if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');
	class Connexion {
		protected static $bdd;


		public static function initConnexion() {

			try {
				$dns = "mysql:host=78.198.82.2;dbname=sql4462480;charset=utf8";
				self::$bdd= new PDO($dns, "karotine","cHqYHwNqaV");
			}
			catch(Exception $e){
				die('Erreur : ' . $e->getMessage());
			}
		}
		
	/*	protected static $bdd;
    public static function initConnexion(){
        try{
            self::$bdd = new PDO('mysql:host=localhost;dbname=karotine;charset=utf8','root','');
        }
        catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }*/
	}
	


?>