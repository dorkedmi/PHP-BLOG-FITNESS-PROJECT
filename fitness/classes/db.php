<?php

include_once "globals.php";

class DB  {

    // Fields
    private static $_instance = null;
    private $_pdo;
    private $_query;
    public $_result;
    public $_count;


    //Methods
    private function __construct(){
        try{
            $this->_pdo = new PDO('mysql:host='.$GLOBALS['mysql']['host'].';dbname='.$GLOBALS['mysql']['db'].';', $GLOBALS['mysql']['username'], $GLOBALS['mysql']['password']);
        } catch (PDOExeption $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {

        if(!isset(self::$_instance)){
            self::$_instance = new DB();
        }
        return self::$_instance;

    }

    public function query($sql,$params){
        if($this->_query = $this->_pdo->prepare($sql)){
            if($this->_query->execute($params)){
                $this->_result = $this->_query->fetchAll(PDO::FETCH_ASSOC);
                $this->_count = $this->_query->rowCount();
            } else {
                die('unable to execute');
            }

        }
        return $this;  
    }
    
    
    public function singleQuery($sql){
         if($this->_query = $this->_pdo->prepare($sql)){
        if($this->_query->execute()){
                $this->_result = $this->_query->fetchAll(PDO::FETCH_ASSOC);
                $this->_count = $this->_query->rowCount();
            } else {
                die('unable to execute');
            }
             
         }
        return $this; 
    }
 
}

?>