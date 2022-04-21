<?php
include_once "views/navbar-header.php";
$target_dir = "uploads/profileimages/";
$session_id = (string)$_SESSION['user']['_id']['$oid'];
$client = new MongoDB\Client("mongodb://localhost:27017");
    $collection = $client->redsocial->cotizaciones;
    
    $cotizaciones = $collection->find([
        'userid' => $session_id,
        ]);

	

?>

<body>
        <div class="container">
            <div class="card mb-5 mt-5">
                <div class="card-header">
                <h2 class="card-title mx-3 my-3">Cotizaciones guardadas</h5>
                </div>
                <div class="card-body mx-4">
                    <div class="list-group">
					<?php
					foreach($cotizaciones as $cotizacion){
						$nombre = $cotizacion['nombre'];
						$id = $cotizacion['_id'];
						echo '<div class="row">
						<div class="col">';
    
    
						echo '<a href="/html/cotizar.php?id='.$id.'" class="list-group-item list-group-item-action my-2 mx-2">'. $nombre.'</a>';
						echo'</div>
						<div class="col-md-auto">';
    
						echo '<a class ="float-end btn btn-md btn-link delete-post mt-2" href="delete_cotizacion.php?id='.$id.'"><i class="fas fa-trash-alt"></i></a>';
						echo '</div>
							</div>';
					}
					?>
					</div>
                </div>
            </div>
        </div>
    </body>

    </html>