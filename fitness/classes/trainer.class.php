<?php

include_once "db.php";

class Trainer{
    private $_db;
    private $_id;
    private $_email;
    private $_password;
    private $_first_name;
    private $_last_name;
    private $_gender;
    private $_profile_picture;
    private $_experties;
    private $_plan_leader;
    private $_lesson_price;
    private $_quotes;

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
    
    public function getExperties(){
        return $this->_experties;
    }
    
    public function setExperties($p){
        $this->_experties = $p;
    }
    
    public function getPlanLeader(){
        return $this->_plan_leader;
    }
    
    public function setPlanLeader($p){
        $this->_plan_leader = $p;
    }
    
    public function getLessonPrice(){
        return $this->_lesson_price;
    }
    
    public function setLessonPrice($p){
        $this->_lesson_price = $p;
    }
    
    public function getQuotes(){
        return $this->_quotes;
    }
    
    public function setQuotes($p){
        $this->_quotes = $p;
    }

    public function create($_email,$_password,$_first_name,$_last_name,$_gender,$_profile_picture,$_experties,$_plan_leader,$_lesson_price,$_quotes){
        $this->_id = NULL;
        $this->_email = $_email;
        $this->_password = md5($_password);
        $this->_first_name = $_first_name;
        $this->_last_name = $_last_name;
        $this->_gender = $_gender;
        $this->_profile_picture = $_profile_picture;
        $this->_experties = $_experties;
        $this->_plan_leader = $_plan_leader;
        $this->_lesson_price = $_lesson_price;
        $this->_quotes = $_quotes;
    }

    public function save(){
        $params = array(
            ':email' => $this->_email,
            ':password_hash' => $this->_password,
            ':first_name' => $this->_first_name,
            ':last_name' => $this->_last_name,
            ':gender' => $this->_gender,
            ':profile_picture' => $this->_profile_picture,
            ':experties' => $this->_experties,
            ':plan_leader' => $this->_plan_leader,
            ':lesson_price' => $this->_lesson_price,
            ':quotes' => $this->_quotes
        );

        if(empty($this->_id)){
            $sql = 'insert into trainers (email,password_hash,first_name,last_name,gender,profile_picture,experties,plan_leader,lesson_price,quotes) VALUES(:email,:password_hash,:first_name,:last_name,:gender,:profile_picture,:experties,:plan_leader,:lesson_price,:quotes)';
        } else {
            $params[':trainer_id'] = $this->_id;
            $sql = 'update users set  email=:email,password_hash=:password_hash,first_name=:first_name,last_name=:last_name,gender=:gender,profile_picture=:profile_picture,plan=:plan where id=:trainer_id';

        }
        $this->_db->query($sql,$params);

    }

    public function getTrainerById($id){
        $params = array(
            ':id' => $id
        );
        $sql = 'select * from trainers where id = :id';
        $this->_db->query($sql,$params);
        if($this->_db->_count > 0){
            $this->_id = $id;
            $this->_email = $this->_db->_result[0]['email'];
            $this->_password = $this->_db->_result[0]['password_hash'];
            $this->_first_name = $this->_db->_result[0]['first_name'];
            $this->_last_name = $this->_db->_result[0]['last_name'];
            $this->_gender = $this->_db->_result[0]['gender'];
            $this->_profile_picture = $this->_db->_result[0]['profile_picture'];
            $this->_experties = $this->_db->result[0]['experties'];
            $this->_plan_leader = $this->_db->_result[0]['plan_leader'];
            $this->_lesson_price = $this->_db->_result[0]['lesson_price'];
            $this->_quotes = $this->_db->_result[0]['quotes'];
        }
    }

    public function getTrainers(){
        $sql = 'select * from trainers';
        $this->_db->query($sql,array());
        $trainersArr = array();
        foreach($this->_db->_result as $trainerRow){
            $tempTrainer = new Trainer();
            $tempTrainer->create($trainerRow['email'],$trainerRow['password_hash'],$trainerRow['first_name'],$trainerRow['last_name'],$trainerRow['gender'],$trainerRow['profile_picture'],$trainerRow['experties'],$trainerRow['plan_leader'],$trainerRow['lesson_price'],$trainerRow['quotes']);
            $tempTrainer->_id = $trainerRow['id'];
            $tempTrainer->setProfilePicture(base64_encode($tempTrainer->getProfilePicture()));
            $trainersArr[] = array('id' => $tempTrainer->getId(),
                                   'email' => $tempTrainer->getEmail(),
                                   'first_name' => $tempTrainer->getFirstName(),
                                   'last_name' => $tempTrainer->getLastName(),
                                   'password' => $trainerRow['password_hash'],
                                   'gender' => $tempTrainer->getGender(),
                                   'profile_picture' => $tempTrainer->getProfilePicture(),
                                   'experties' => $tempTrainer->getExperties(),
                                   'plan_leader' => $tempTrainer->getPlanLeader(),
                                   'lesson_price' => $tempTrainer->getLessonPrice(),
                                   'quotes' => $tempTrainer->getQuotes()
                                );
        }
        return $trainersArr;
    }
    
    public function isTrainerCredentialsCorrect($email,$password){
       $params = array(
            ':email' => $email
        );
        $sql = 'select * from trainers where email = :email';
        $this->_db->query($sql,$params);
        
        if($this->_db->_count > 0 && $this->_db->_result[0]['password_hash'] == md5($password)){
            $this->email = $this->_db->_result[0]['email'];
            $this->password = $this->_db->_result[0]['password_hash'];
            return true;
        } else {
            return false;
        }
        
    }
    
    
    public function updateTrainer($id,$_email,$_password,$_first_name,$_last_name,$_gender,$_profile_picture,$_experties,$_plan_leader,$_lesson_price,$_quotes){
        $params = array(
            ':id' => $id,
            ':email' => $_email,
            ':first_name' => $_first_name,
            ':last_name' => $_last_name,
            ':gender' => $_gender,
            ':profile_picture' => $_profile_picture,
            ':experties' => $_experties,
            ':plan_leader' => $_plan_leader,
            ':lesson_price' => $_lesson_price,
            ':quotes' => $_quotes
        );
        $sql = 'update trainers set email=:email,first_name=:first_name,last_name=:last_name,gender=:gender,profile_picture=:profile_picture,experties=:experties,plan_leader=:plan_leader,lesson_price=:lesson_price,quotes=:quotes where id=:id';
        $this->_db->query($sql,$params);
        return 1;
    }

}




?>