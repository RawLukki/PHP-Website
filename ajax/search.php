<?php
define('CONST_INCLUDE', NULL);
session_start();

if (isset($_SESSION['login'])) {
    
    if(isset($_POST['key'])){
      
	   try {
		$dns = "mysql:host=78.198.82.2;dbname=sql4462480;charset=utf8";
		$bdd= new PDO($dns, "karotine","cHqYHwNqaV");
	   }
		catch(Exception $e){
			die('Erreur : ' . $e->getMessage());
		}

	   $key = "%{$_POST['key']}%";
	   $sql = "SELECT * FROM utilisateur
	           WHERE nom
	           LIKE ? OR prenom LIKE ?";
       $requete = $bdd->prepare($sql);
       $requete->execute([$key, $key]);

       if($requete->rowCount() > 0){ 
         $users = $requete->fetchAll();

         foreach ($users as $user) {
         	if ($user['idUtilisateur'] == $_SESSION['id']) continue;
       ?>
       <li class="list-group-item">
		<a href="index.php?module=mod_messagerie&action=chat&id=<?=htmlspecialchars($user['idUtilisateur'])?>"
		   class="d-flex
		          justify-content-between
		          align-items-center p-2">
			<div class="d-flex
			            align-items-center">

				<img src="ressources/userpics/<?=htmlspecialchars($user['profile_image'])?>"
			         class="w-10 rounded-circle">

			    <h3 class="fs-xs m-2">
			    	<?=htmlspecialchars($user['nom'])?>
			    </h3>            	
			</div>
		 </a>
	   </li>
       <?php } }else { ?>
         <div class="alert alert-info 
    				 text-center">
		   <i class="fa fa-user-times d-block fs-big"></i>
           L'utilisateur "<?=htmlspecialchars($_POST['key'])?>"
           n'a pas été trouver.
		</div>
    <?php }
    }

}else {
	header("Location: ../../index.php");
	exit;
}