<?php 

require_once 'user.class.php';

class Login {

    public $user;
    public $errors;
    public $messages;

    public function __construct(){
        session_start();
        
        $this->user = new User();
        $this->errors = array();
        $this->messages = array();
        
        if(isset($_GET['logout'])){
            $this->doLogout();
        } elseif(isset($_POST['login'])){
            $this->doLoginWithPostData();
        } elseif(isset($_POST['register'])){
            $this->doRegister();
        }
    }

    private function doLoginWithPostData(){
        if(empty($_POST['email'])){
            $this->errors[] = 'Email field was empty';
        } elseif(empty($_POST['password'])){
            $this->errors[] = 'Password field was empty';
        } else {
            if($this->user->isUserCredentialsCorrect($_POST['email'],$_POST['password'])){
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['user_login_status'] = 1;
                $_SESSION['user_id'] = $this->user->getUserIdByEmail($_POST['email']);
                $_SESSION['name'] = $this->user->getUserNameByEmail($_POST['email']);
            } else {
                $this->errors[] = 'Incorrect credentials';
            }
        }
    }
    
    public function doLogout(){
        $_SESSION = array();
        session_destroy();
        $this->messages[] = 'You have been logged out';
    }
    
    public function doRegister(){
        $image= addslashes($_FILES['profile_picture']['tmp_name']);
        $image= file_get_contents($image);
        //$image = base64_encode ($image);
        $_POST['profile_picture'] = $image;
        $this->user->create($_POST['email'],$_POST['password'],$_POST['first_name'],$_POST['last_name'],$_POST['gender'],$_POST['profile_picture'],$_POST['plan']);
        $this->user->save();
        $this->messages[] = 'You have been registered';
    }
    
    public function isUserLoggedIn(){
        if(isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1){
            return true;
        } else {
            return false;
        }
    }

}





?>