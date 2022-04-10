<?php

include_once "views/navbar-header.php";

require 'vendor/autoload.php';

$collectionPosts = $client->redsocial->posts;
$collectionUsers = $client->redsocial->usuarios;
$collectionComments = $client->redsocial->comments;
date_default_timezone_set('America/Santiago');

$posts = $collectionPosts->find([], ['sort' => ['datetime' => -1]]);
?>
    <body>
    <!--<button onclick= "actualizar()" class="btn btn-outline-primary" type="submit">Actualizar</button> -->
    <div class ="row">
        <div class = "container col-sm-7">
            <div class = "card my-4">
                <div class = "card-body mx-2">
                    <form action="/html/new-post.php" method="POST">
                        <textarea class="form-control form-control-lg" name="post" type="text" placeholder="Post something..." rows="2"></textarea>
                        <div class="d-grid mx-auto mt-1">
                            <button class="btn btn-outline-primary" type="submit">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<div id ="posts">
<?php

foreach($posts as $post){
    
    $postUser = $collectionUsers->findOne([
        '_id' => new MongoDB\BSON\ObjectId($post['userid']),
        ]);
    $comments = $collectionComments->find([
        'postid' => (string)$post['_id'],
    ]);
?>
    <div class ="row">
        <div class="container col-sm-7">
            <div id= "<?php echo $post['_id'];?>" class="card mb-4">                
                <div class="card-header d-flex">
                    <img class="mx-2" src="uploads/profileimages/<?php echo($postUser['img']);?>" alt="" width="60" height="60">
                    <div class="ml-5">
                        <h6 class="fs-5 font-weight-bold mt-1"><?php echo(ucfirst($postUser['firstName']). " " .ucfirst($postUser['lastName']));?></h6>
                        <h6 class="text-muted fs-6 font-weight-light"><?php echo(date('F j, Y \ \a\t\  g:i A',$post['datetime']));?></h6>
                    </div>  
                </div>
                <div class="card-body">
                    <p class = "card-text fs-4 mx-4 mb-3"><?php echo $post['text'];?></p>

                    <div class = "row mx-auto">
                        <div class = "mb-2">
                            <?php
                            if (in_array($sessionid, (array)$post['likes-users'])){
                                echo '<a class ="btn btn-md btn-link" href="like.php?type=post&id='.$post['_id'].'"><i class="fas fa-thumbs-up">&nbsp;&nbsp;'.$post['likes'].'</i></a>';
                            }else{
                                echo '<a class ="btn btn-md btn-link" href="like.php?type=post&id='.$post['_id'].'"><i class="far fa-thumbs-up">&nbsp;&nbsp;'.$post['likes'].'</i></a>';
                            }

                            if (in_array($sessionid, (array)$post['dislikes-users'])){
                                echo '<a class ="btn btn-md btn-link" href="dislike.php?type=post&id='.$post['_id'].'"><i class="fas fa-thumbs-down">&nbsp;&nbsp;'.$post['dislikes'].'</i></a>';
                            }else{
                                echo '<a class ="btn btn-md btn-link" href="dislike.php?type=post&id='.$post['_id'].'"><i class="far fa-thumbs-down">&nbsp;&nbsp;'.$post['dislikes'].'</i></a>';
                            }
                            if ($post['userid'] == $sessionid){
            
                                echo '<a class ="float-end btn btn-md btn-link delete-post" href="delete.php?type=post&id='.$post['_id'].'"><i class="fas fa-trash-alt"></i></a>';
        
                            }
                            ?>
                        </div>
                        <div id = "comments">
                        <?php
                        if (!$comments->isDead()){
                            echo '<div class="card"">';
                            foreach($comments as $comment){
                                $commentUser = $collectionUsers->findOne([
                                    '_id' => new MongoDB\BSON\ObjectId($comment['userid']),
                                    ]);
                                echo '<li id= "'.$comment['_id'].'" class="list-group-item">
                                    <div class ="d-flex gap-3">
                                    <div class = "">
                                    <img class="mx-1 mb-1" src="uploads/profileimages/'.$commentUser['img'].'" width="48" height="48">
                                    </div>
                                    <div class = "">
                                    <h6 class="fs-6 font-weight-bold mt-2">'.ucfirst($commentUser['firstName']. " " .ucfirst($commentUser['lastName'])).'</h6>
                                    </div>
                                    <div class = "">
                                    <h6 class="text-muted fs-6 font-weight-light mt-2">'.date('F j, Y \ \a\t\  g:i A',$comment['datetime']).'</h6>
                                    </div>
                                    </div> 
                                    <div class = "mx-4 mb-2">
                                    <p class = "card-text fs-6 mx-5 mb-1">'.$comment['text'].'</p>
                                    </div>
                                    <div class = "row mx-5">
                                    <div>
                                     ';
                                     if (in_array($sessionid, (array)$comment['likes-users'])){
                                        echo '<a class ="btn btn-md btn-link" href="like.php?type=comment&id='.$comment['_id'].'"><i class="fas fa-thumbs-up">&nbsp;&nbsp;'.$comment['likes'].'</i></a>';
                                    }else{
                                        echo '<a class ="btn btn-md btn-link" href="like.php?type=comment&id='.$comment['_id'].'"><i class="far fa-thumbs-up">&nbsp;&nbsp;'.$comment['likes'].'</i></a>';
                                    }
        
                                    if (in_array($sessionid, (array)$comment['dislikes-users'])){
                                        echo '<a class ="btn btn-md btn-link" href="dislike.php?type=comment&id='.$comment['_id'].'"><i class="fas fa-thumbs-down">&nbsp;&nbsp;'.$comment['dislikes'].'</i></a>';
                                    }else{
                                        echo '<a class ="btn btn-md btn-link" href="dislike.php?type=comment&id='.$comment['_id'].'"><i class="far fa-thumbs-down">&nbsp;&nbsp;'.$comment['dislikes'].'</i></a>';
                                    };
                                    if ($comment['userid'] == $sessionid){
            
                                        echo '<a class ="float-end btn btn-md btn-link delete-post" href="delete.php?type=comment&id='.$comment['_id'].'"><i class="fas fa-trash-alt"></i></a>';
                
                                    }
                                echo'</div> </div> </li>';
                            };
                            echo '</div>';
                        };
                            ?>
                        </div>
                    </div>
                    
                    <form action="/html/new-comment.php?id=<?php echo $post['_id'];?>" method="POST">
                    

                        <div class="d-flex mt-2 mx-2">
                            <div class="flex-fill mx-1">
                            <textarea class="form-control form-control-sm fs-6" name="post" type="text" placeholder="Comment something..."></textarea>
                            </div>
                            <div class="my-auto">
                            <button class="btn btn-outline-primary" type="submit">Post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php }; 
    ?>
    </div>
    </body>

    

    
