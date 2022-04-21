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
	for ($x = 1; $x <= 12; $x++) {
	  $sueldos[$x] = (int)$_POST["s_" . (string)$x];
	  $honorarios[$x] = (int)$_POST["h_" . (string)$x];
	  $ret_sueldos[$x] = (int)$_POST["rs_" . (string)$x];
	  $ret_honorarios[$x] = (int)$_POST["rh_" . (string)$x];
	}
    $data = [
    'userid' => (string)$_SESSION['user']['_id']['$oid'],
    'nombre' => $name,
    'datetime' => time(),
    'sueldos' => $sueldos,
    'honorarios' => $honorarios,
	'retencion_sueldos' => $ret_sueldos,
    'retencion_honorarios' => $ret_honorarios
    ];
	$data['_id'] = new MongoDB\BSON\ObjectID();
    $insertOneResult = $collection->insertOne($data);
	//var_dump($data);
	header('Location: /html/cotizar.php?id='.$data["_id"]);
	//header('Location: /html/cotizar.php?id='.$insertOneResult["insertedId"]["oid"]);
    
?>