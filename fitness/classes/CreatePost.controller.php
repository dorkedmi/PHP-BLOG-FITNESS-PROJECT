<?php 

    require_once 'post.class.php';

    $post = new Post();

    $post->create($_POST["trainer_id"],$_POST["title"],$_POST["subject"],$_POST["post_data"]);
    
    $result = $post->save();
    
    echo json_encode($result);

?>