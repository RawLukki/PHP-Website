<div class="d-flex
             justify-content-center
             align-items-center
             vh-100">
    <div class="w-400 shadow p-4 rounded">
    	<a href="index.php?module=mod_messagerie"
    	   class="fs-4 link-dark">&#8592;</a>

    	   <div class="d-flex align-items-center">
    	   	  <img src="ressources/userpics/<?=htmlspecialchars($chatWith['profile_image'])?>"
    	   	       class="w-15 rounded-circle">

               <h3 class="display-4 fs-sm m-2">
               	  <?=htmlspecialchars($chatWith['nom'])?> <br>
               </h3>
    	   </div>

    	   <div class="shadow p-4 rounded
    	               d-flex flex-column
    	               mt-2 chat-box"
    	        id="chatBox">
    	        <?php 
                     if (!empty($chats)) {
                     foreach($chats as $chat){
                     	if($chat['expediteur'] == $_SESSION['id'])
                     	{ ?>
						<p class="rtext align-self-end
						        border rounded p-2 mb-1">
						    <?=htmlspecialchars($chat['contenu'])?> 
						    <small class="d-block">
						    	<?=htmlspecialchars($chat['timestamp'])?>
						    </small>      	
						</p>
                    <?php }else{ ?>
					<p class="ltext border 
					         rounded p-2 mb-1">
					    <?=htmlspecialchars($chat['contenu'])?> 
					    <small class="d-block">
					    	<?=htmlspecialchars($chat['timestamp'])?>
					    </small>      	
					</p>
                    <?php } 
                     }	
    	        }else{ ?>
               <div class="alert alert-info 
    				            text-center">
				   <i class="fa fa-comments d-block fs-big"></i>
	               Debut de la conversation
			   </div>
    	   	<?php } ?>
    	   </div>
    	   <div class="input-group mb-3">
    	   	   <textarea cols="3"
    	   	             id="message"
    	   	             class="form-control"></textarea>
    	   	   <button class="btn btn-primary"
    	   	           id="sendBtn">
    	   	   	  <i class="fa fa-paper-plane"></i>
    	   	   </button>
    	   </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	var scrollDown = function(){
        let chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
	}

	scrollDown();

	$(document).ready(function(){
      //fonction click sur le bouton
      $("#sendBtn").on('click', function(){
      	message = $("#message").val();
          console.log(message);
      	if (message == "") return;

      	$.post("ajax/insert.php",
      		   {
      		   	message: message,
      		   	destinataire: <?=$chatWith['idUtilisateur']?>
      		   },
      		   function(data, status){
                  $("#message").val("");
                  $("#chatBox").append(data);
                  scrollDown();
      		   });
      });   

      // fonction pour recuperer les messages
      let fechData = function(){
      	$.post("ajax/getmessage.php", 
      		   {
      		   	destinataire: <?=$chatWith['idUtilisateur']?>
      		   },
      		   function(data, status){
                  $("#chatBox").append(data);
                  if (data != "") scrollDown();
      		    });

      }

      fechData();
      //refresh toutes les secondes
      setInterval(fechData, 1000);
    
    });
</script>
</div>