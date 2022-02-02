<?php 

session_start();

if (isset($_SESSION['login'])) {
    
	if (isset($_POST['destinataire'])) {
	
		try {
			$dns = "mysql:host=78.198.82.2;dbname=sql4462480;charset=utf8";
			$bdd= new PDO($dns, "karotine","cHqYHwNqaV");
		}
		catch(Exception $e){
			die('Erreur : ' . $e->getMessage());
		}
	
	$id_1  = $_SESSION['id'];
	$id_2  = strip_tags($_POST['destinataire']);

	$sql = "SELECT * FROM message
	        WHERE destinataire=?
	        AND   expediteur= ?
	        ORDER BY idChat ASC";
	$requete = $bdd->prepare($sql);
	$requete->execute([$id_1, $id_2]);

	if ($requete->rowCount() > 0) {
	    $messages = $requete->fetchAll();

	    
	    foreach ($messages as $message) {
            $messages = $requete->fetchAll();
                if ($message['status'] == 0) {
                    
                    $ouvert = 1;
                    $chat_id = $message['idChat'];
    
                    $sql2 = "UPDATE message
                             SET status = ?
                             WHERE idChat = ?";
                    $requete2 = $bdd->prepare($sql2);
                    $requete2->execute([$ouvert, $chat_id]); 

	            ?>
                  <p class="ltext border 
					        rounded p-2 mb-1">
					    <?=$message['contenu']?> 
					    <small class="d-block">
					    	<?=$message['timestamp']?>
					    </small>      	
				  </p>        
	            <?php
	            }
	    }
    }
    }
}else {
	header("Location: ../index.php");
	exit;
}