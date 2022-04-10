<?php
    //db
    require 'vendor/autoload.php';
    session_start();
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $collection = $client->redsocial->comments;
    $data = [
    'postid' => $_GET["id"],
    'userid' => (string)$_SESSION['user']['_id']['$oid'],
    'text' => $_POST['post'],
    'datetime' => time(),
    'likes' => 0,
    'likes-users' => [],
    'dislikes' => 0,
    'dislikes-users' => []
    ];
    $insertOneResult = $collection->insertOne($data);

    header('Location: posts.php');
    
?>