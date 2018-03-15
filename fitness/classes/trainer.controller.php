<?php 

    require_once 'trainer.class.php';

    $trainer = new Trainer();

    $result = $trainer->getTrainers();
    
    echo json_encode($result);

?>