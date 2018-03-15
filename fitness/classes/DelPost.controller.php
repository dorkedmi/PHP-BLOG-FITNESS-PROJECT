<?php 

    require_once 'post.class.php';

    $post = new Post();

    $result = $post->del($_POST['post_id']);
    
    echo json_encode($result);

?>