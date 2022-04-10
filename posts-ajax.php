<?php

require 'vendor/autoload.php';
session_start();//important
$client = new MongoDB\Client("mongodb://localhost:27017");
$userid = (string)$_SESSION['user']['_id'];
if (!isset($_SESSION['user'])){
  header('Location: index.php');
};

$collectionPosts = $client->redsocial->posts;
$collectionUsers = $client->redsocial->usuarios;
$collectionComments = $client->redsocial->comments;
date_default_timezone_set('America/Santiago');

$posts = $collectionPosts->find([], ['sort' => ['datetime' => -1]]);

$salida = Array();

foreach($posts as $post){
    $salida[(string)$post["_id"]]['post'] = Array('text' => $post['text'], 'likes' => $post['likes'], 'dislikes' => $post['dislikes']);

    $postUser = $collectionUsers->findOne([
        '_id' => new MongoDB\BSON\ObjectId($post['userid']),
        ]);
    $comments = $collectionComments->find([
        'postid' => (string)$post['_id'],
    ]);
    $salida[(string)$post["_id"]]['comments'] = Array();
    foreach ($comments as $com){ 
        $salida[(string)$post["_id"]]['comments'][(string)$com["_id"]] = Array('text' => $com['text'], 'likes' => $com['likes'], 'dislikes' => $com['dislikes']);
        
    };
};
echo json_encode($salida);
?>