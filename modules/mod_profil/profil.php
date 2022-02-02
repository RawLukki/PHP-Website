
      <div class="form group">
        <form action="index.php?module=mod_profil&action=uploadImage" method="post" enctype="multipart/form-data">
          <h2 class="text-center mb-3 mt-3">Changer d'image</h2>
          <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
          <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <div class="text-center img-placeholder "  onClick="triggerClick()">

                <i class="fas fa-download fa-5x"></i>
              </div>
              <img src="ressources/userpics/avatar.png" onClick="triggerClick()" id="profileDisplay">
            </span>
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            <label>Profile Image</label>
          </div>
          <div class="form-group text-center">
            <button type="submit" name="save_profile" class="btn btn-primary btn-block">Sauvegarder</button>
          </div>
        </form>
      </div>
