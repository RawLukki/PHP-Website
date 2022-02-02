
<div class="d-flex
             justify-content-center
             align-items-center
             vh-100
			 ">
    <div class="p-2 w-400
                rounded shadow">
    	<div>
    		<div class="d-flex
    		            mb-3 p-3 bg-light
			            justify-content-between
			            align-items-center">
    			<div class="d-flex
    			            align-items-center">
    			    <img src="ressources/userpics/<?=$_SESSION['profile_image']?>"
    			         class="w-25 rounded-circle">
                    <h3 class="fs-xs m-2"><?=$_SESSION['nom']?></h3> 
    			</div>
    		</div>

    		<div class="input-group mb-3">
    			<input type="text"
    			       placeholder="Chercher un utilisateur nom/prenom"
    			       id="searchText"
    			       class="form-control">
    			<button class="btn btn-primary" 
    			        id="searchBtn">
    			        <i class="fa fa-search"></i>	
    			</button>       
    		</div>
    		<ul id="chatList"
    		    class="list-group mvh-50 overflow-auto">
    			<?php if (!empty($conversations)) { ?>
    			    <?php 

    			    foreach ($conversations as $conversation){ ?>
	    			<li class="list-group-item">
	    				<a href="index.php?module=mod_messagerie&action=chat&id=<?=htmlspecialchars($conversation[0]['idUtilisateur'])?>"
	    				   class="d-flex
	    				          justify-content-between
	    				          align-items-center p-2">
	    					<div class="d-flex
	    					            align-items-center">
	    					    <img src="ressources/userpics/<?=htmlspecialchars($conversation[0]['profile_image'])?>"
	    					         class="w-10 rounded-circle">
	    					    <h3 class="fs-xs m-2">
	    					    	<?=$conversation[0]['nom']?><br>
	    					    </h3>         
								<?php $key = array_search($conversation[0]['idUtilisateur'], array_column($nouveauMessages, 'expediteur'));
								
								if ($key !== false){ ?>
									<div class="fs-xs m-2 alert alert-info" role="alert">
									<?=htmlspecialchars($nouveauMessages[$key]['nbNonLu'])?> nouveaux messages
									</div>
								<?php } ?>
	    					</div>
	    				</a>
	    			</li>
    			    <?php } ?>
    			<?php }else{ ?>
    				<div class="alert alert-info 
    				            text-center">
					   <i class="fa fa-comments d-block fs-big"></i>
                       Tu n'as apparemment pas d'amis. <br>Faut sortir un peu de chez toi !
					</div>
    			<?php } ?>
    		</ul>
    	</div>
    </div>
	  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	$(document).ready(function(){
      
      // Recherche 
       $("#searchText").on("input", function(){
       	 var searchText = $(this).val();
         if(searchText == "") return;
         $.post('ajax/search.php', 
         	     {
         	     	key: searchText
         	     },
         	   function(data, status){
                  $("#chatList").html(data);
         	   });
       });

       // Recherche avec le bouton
       $("#searchBtn").on("click", function(){
       	 var searchText = $("#searchText").val();
         if(searchText == "") return;
         $.post('ajax/search.php', 
         	     {
         	     	key: searchText
         	     },
         	   function(data, status){
                  $("#chatList").html(data);
         	   });
       });

    });
</script>

</div>
