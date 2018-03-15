<?php 

    require_once 'trainer.class.php';

    $trainer = new Trainer();
        var_dump($_FILES);  
        var_dump($_POST);
        $image= addslashes($_FILES['profile_picture']['tmp_name']);
        $image= file_get_contents($image);
        $_POST['profile_picture'] = $image;


    $result = $trainer->updateTrainer($_POST["id"],$_POST["email"],$_POST["password"],$_POST["first_name"],$_POST["last_name"],$_POST["gender"],$_POST["profile_picture"],$_POST["experties"],$_POST["plan_leader"],$_POST["lesson_price"],$_POST["quotes"]);
    
    echo json_encode($result);

?>