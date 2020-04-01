<?php

require_once('UserModel.php');
require_once('User.php');
class LoginController{
   private $userModel;
   private $user;

   public function __construct($user)
   {
      $this->userModel = new UserModel();
      $this->user = $user;  
   }

   public function makeLogin()
   {
      if($this->user->getEmail()!=null && $this->user->getPassword()!=NULL)
        {
             if($this->userModel->IsAccountExistByEmail($this->user->getEmail(),$this->user->getPassword()))
             {
                echo "welcome ".$this->user->getUserType();
             }
        }
        else if($this->user->getUserName()!=NULL && $this->user->getPassword()!=null)
        {
            if($this->userModel->IsAccountExistByUserName($this->user->getUserName(),$this->user->getPassword()))
            {
                echo "welcome ".$this->user->getUserType();
            }
        }
   }

   public function __destruct()
   {
      $this->userModel->endConnection();
   }
}


?>