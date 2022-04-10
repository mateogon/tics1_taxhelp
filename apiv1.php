<?php
session_start();
$ruta = $_SERVER['REQUEST_URI'];

$ruta = explode('apiv1.php/', $ruta)[1];
$ruta = explode('/',$ruta);
require 'vendor/autoload.php';
header('Content-Type: application/json');

$client = new MongoDB\Client("mongodb://localhost:27017");
$method = $_SERVER['REQUEST_METHOD'];
switch($ruta[0]){
    case "user":
        if (isset($ruta[1])){
            switch($ruta[1]){
                case "new": // nuevo usuario
                    if ($method == 'POST'){
                    $info = Array('email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'firstName' => $_POST['firstName'],
                    'lastName' => $_POST['lastName'],
                    'img' => 'default_user.png',);
                    $result = registrar_usuario($info);
                    echo json_encode($result);
                    }else{
                        echo json_encode(Array('status' => false, 'error' => 'Wrong method.'));
                    };
                    break;
                case 'logout':
                    if(!$logged){
                        echo json_encode(Array('status' => False, 'error' => 'need to login first', 'error_code' => 3));
                        break;
                    }
                    if ($method == 'GET'){
                    session_destroy();
                    echo json_encode(Array('status' => true));
                    }else{
                        echo json_encode(Array('status' => false, 'error' => 'Wrong method.'));
                    };
                    break;
                
                case 'login':
                    if ($method == 'POST'){
                        $info = Array('email' => $_POST['email'],'password' => $_POST['password']);
                        $result = user_login($info);
                        echo json_encode($result);
                        break;
                    } else{
                        echo json_encode(Array('status' => false, 'error' => 'Wrong method.'));
                            
                    }
                    break;
                default: // info usuario via id
                    if ($method == 'GET'){
                    $collection = $client->redsocial->usuarios;
                    $user = $collection->findOne([
                        '_id' => new MongoDB\BSON\ObjectId($ruta[1])
                    ]);
                    if (isset($user->email)){
                        echo json_encode(Array('status'=> True,'userdata'=> $user));
                    } else{
                        echo json_encode(Array('status' => False));
                    }
                    }else{
                        echo json_encode(Array('status' => false, 'error' => 'Wrong method.'));
                    }
                break;
            }
                
        }else{//usuario sesion actual
            if ($method == 'GET'){
            echo (json_encode($_SESSION['user']));
            }else{
                echo json_encode(Array('status' => false, 'error' => 'Wrong method.'));
            }
            break;
        }
        break;
                
            

    case "posts":
        $logged = isset($_SESSION['user']);

        if (isset($ruta[1])){
            switch($ruta[1]){
                case "new": // nuevo post
                    if ($method != 'POST'){
                        echo json_encode(Array('status' => false, 'error' => 'Wrong method.'));
                        break;
                    }
                    if(!$logged){
                        echo json_encode(Array('status' => False, 'error' => 'need to login first', 'error_code' => 3));
                        break;
                    }

                    $result = new_post($_POST["post"]);

                    echo json_encode(Array('status' => True, 'insert_result' => $result));
                    break;

                case "like":
                    if ($method != 'GET'){
                        echo json_encode(Array('status' => false, 'error' => 'Wrong method.'));
                        break;
                    }
                    if(!$logged){
                        echo json_encode(Array('status' => False, 'error' => 'need to login first', 'error_code' => 3));
                        break;
                    }

                    $result = like($ruta[2],"post"); // funcion like

                    echo json_encode(Array('status' => $result));
                    break;

                case "dislike":
                    if ($method != 'GET'){
                        echo json_encode(Array('status' => false, 'error' => 'Wrong method.'));
                        break;
                    }
                    if(!$logged){
                        echo json_encode(Array('status' => False, 'error' => 'need to login first', 'error_code' => 3));
                        break;
                    }

                    $result = dislike($ruta[2],"post"); // funcion dislike

                    echo json_encode(Array('status' => $result));
                    break;
                case "comments":
                    if (isset($ruta[2])){
                        switch($ruta[2]){
                            case "add": //add comment
                                if ($method != 'POST'){
                                    echo json_encode(Array('status' => false, 'error' => 'Wrong method.'));
                                    break;
                                }
                                if(!$logged){
                                    echo json_encode(Array('status' => False, 'error' => 'need to login first', 'error_code' => 3));
                                    break;
                                }
                            
                                $info = Array('postid' => $ruta[3],'message' => $_POST['message']);
                                $result = new_comment($info);
                                echo json_encode(Array('status' => True, 'insert_result' => $result));
                                break;

                            default: // getc comment
                                if ($method != 'GET'){
                                    echo json_encode(Array('status' => false, 'error' => 'Wrong method.'));
                                    break;
                                }
                                $result = getComment($ruta[2]);
                                echo json_encode($result);
                            break;
                        }
                    };
                    break;
                default:
                    if ($method != 'GET'){
                        echo json_encode(Array('status' => false, 'error' => 'Wrong method.'));
                        break;
                    };
                    $result = getPost($ruta[1]);
                    echo json_encode($result);
                    break;

            }

        }
        else{//listado completo de posts
            if ($method != 'GET'){
                echo json_encode(Array('status' => false, 'error' => 'Wrong method.'));
                break;
            };
            $result = getAllPosts();
            echo json_encode($result);
        }
        break;
    default:
        echo json_encode(Array('API version' => "1"));
        break;
}


function new_post($message)
{
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $collection = $client->redsocial->posts;
                    $data = [
                    'userid' => (string)$_SESSION['user']['_id']['$oid'],
                    'text' => $_POST["post"],
                    'datetime' => time(),
                    'likes' => 0,
                    'likes-users' => [],
                    'dislikes' => 0,
                    'dislikes-users' => []
                    ];
        $insertOneResult = $collection->insertOne($data);
    return $insertOneResult;
}



function registrar_usuario($info){
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $collection = $client->redsocial->usuarios;
    
    $user = $collection->findOne([
    'email' => $_POST['email'],
    ]);
    
    if ($user != null){
        return Array('status'=>false, 'error'=>"usuario ya existe");
    }else{
        $insertOneResult = $collection->insertOne([
            'email' => $info['email'],
            'password' => $info['password'],
            'firstName' => $info['firstName'],
            'lastName' => $info['lastName'],
            'img' => 'default_user.png',
        ]);
        
        //cookies
        session_start();
        $user = $collection->findOne([
            'email' => $_POST['email']
        ]);
        $json = MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($user));
        $_SESSION['user'] = json_decode($json, true);
        return Array('status'=>true, 'session_user' => $_SESSION['user']);
};
}
function user_login($info){
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $collection = $client->redsocial->usuarios;
    $user = $collection->findOne([
        'email' => $_POST['email']
    ]);
    $esta = false;

    if (isset($user->email)){
        if ($user->password == $_POST["password"]){
            $esta = true;
            session_start();
            $json = MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($user));
            $_SESSION['user'] = json_decode($json, true);
        }
        else{
            return Array('status' => $esta, 'error' => 'wrong password','error_code' => 1); // wrong password
        }
        
    };

    if ($esta){
        return Array(
            'status' => $esta,
            'userdata' => $_SESSION['user']
        );
    }else{
        return Array('status' => $esta, 'error' => 'user does not exist', 'error_code' => 2); //user does not exist
    }

}

?>