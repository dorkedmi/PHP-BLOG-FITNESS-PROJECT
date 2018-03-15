<?php 

    require_once 'comment.class.php';

    $comment = new Comment();
    var_dump($_POST);
    $comment->create($_POST["comment_data"],$_POST["post_id"],$_POST["user_id"]);
    
    $result = $comment->save();
    
    echo json_encode($result);

?>