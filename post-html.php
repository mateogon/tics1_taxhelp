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
                            if (in_array($userid, (array)$post['likes-users'])){
                                echo '<a class ="btn btn-md btn-link" href="like.php?type=post&id='.$post['_id'].'"><i class="fas fa-thumbs-up">&nbsp;&nbsp;'.$post['likes'].'</i></a>';
                            }else{
                                echo '<a class ="btn btn-md btn-link" href="like.php?type=post&id='.$post['_id'].'"><i class="far fa-thumbs-up">&nbsp;&nbsp;'.$post['likes'].'</i></a>';
                            }

                            if (in_array($userid, (array)$post['dislikes-users'])){
                                echo '<a class ="btn btn-md btn-link" href="dislike.php?type=post&id='.$post['_id'].'"><i class="fas fa-thumbs-down">&nbsp;&nbsp;'.$post['dislikes'].'</i></a>';
                            }else{
                                echo '<a class ="btn btn-md btn-link" href="dislike.php?type=post&id='.$post['_id'].'"><i class="far fa-thumbs-down">&nbsp;&nbsp;'.$post['dislikes'].'</i></a>';
                            }
                            ?>
                        </div>