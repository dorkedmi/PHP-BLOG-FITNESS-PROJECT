<?php

require_once "PricingPlan.class.php";

$pay = new PricingPlan();
//echo $_POST["uid"];
//echo $_POST["plan"];
//echo $_POST["cardNumber"];
//echo $_POST["MM"];
//echo $_POST["YY"];
//echo $_POST["CV"];

if($pay->checkIfPaiedById($_POST["uid"])){
    $pay->create($_POST["uid"],$_POST["plan"],$_POST["cardNumber"]);
    if($pay->save()){
        echo "Thank You For Your Payment!";
    }     
} 

?>