<?php

require_once('UserModel.php');
class LoginService
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();  
    }
    public function makeLogin($user) : bool
    {
        if($user->getEmail()!=null && $user->getPassword()!=null)
        {
                if($this->userModel->IsAccountExistByEmail($user->getEmail(),$user->getPassword()))
                {
                   $userType = $this->userModel->selectUserByEmail($user->getEmail(),$user->getPassword());
                   session_start();
                   $_SESSION['login'] = $userType;
                   return true;
                }
                return false;
        }
        else if($user->getUserName()!=null && $user->getPassword()!=null)
        {
            if($this->userModel->IsAccountExistByUserName($user->getUserName(),$user->getPassword()))
            {
                $userType = $this->userModel->selectUserByUserName($user->getUserName(),$user->getPassword());
                session_start();
                $_SESSION['login'] = $userType;
                return true;
            }
            return false;
        }
        return false;
    }


}

?>