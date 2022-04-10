<?php
include_once "views/navbar-header.php";

//mongo db
require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->redsocial->usuarios;

$user = $collection->findOne([
'email' => $_SESSION['user']['email'],
]);
$target_dir = "uploads/profileimages/";

$file_name = uniqid();
$target_file = $target_dir . $file_name . ".png";
$uploadOk = 1;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
// Check file size
if ($_FILES["profilePicture"]["size"] > 50000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $target_file)) {
    //remove previous image
    if ($user->img != "default_user.png"){//dont delete default user img
      unlink($target_dir . $user->img);
    }
    //update db
    $updateResult = $collection->updateOne(
      [ 'email' => $user->email ],
      [ '$set' => [ 'img' => $file_name . ".png" ]]
  );
  $_SESSION['user']['img'] = $file_name . ".png";
    header('Location: profile.php');
    //echo "The file ". htmlspecialchars( basename( $_FILES['profilePicture']['name'])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
   
    
  }
}
?>
<body>
        <div class="container">
            <div class="card mb-5 mt-5">
                <div class="card-header">
                <h2 class="card-title mx-3">My Profile</h5>
                </div>
                <div class="card-body mx-4">
                    <div class="d-grid gap-2 d-flex justify-content-sm-left text-center">
                    
                    </div>
                    <div class = "row">
                        <div class = "col-md-6 text-center">
                        <img id = "outline" class="ml-5"
                         src=<?php $target_dir . $user->img?>
                        
                        alt="" width="200" height="200">
                            <form  class="form-group" action="/upload-image.php" method="post" enctype="multipart/form-data">   
                                <label for="profilePicture">Change your profile picture:</label>
                                <input class="form-control form-control-sm my-3" name= "profilePicture" id = "profilePicture" type="file" accept="image/png, image/jpeg">
                                <button class="btn btn-md btn-primary btn-block mb-3" type="submit">Update</button>
                            </form>
                        </div>
                        <div class = "col-md-6">
                          <h3>
                            <small class="text-muted w-100">Full Name:</small>
                            <?php  echo($_POST['firstName']." ".$_POST['lastName'])?>
                          </h3>
                          <h3>
                          <small class="text-muted w-100">Email:</small>
                            <?php echo($_POST['email'])?>
                          </h3>
                          <h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
    