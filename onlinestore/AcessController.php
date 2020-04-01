<?php

require_once('UserModel.php');
require_once('User.php');

class AccessController{ 
    private $userModel;
    private $user;

    public function __construct($user)
    {
        $this->userModel = new UserModel();
        $this->user = $user;   
    }
    
    public function makeRegestiration() : bool
    { 
        if(!($this->userModel->IsEmailExists($this->user->getEmail())) && !($this->userModel->IsUserNameExists($this->user->getUserName())) && $this->user->getUserType()!='admin' && $this->user->getEmail()!=null && $this->user->getPassword() !=null  && $this->user->getFirstName() !=null && $this->user->getLastName()!=null && $this->user->getUserName()!=null && $this->user->getUserType()!=null )
        {
                $this->userModel->addToDataBase($this->user);
                return true;
        }
        return false;
    }

    public function makeLogin() : bool
    {
        if($this->user->getEmail()!=null && $this->user->getPassword()!=NULL)
        {
                if($this->userModel->IsAccountExistByEmail($this->user->getEmail(),$this->user->getPassword()))
                {
                   echo "welcome ".$this->user->getUserType();
                   return true;
                }
                return false;
        }
        else if($this->user->getUserName()!=NULL && $this->user->getPassword()!=null)
        {
            if($this->userModel->IsAccountExistByUserName($this->user->getUserName(),$this->user->getPassword()))
            {
                echo "welcome ".$this->user->getUserType();
                return true;
            }
            return false;
        }
        return false;
    }

    public function __destruct()
    {
       $this->userModel->endConnection();
    }
}

?>