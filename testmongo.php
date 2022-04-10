<?php
$dbhost = 'localhost';
$dbport = '27017';

$connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");

//print_r ($connection);
$filter = ['_id' => '625321e849b601e27a153c0c'];
$options = [];
$query = new \MongoDB\Driver\Query($filter, $options);
$rows   = $connection->executeQuery('taxhelp.usuarios', $query);
print_r($query);
foreach ($query as $document) {
  echo($document);
}

?>