<?php 

    require_once 'user.class.php';

    $user = new User();

    $allUsers = $user->getUsers();
    
    $usersData = array();

    foreach ($allUsers as $user){
        $usersData[] = array(
        "email" => $user->getEmail(),
        "first_name" => $user->getFirstName(),
        "last_name" => $user->getLastName(),
        "gender" => $user->getGender(),
        "profile_picture" => $user->getProfilePicture(),
        "plan" => $user->getPlan()
        );
    }
    
    echo json_encode($usersData);

?>