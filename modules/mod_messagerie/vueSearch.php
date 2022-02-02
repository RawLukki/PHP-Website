<?php
if (sizeof($users)>0) {
foreach ($users as $user) {
         	if ($user['idUtilisateur'] == $_SESSION['id']) continue;
       ?>
       <li class="list-group-item">
		<a href="chat.php?user=<?=htmlspecialchars(($user['nom']))?>"
		   class="d-flex
		          justify-content-between
		          align-items-center p-2">
			<div class="d-flex
			            align-items-center">

			    <img src="ressources/userpics/<?=htmlspecialchars(($user['profile_image']))?>"
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
           n'a pas été trouvé.
		</div>
    <?php }