<?php 
define('CONST_INCLUDE', NULL);
session_start();


if (isset($_SESSION['login'])) {
    
	if (isset($_POST['message']) &&
        isset($_POST['destinataire'])) {
	

	
	$message = strip_tags($_POST['message']);
	$to_id = strip_tags($_POST['destinataire']);

	$from_id = $_SESSION['id'];
	try {
		$dns = "mysql:host=78.198.82.2;dbname=sql4462480;charset=utf8";
		$bdd= new PDO($dns, "karotine","cHqYHwNqaV");
	}
	catch(Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
    
	$sql = "INSERT INTO 
	       message (expediteur, destinataire, contenu) 
	       VALUES (?, ?, ?)";
	$requete = $bdd->prepare($sql);
	$result  = $requete->execute([$from_id, $to_id, $message]);
    

    if ($result) {
    	// premiere conversation ?
       $sql2 = "SELECT * FROM conversations
               WHERE (user1=? AND user2=?)
               OR    (user2=? AND user1=?)";
       $requete2 = $bdd->prepare($sql2);
	   $requete2->execute([$from_id, $to_id, $from_id, $to_id]);

	    //timezone
		define('TIMEZONE', 'Europe/Paris');
		date_default_timezone_set(TIMEZONE);
		
		//format
		$time = date("h:i:s a");

		if ($requete2->rowCount() == 0 ) {
			$sql3 = "INSERT INTO 
			         conversations(user1, user2)
			         VALUES (?,?)";
			$requete3 = $bdd->prepare($sql3); 
			$requete3->execute([$from_id, $to_id]);
		}
		?>

		<p class="rtext align-self-end
		          border rounded p-2 mb-1">
		    <?=htmlspecialchars($message)?>  
		    <small class="d-block"><?=$time?></small>      	
		</p>

    <?php 
     }
  }
}else {
	header("Location: ../index.php");
	exit;
}