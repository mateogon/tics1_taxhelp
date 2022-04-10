<?php
    //db
    require 'vendor/autoload.php';
    session_start();
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $collectionUsers = $client->redsocial->usuarios;
    $session_id = (string)$_SESSION['user']['_id']['$oid'];

    if ($_GET['type'] == "post"){//target is a post
        $collection = $client->redsocial->posts;
        $post = $collection->findOne([
            '_id' => new MongoDB\BSON\ObjectId($_GET['id'])
            ]);
    }elseif ($_GET['type'] == "comment"){///target is a comment
        $collection = $client->redsocial->comments;
        $post = $collection->findOne([
            '_id' => new MongoDB\BSON\ObjectId($_GET['id'])
            ]);
    }

    if (in_array($session_id, (array)$post['likes-users'])){//already liked
        $updateResult = $collection->updateOne(
            [ '_id' => new MongoDB\BSON\ObjectId($_GET['id']) ],
            [ '$inc' => ['likes' => -1],
             '$pull' => [ 'likes-users' => $session_id]
            ]
        );
    }else{//hasnt liked
        $updateResult = $collection->updateOne(
            [ '_id' => new MongoDB\BSON\ObjectId($_GET['id']) ],
            [ 
            '$inc' => ['likes' => 1] ,
            '$addToSet' => ["likes-users" => $session_id]
            ]
            );
            if (in_array($session_id, (array)$post['dislikes-users'])){//checks if had disliked previously
                $updateResult = $collection->updateOne(
                    [ '_id' => new MongoDB\BSON\ObjectId($_GET['id']) ],
                    [ '$inc' => ['dislikes' => -1],
                     '$pull' => [ 'dislikes-users' => $session_id]
                    ]
                );
            };
    }

    header('Location: posts.php#'.$_GET['id']);
?>