<?php 

    require_once 'post.class.php';

    $post = new Post();
    if(!(isset($_POST["post_id"]))){
        $result = $post->getAllPosts();
    }    
    else{
        $result = $post->getPost($_POST["post_id"]);   
    }
        
    echo json_encode($result);

?>