<?php

include_once "db.php";

class Post{
    private $_db;
    private $_post_id;
    private $_trainer_id;
    private $_title;
    private $_subject;
    private $_post_data;
    private $_time;

    public function __construct(){
        $this->_db = DB::getInstance();
    }

    public function getTrainerId(){
        return $this->_trainer_id;
    }

    public function setTrainerId($p){
        $this->_trainer_id = $p;
    }


    public function create($_trainer_id,$_title,$_subject,$_post_data){
        $this->_trainer_id = $_trainer_id;
        $this->_title = $_title;
        $this->_subject = $_subject;
        $this->_post_data = $_post_data;
    }

     public function save(){
        $params = array(
            ':trainer_id' => $this->_trainer_id,
            ':title' => $this->_title,
            ':subject' => $this->_subject,
            ':post_data' => $this->_post_data
        );
            $sql = 'insert into trainers_posts (trainer_id,title,subject,post_data) VALUES (:trainer_id,:title,:subject,:post_data)';
        $this->_db->query($sql,$params);
        return 1;
    }
    
    public function del($id){
         $params = array(
            ':id' => $id
        );
        $sql = 'delete from trainers_posts where post_id = :id';
        $this->_db->query($sql,$params);
        return 1;
     }
    
     public function getPost($id){
         $params = array(
            ':id' => $id
        );
        $sql = 'select trainers_posts.*,trainers.first_name,trainers.last_name from (trainers_posts inner join trainers on trainers_posts.trainer_id = trainers.id) where post_id = :id';
        $this->_db->query($sql,$params);
         $postArr = array();
        foreach($this->_db->_result as $postRow){
            $postArr[] = array('post_id' => $postRow['post_id'],
                               'trainer_id' => $postRow['trainer_id'],
                               'title' => $postRow['title'],
                               'subject' => $postRow['subject'],
                               'post_data' => $postRow['post_data'],
                               'time' => $postRow['time'],
                               'trainer_first_name' =>$postRow['first_name'],
                               'trainer_last_name' =>$postRow['last_name']
                                );
        }
        return $postArr;
     }
    
     public function getAllPosts(){
         //$sql = 'select * from trainers_posts';
         $sql = 'select trainers_posts.*,trainers.first_name,trainers.last_name from (trainers_posts inner join trainers on trainers_posts.trainer_id = trainers.id)';
        $this->_db->query($sql,array());
        $postArr = array();
        foreach($this->_db->_result as $postRow){
            $postArr[] = array('post_id' => $postRow['post_id'],
                               'trainer_id' => $postRow['trainer_id'],
                               'title' => $postRow['title'],
                               'subject' => $postRow['subject'],
                               'post_data' => $postRow['post_data'],
                               'time' => $postRow['time'],
                               'trainer_first_name' =>$postRow['first_name'],
                               'trainer_last_name' =>$postRow['last_name']
                                );
        }
        return $postArr;
     }
     
    
     public function update($id){
         $params = array(
            ':post_id' => $id,
            ':title' => $this->_title,
            ':subject' => $this->_subject,
            ':post_data' => $this->_post_data
        );
            $sql = 'update trainers_posts set title=:title,subject=:subject,post_data=:post_data where post_id=:post_id';
            $this->_db->query($sql,$params);
     }
    
    
}




?>