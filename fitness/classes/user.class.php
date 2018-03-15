<?php

include_once "db.php";

class User{
    private $_db;
    private $_id;
    private $_email;
    private $_password;
    private $_first_name;
    private $_last_name;
    private $_gender;
    private $_profile_picture;
    private $_plan;

    public function __construct(){
        $this->_db = DB::getInstance();

    }

    public function getId(){
        return $this->_id;
    }

    public function setEmail($p){
        $this->_email = $p;
    }

    public function getEmail(){
        return $this->_email;
    }
    
    public function getPassword(){
        return $this->_password;
    }

    public function setPassword($p){
        $this->_password = md5($p);
    }

    public function setFirstName($p){
        $this->_first_name = $p;
    }

    public function getFirstName(){
        return $this->_first_name;
    }

    public function setLastName($p){
        $this->_last_name = $p;
    }

    public function getLastName(){
        return $this->_last_name;
    }

    public function setGender($p){
        $this->_gender = $p;
    }

    public function getGender(){
        return $this->_gender;
    }

    public function setProfilePicture($p){
        $this->_profile_picture = $p;
    }

    public function getProfilePicture(){
        return $this->_profile_picture;
    }
    
    public function getPlan(){
        return $this->_plan;
    }
    
    public function setPlan($p){
        $this->_plan = $p;
    }

    public function create($_email,$_password,$_first_name,$_last_name,$_gender,$_profile_picture,$_plan){
        $this->_id = NULL;
        $this->_email = $_email;
        $this->_password = md5($_password);
        $this->_first_name = $_first_name;
        $this->_last_name = $_last_name;
        $this->_gender = $_gender;
        $this->_profile_picture = $_profile_picture;
        $this->_plan = $_plan;
    }

    public function save(){
        $params = array(
            ':email' => $this->_email,
            ':password_hash' => $this->_password,
            ':first_name' => $this->_first_name,
            ':last_name' => $this->_last_name,
            ':gender' => $this->_gender,
            ':profile_picture' => $this->_profile_picture,
            ':plan' => $this->_plan
        );

        if(empty($this->_id)){
            $sql = 'insert into users (email,password_hash,first_name,last_name,gender,profile_picture,plan_id) VALUES(:email,:password_hash,:first_name,:last_name,:gender,:profile_picture,:plan)';
        } else {
            $params[':user_id'] = $this->_id;
            $sql = 'update users set  email=:email,password_hash=:password_hash,first_name=:first_name,last_name=:last_name,gender=:gender,profile_picture=:profile_picture,plan_id=:plan where user_id=:user_id';

        }
        $this->_db->query($sql,$params);

    }

    public function getUserById($id){
        $user = array();
        $params = array(
            ':id' => $id
        );
        $sql = 'select * from users where id = :id';
        $this->_db->query($sql,$params);
        foreach($this->_db->_result as $Row){
            $user[] = array(   'user_id' => $Row['id'],
                               'email' => $Row['email'],
                               'password_hash' => $Row['password_hash'],
                               'first_name' => $Row['first_name'],
                               'last_name' => $Row['last_name'],
                               'gender' => $Row['gender'],
                               'profile_picture' =>base64_encode($Row['profile_picture']),
                               'plan_id' =>$Row['plan_id']
                                );
        }
        return $user;
    }
    
    public function getUserIdByEmail($email){
        $params = array(
            ':email' => $email
        );
        $sql = 'select id from users where email = :email';
        $this->_db->query($sql,$params);
        foreach($this->_db->_result as $userRow){
            $id=$userRow["id"];                         
        }
        return $id;
    }
    
    public function getUserNameByEmail($email){
        $params = array(
            ':email' => $email
        );
        $sql = 'select first_name,last_name from users where email = :email';
        $this->_db->query($sql,$params);
        foreach($this->_db->_result as $userRow){
            $name=$userRow["first_name"].' '.$userRow["last_name"];
        }
        return $name;
    }

    public function getUsers(){
        $users = array();
        $sql = 'select * from users';
        $this->_db->query($sql,array());
        foreach($this->_db->_result as $userRow){
            $tempUser = new User();
            $tempUser->create($userRow['email'],$userRow['password_hash'],$userRow['first_name'],$userRow['last_name'],$userRow['gender'],$userRow['profile_picture'],$userRow['plan_id']);
            $tempUser->_id = $userRow['id'];
            foreach($this->_db->_result as $Row){
            $user[] = array(   'user_id' => $Row['id'],
                               'email' => $Row['email'],
                               'password_hash' => $Row['password_hash'],
                               'first_name' => $Row['first_name'],
                               'last_name' => $Row['last_name'],
                               'gender' => $Row['gender'],
                               'profile_picture' =>base64_encode($Row['profile_picture']),
                               'plan_id' =>$Row['plan_id']
                                );
            }
        return $user;
        }
    }
    
    
    
    
    public function isUserCredentialsCorrect($email,$password){
       $params = array(
            ':email' => $email
        );
        $sql = 'select * from users where email = :email';
        $this->_db->query($sql,$params);
        
        if($this->_db->_count > 0 && $this->_db->_result[0]['password_hash'] == md5($password)){
            $this->email = $this->_db->_result[0]['email'];
            $this->password = $this->_db->_result[0]['password_hash'];
            return true;
        } else {
            return false;
        }
        
    }

    public function editUser($id,$email,$_first_name,$_last_name,$_gender){
        $params = array(
            ':id' => $id,
            ':email' => $email,
            ':first_name' => $_first_name,
            ':last_name' => $_last_name,
            ':gender' => $_gender
        );
        $sql = 'update users set email=:email,first_name=:first_name,last_name=:last_name,gender=:gender where id=:id';
        $this->_db->query($sql,$params);
        return 1;
    }

    public function deleteUser($id){

    }

}




?>