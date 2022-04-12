<?php
    //db
    require 'vendor/autoload.php';
    session_start();
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $collectionUsers = $client->redsocial->usuarios;
    $session_id = (string)$_SESSION['user']['_id']['$oid'];
    $post;
    $comments;
    if (isset($_GET['id'])){//target is a post
        $collection = $client->redsocial->cotizaciones;
        $cotizacion = $collection->findOne([
            '_id' => new MongoDB\BSON\ObjectId($_GET['id'])
            ]);
		if ($cotizacion != null){
			if ($cotizacion['userid'] == $session_id){
				$collection->deleteOne([ '_id' => new MongoDB\BSON\ObjectId($_GET['id']) ] );
			}
		}
        
    }
	
    header('Location: /html/cotizaciones.php');
    
?>