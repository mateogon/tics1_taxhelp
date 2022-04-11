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
                <h2 class="card-title mx-3">Cotizaciones previas</h5>
                </div>
                <div class="card-body mx-4">
                    <div class="list-group">
					  <a href="#" class="list-group-item list-group-item-action active">
						Cras justo odio
					  </a>
					  <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
					  <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
					  <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
					  <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
					</div>
                </div>
            </div>
        </div>
    </body>

    </html>