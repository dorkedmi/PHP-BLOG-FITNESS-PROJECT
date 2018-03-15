<?php

include_once "db.php";

class Schedule{
    private $_db;
    private $_class_name;
    private $_day;
    private $_hour;
    private $_trainer_name;

    public function __construct(){
        $this->_db = DB::getInstance();
    }

    public function getClassName(){
        return $this->_class_name;
    }

    public function setClassName($p){
        $this->_class_name = $p;
    }

    public function getDay(){
        return $this->_day;
    }

    public function setDay($p){
        $this->_day = $p;
    }

    public function getHour(){
        return $this->_hour;
    }
    
    public function setHour($p){
        $this->_hour = $p;
    }

    public function getTrainerName(){
        return $this->_trainer_name;
    }

    public function setTrainerName($p){
        $this->_trainer_name = $p;
    }

    public function create($_class_name,$_day,$_hour,$_trainer_name){
        $this->_class_name = $_class_name;
        $this->_day = $_day;
        $this->_hour = $_hour;
        $this->_trainer_name = $_trainer_name;
    }

    public function getScheduleByDay($day){
         $params = array(
            ':day' => $day
        );
        $sql = 'select classes.class_name,classes.day,classes.hour,trainers.first_name,trainers.last_name from (classes inner join trainers on classes.trainer_id = trainers.id) where classes.day = :day order by classes.hour';
        $this->_db->query($sql,$params);
        $scheduleArr = array();
        foreach($this->_db->_result as $classRow){
            $tempSchedule = new Schedule();
            $tempSchedule->create($classRow['class_name'],$classRow['day'],$classRow['hour'],$classRow['first_name']." ".$classRow['last_name']);
            $scheduleArr[] = array('day' => $tempSchedule->getDay(),
                                   'class_name' => $tempSchedule->getClassName(),
                                   'hour' => $tempSchedule->getHour(),
                                   'trainer_name' => $tempSchedule->getTrainerName()
                                  );
        }
        return $scheduleArr;
    }
    
}




?>