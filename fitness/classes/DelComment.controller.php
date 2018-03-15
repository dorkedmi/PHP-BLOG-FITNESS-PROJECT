<?php 

    require_once 'comment.class.php';

    $comment = new Comment();

    $result = $comment->delComment($_POST['comment_id']);
    
    echo json_encode($result);

?>