</html>

<script>

$(".delete-post").click(function(event){
    console.log("delete post");
});

function actualizar(){
    $.ajax({
        url: "/posts-ajax.php",
        dataType: "json",
        context: document.body
    }).done(function( data ){
        //$("#posts").html("");
        for ( var post in data){
            console.log(data[post]);
        /*
            if (data[post].post.text != ""){
                $("#posts").append('<div class ="row">'+
                    'div class="container col-sm-7">'+
                '<div id= '+post+'class="card mb-4">'+        
                '<div class="card-header d-flex">'+
                    '<img class="mx-2" src="uploads/profileimages/'+$postUser['img']+' alt="" width="60" height="60">'+
                    '<div class="ml-5">'+
                       '<h6 class="fs-5 font-weight-bold mt-1">'+ucfirst($postUser['firstName'])+" "+ucfirst($postUser['lastName'])+'</h6>'+
                        '<h6 class="text-muted fs-6 font-weight-light">'+date('F j, Y \ \a\t\  g:i A',$post['datetime'])+'</h6>'+
                    '</div>'+
                '</div>'+
                '<div class="card-body">'+
                    '<p class = "card-text fs-4 mx-4 mb-3">'+ $post['text']+'</p>'+
                    '<div class = "row mx-auto">'+
                        '<div class = "mb-2">');
                                if (Array.from($post['likes-users']).includes($userid)){
                                $("#posts").append( '<a class ="btn btn-md btn-link" href="like.php?type=post&id='+$post['_id']+'"><i class="fas fa-thumbs-up">&nbsp;&nbsp;'+$post['likes']+'</i></a>');
                            }else{
                                $("#posts").append( '<a class ="btn btn-md btn-link" href="like.php?type=post&id='+$post['_id']+'"><i class="far fa-thumbs-up">&nbsp;&nbsp;'+$post['likes']+'</i></a>');
                            }
                                if (Array.from($post['dislikes-users'].includes($userid))){
                                    $("#posts").append( '<a class ="btn btn-md btn-link" href="dislike.php?type=post&id='+$post['_id']+'"><i class="fas fa-thumbs-down">&nbsp;&nbsp;'+$post['dislikes']+'</i></a>');
                                }else{
                                    $("#posts").append( '<a class ="btn btn-md btn-link" href="dislike.php?type=post&id='+$post['_id']+'"><i class="far fa-thumbs-down">&nbsp;&nbsp;'+$post['dislikes']+'</i></a>');
                       }
                       $("#posts").append('</div>'+
                                    '</div>'+
                                '</div>');
            }*/
            

        }
        
        
    });

    };

</script>
