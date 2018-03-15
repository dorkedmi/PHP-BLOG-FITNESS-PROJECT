<?php 

    require_once 'user.class.php';

    $user= new User();
    $result = $user->getUserById($_POST["user_id"]);
    echo json_encode($result);

?>