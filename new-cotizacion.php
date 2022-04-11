<?php
    //db
    require 'vendor/autoload.php';
    session_start();
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $collection = $client->redsocial->cotizaciones;
    $data = [
    'userid' => (string)$_SESSION['user']['_id']['$oid'],
    'nombre' => $_POST['nombre'],
    'datetime' => time(),
    'sueldos' => [],
    'honorarios' => []
    ];
    $insertOneResult = $collection->insertOne($data);

    header('Location: /html/posts.php');
    
?>