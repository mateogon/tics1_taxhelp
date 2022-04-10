<?php
    //db
    require 'vendor/autoload.php';
    session_start();
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $collectionUsers = $client->redsocial->usuarios;
    $session_id = (string)$_SESSION['user']['_id']['$oid'];
    $post;
    $comments;
    if ($_GET['type'] == "post"){//target is a post
        $collection = $client->redsocial->posts;
        $comment_collection = $client->redsocial->comments;
        $post = $collection->findOne([
            '_id' => new MongoDB\BSON\ObjectId($_GET['id'])
            ]);
        $comments = $comment_collection->find([
            'postid' => $_GET['id']
        ]);
        $collection->deleteOne( ['_id' => new MongoDB\BSON\ObjectId($post['_id']) ] );
        foreach($comments as $c){
            $comment_collection->deleteOne( ['_id' => new MongoDB\BSON\ObjectId($c['_id']) ] );
        }
    }elseif ($_GET['type'] == "comment"){//target is a comment
        $collection = $client->redsocial->comments;
        $post = $collection->findOne([
            '_id' => new MongoDB\BSON\ObjectId($_GET['id'])
            ]);
        $collection->deleteOne([ '_id' => new MongoDB\BSON\ObjectId($post['_id']) ] );
    }

    header('Location: posts.php');
    
?>