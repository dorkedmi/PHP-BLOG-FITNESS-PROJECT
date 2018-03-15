<?php 

    require_once 'user.class.php';

    $user= new User();
    var_dump($_POST);
    $result = $user->editUser($_POST["id"],$_POST["email"],$_POST["first_name"],$_POST["last_name"],$_POST["gender"]);   
    echo json_encode($result);

?>