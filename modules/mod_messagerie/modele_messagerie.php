<?php
if (!defined('CONST_INCLUDE'))
	die ('Acces direct interdit !');
include_once 'connexion.php';

Class ModeleMessagerie extends Connexion {

    public function __construct() {
		//session_start();
	}


    public function getUser($login) {
		$selectPreparee = self::$bdd->prepare('SELECT * FROM utilisateur where login = ? ;');
		$selectPreparee->execute(array("$login"));
		$hashrecup = $selectPreparee->fetch();
        return $hashrecup;
	}

    public function getUserWithId($id) {
		$selectPreparee = self::$bdd->prepare('SELECT * FROM utilisateur where idUtilisateur = ? ;');
		$selectPreparee->execute(array("$id"));
		$hashrecup = $selectPreparee->fetch();
        return $hashrecup;
	}

    public function getConversations($userId) {
        $selectPreparee = self::$bdd->prepare('SELECT * FROM conversations where user1 = ? OR user2 = ? ORDER BY conversation_id DESC;' );
		$selectPreparee->execute([$userId, $userId]);
        if($selectPreparee->rowCount() > 0) {
            $conversations = $selectPreparee->fetchAll();
            $user_data = [];

            foreach($conversations as $conversation) {
                if($conversation['user1'] == $userId) {
                    $selectPreparee2 = self::$bdd->prepare('SELECT idUtilisateur,nom,prenom, profile_image from utilisateur where idUtilisateur =?;');
                    $selectPreparee2->execute([$conversation['user2']]);
                } else {
                    $selectPreparee2 = self::$bdd->prepare('SELECT idUtilisateur,nom,prenom, profile_image from utilisateur where idUtilisateur =?;');
                    $selectPreparee2->execute([$conversation['user1']]);
                }

                $allConversations = $selectPreparee2->fetchAll();
                array_push($user_data, $allConversations);
            }
            return $user_data;
        }
		else {
            $conservations = [];
        }
        return $conservations;
    }

    public function search($key) {
        $sql = 'SELECT * FROM utilisateur
                WHERE nom
	            LIKE ? OR prenom LIKE ?';
        $requete = self::$bdd->prepare($sql);
        $requete->execute([$key, $key]);
            $users = $requete->fetchAll();
            return $users;
    }

    public function getMessages($idUtilisateur,$idContact) {
        $requete = self::$bdd->prepare('SELECT * FROM message
        WHERE ((destinataire=? AND expediteur=?)
        OR    (expediteur=? AND destinataire=?))
        AND (status = 1 )
        ORDER BY idChat ASC;');

        $requete->execute([$idUtilisateur, $idContact, $idUtilisateur, $idContact]);
        if ($requete->rowCount() > 0) {
            $chats = $requete->fetchAll();
            return $chats;
        }else {
            $chats = [];
            return $chats;
        }
    }

    public function getNouveauMessages($id) {
        $requete = self::$bdd->prepare('SELECT count(*) as nbNonLu,expediteur FROM message
        WHERE (destinataire=? and status=0) group by expediteur');
        $requete->execute([$id]);
        return $requete->fetchAll();
    }


}


?>