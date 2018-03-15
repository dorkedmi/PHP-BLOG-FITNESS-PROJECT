<?php

include_once "db.php";

class Comment{
    private $_db;
    private $_comment_id;
    private $_comment_data;
    private $_post_id;
    private $_user_id;
    private $_time;

    public function __construct(){
        $this->_db = DB::getInstance();
    }

    public function create($_comment_data,$_post_id,$_user_id){
        $this->_comment_data = $_comment_data;
        $this->_post_id = $_post_id;
        $this->_user_id = $_user_id;
    }

     public function save(){
        $params = array(
            ':comment_data' => $this->_comment_data,
            ':post_id' => $this->_post_id,
            ':user_id' => $this->_user_id
        );
            $sql = 'insert into comments (comment_data,post_id,user_id) VALUES (:comment_data,:post_id,:user_id)';
        $this->_db->query($sql,$params);
        return 1;
    }
    
    public function delComment($id){
         $params = array(
            ':id' => $id
        );
        $sql = 'delete from comments where comment_id = :id';
        $this->_db->query($sql,$params);
        return 1;
     }
    
    
     public function getCommentsByPostID($id){
         $params = array(
            ':id' => $id
        );
         $sql = 'select comments.*,users.first_name,users.last_name,users.profile_picture from (comments inner join users on comments.user_id = users.id) where post_id = :id order by comments.time';
        $this->_db->query($sql,$params);
        $commentArr = array();
        foreach($this->_db->_result as $commentRow){
            $commentArr[] = array('comment_id' => $commentRow['comment_id'],
                                  'comment_data' => $commentRow['comment_data'],
                                  'post_id' => $commentRow['post_id'],
                                  'user_id' => $commentRow['user_id'],
                                  'time' => $commentRow['time'],
                                  'user_first_name' =>$commentRow['first_name'],
                                  'user_last_name' =>$commentRow['last_name'],
                                  'user_profile_picture' =>base64_encode($commentRow['profile_picture'])
                                );
        }
        return $commentArr;
     }
     
    
     public function update($id){
         $params = array(
            ':comment_id' => $id,
            ':comment_data' => $this->_subject
        );
            $sql = 'update comments set comment_data=:comment_data where comment_id=:comment_id';
            $this->_db->query($sql,$params);
     }
    
    
}




?>