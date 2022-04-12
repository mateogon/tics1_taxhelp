<?php
	require 'vendor/autoload.php';
    //db
	session_start();
	$client = new MongoDB\Client("mongodb://localhost:27017");
    $collection = $client->redsocial->cotizaciones;
    
    
	$sueldos = [];
	$honorarios = [];
    $name = $_POST["nombre"];
	unset($_POST["nombre"]);
	$index_s = "";
	$index_h = "";
	for ($x = 1; $x <= 12; $x++) {
	  $index_s = "s_" . (string)$x;
	  $index_h = "h_" . (string)$x;
	  $sueldos[$x] = (int)$_POST[$index_s];
	  $honorarios[$x] = (int)$_POST[$index_h];
	}
    $data = [
    'userid' => (string)$_SESSION['user']['_id']['$oid'],
    'nombre' => $name,
    'datetime' => time(),
    'sueldos' => $sueldos,
    'honorarios' => $honorarios
    ];
	$data['_id'] = new MongoDB\BSON\ObjectID();
    $insertOneResult = $collection->insertOne($data);
	//var_dump($data);
	header('Location: /html/cotizar.php?id='.$data["_id"]);
	//header('Location: /html/cotizar.php?id='.$insertOneResult["insertedId"]["oid"]);
    
?>