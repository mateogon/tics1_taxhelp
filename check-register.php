<?php
    //db
    require 'vendor/autoload.php';

    $client = new MongoDB\Client("mongodb://localhost:27017");
    $collection = $client->redsocial->usuarios;
    
    $user = $collection->findOne([
    'email' => $_POST['email'],
    ]);
    
    if ($user != null){
        header('Location: register.php?error=1');
    }else{
        $insertOneResult = $collection->insertOne([
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'img' => 'default_user.png',
        ]);
        
        //cookies
        session_start();
        $_SESSION['user'] = $user;
        
        header('Location: profile.php');
    }
?>