<?php

require_once('UserModel.php');
class RegisterService
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();  
    }

    public function makeRegestiration($user) : bool
    { 
        if(!($this->userModel->IsEmailExists($user->getEmail())) && !($this->userModel->IsUserNameExists($user->getUserName())) && $user->getUserType()!='admin' && $user->getEmail()!=null && $user->getPassword() !=null  && $user->getFirstName() !=null && $user->getLastName()!=null && $user->getUserName()!=null && $user->getUserType()!=null )
        {
                $this->userModel->addToDataBase($user);
                return true;
        }
        return false;
    }
}

?>