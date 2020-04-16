<?php


require_once('loginservice.php');
require_once('RegsiterService.php');
require_once('User.php');

class UserController
{
    private $registerService;
    private $loginService;
    public function __construct()
    {
        $this->registerService = new RegisterService();
        $this->loginService = new LoginService();
        
    }

    public function login()
    {
            $user = new User();
            if(isset($_POST['email']) && isset($_POST['password']))
            {  
                $user->setEmail($_POST['email']);
                $user->setPassword($_POST['password']);
            }
            elseif (isset($_POST['user_name']) && isset($_POST['password']))
            {
                $user->setUserName($_POST['user_name']);
                $user->setPassword($_POST['password']);   
            }
            else
            {   
                $file = Array("message " => "Please Fill All The Data!");
                print_r(json_encode($file));
                return;
            }
            if($this->loginService->makeLogin($user))
            {
                $file = Array("message " => "Congrats you have been loged in Succefully!");
            }
            else
            {
                $file = Array("message " => "Email or password is not correct!");
            }
            print_r(json_encode($file));
    }

    public function register()
    {
            $user = new User();
            if(isset($_POST['user_name']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) &&$_POST['password'] && $_POST['user_type'])
            {  
                $user->setUserName($_POST['user_name']);
                $user->setFirstName($_POST['first_name']);
                $user->setLastName($_POST['last_name']);
                $user->setEmail($_POST['email']);
                $user->setPassword($_POST['password']);
                $user->setUserType($_POST['user_type']); 
            }
            else
            {
                $file = Array("message " => "Please Fill All The Data!");
                print_r(json_encode($file));
                return;
            }

            if($this->registerService->makeRegestiration($user))
            {
                $file = Array("message " => "Congrats you have been registered Succefully!","name " => $user->getUserName(),"Email "=>$user->getEmail());
            }
            else
            {
                $file = Array("message " => "Email or user name is already exist try again!");
            }
            print_r(json_encode($file));
    }
}

?>