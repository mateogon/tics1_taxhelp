
<?php

include_once "views/header.php";


?>
  
  <body>
    <div class ="col-md-4 offset-md-4 mt-5">
    <div class="card text-center">
      <p class="fs-2 mb-4 mt-4">Upload a profile picture to finish your registration.</p>
      <img id= "outline" class="mt-4 mx-auto" src="public/images/default_user.png" alt="" width="200" height="200">
      <form  class="form-signin" action="/profile.php" method="post" enctype="multipart/form-data">   
          <label for="profilePicture">Choose your profile picture below</label>
          <input class="form-control form-control-sm mt-4" name= "profilePicture" id = "profilePicture" type="file" accept="image/png, image/jpeg">
          <button class="btn btn-lg btn-primary btn-block mt-5 mb-3" type="submit">Finish</button>
        </form>

    </div>
  </div>
  </body>
</html>