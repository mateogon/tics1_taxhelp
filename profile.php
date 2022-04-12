<?php
include_once "views/navbar-header.php";
$target_dir = "uploads/profileimages/";

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->redsocial->usuarios;
$user = $collection->findOne([
'email' => $_SESSION['user']['email'],
]);
if (isset($user->img)){
    $img = $target_dir . $user->img;
    
}else{//problem with session
    
    /*
    session_start();
    session_destroy();
    header('Location: index.php');
    print_r("error fetching profile. Please log in again.");
    */
};


?>

<body>
        <div class="container">
            <div class="card mb-5 mt-5">
                <div class="card-header">
                <h2 class="card-title mx-3">Mi Perfil</h5>
                </div>
                <div class="card-body mx-4">
                    <div class="d-grid gap-2 d-flex justify-content-sm-left text-center">
                    
                    </div>
                    <div class = "row">
                        <div class = "col-md-6 text-center">
                        <img id = "outline" class="ml-5"
                        src=<?php echo $img?>
                         
                        alt="" width="200" height="200">
                            <form  class="form-group" action="/upload-image.php" method="post" enctype="multipart/form-data">   
                                <label for="profilePicture">Cambia tu foto de perfil:</label>
                                <input class="form-control form-control-sm my-3" name= "profilePicture" id = "profilePicture" type="file" accept="image/png, image/jpeg">
                                <button class="btn btn-md btn-primary btn-block mb-3" type="submit">Update</button>
                            </form>
                        </div>
                        <div class = "col-md-6">
                          <h3>
                            <small class="text-muted w-100">Nombre completo: </small>
                            <?php echo($user->firstName . " " . $user->lastName);?>
                          </h3>
                          <h3>
                          <small class="text-muted w-100">Email: </small>
                          <?php echo($user->email);?>
                          </h3>
                          <h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>