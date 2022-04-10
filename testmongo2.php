<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$taxhelp = $client->taxhelp;
foreach ($taxhelp->listCollections() as $collection) {
   var_dump($collection);
};
$collection = $client->taxhelp->users;
$cursor = $collection->find();

foreach ($cursor as $usuario) {
	print_r($usuario['_id']);
};

?>
