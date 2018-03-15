<?php 

    require_once 'comment.class.php';

    $comment = new Comment();

    $result = $comment->getCommentsByPostID($_POST["post_id"]);   
        
    echo json_encode($result);

?>