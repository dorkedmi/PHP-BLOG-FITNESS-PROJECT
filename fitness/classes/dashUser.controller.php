<?php 

    require_once 'user.class.php';

    $user = new User();

    $result = $user->getUsers();
    
    echo json_encode($result);



?>