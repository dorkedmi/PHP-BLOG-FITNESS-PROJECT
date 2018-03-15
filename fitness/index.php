
<?php

require_once "classes/login.class.php";

$login = new Login();
if($login->isUserLoggedIn()){
    include('views/index.php');
}
else{
    include('login.php');
}

if (strpos($_SERVER['REQUEST_URI'], "logout") !== false){
    //session_destroy();
    echo "you have been logout";
}


?>