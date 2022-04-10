<?php
//db
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->redsocial->usuarios;

$user = $collection->findOne([
    'email' => $_POST['email'],
    ]);
if (isset($user->email)){ //$user != null
    if ($user->password == $_POST["password"]){//correct password
        session_start();
        $json = MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($user));
        $_SESSION['user'] = json_decode($json, true);
        //print_r(json_decode($json, true)['_id']['$oid']);
        header('Location: posts.php');
        exit();
    } else{//wrong password
        header('Location: login.php?error=2');
    }
}else{//account doesnt exists
    header('Location: login.php?error=1');
}

?>