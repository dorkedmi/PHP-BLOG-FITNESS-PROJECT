<?php
    $abs = $_SERVER['DOCUMENT_ROOT'];
    $abs = "$abs/PHP/fitness";
    require_once "$abs/classes/login.class.php";

    $login = new Login();

    include("register.php");
?>


