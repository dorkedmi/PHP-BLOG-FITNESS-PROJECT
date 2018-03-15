<?php

include_once "db.php";

class PricingPlan{
    private $_db;
    private $_user_id;
    private $_plan;
    private $_credit_card;

    public function __construct(){
        $this->_db = DB::getInstance();
    }

    public function getUserId(){
        return $this->_user_id;
    }

    public function setUserId($p){
        $this->_user_id = $p;
    }

    public function getPlan(){
        return $this->_plan;
    }

    public function setPlan($p){
        $this->_plan = $p;
    }

    public function getCreditCard(){
        return $this->_credit_card;
    }

    public function setCreditCard($p){
        $this->_credit_card = $p;
    }

    public function create($_user_id,$_plan,$_credit_card){
        $this->_user_id = $_user_id;
        $this->_plan = $_plan;
        $this->_credit_card = $_credit_card;
    }

    public function checkIfPaiedById($id){
         $params = array(
            ':id' => $id
        );
        $sql = 'select * from paid_plans where user_id = :id'; // chack if it was paied already
        if($this->_db->query($sql,$params)){
            return 1;
        }
        else return 0;
    }
    
     public function save(){
        $params = array(
            ':user_id' => $this->_user_id,
            ':plan' => $this->_plan,
            ':credit_card' => md5($this->_credit_card)
        );

        $sql = 'insert into paid_plans (user_id,plan,credit_card) VALUES (:user_id,:plan,:credit_card)';
        $this->_db->query($sql,$params);
        return 1;
    }
    
    
}




?>