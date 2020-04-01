<?php

require_once('UserModel.php');
class AdminController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();   
    }

    public function getAllRegistedUsers()
    {
        $result [] = $this->userModel->selectRegistedUsers();
        print_r(json_encode($result));
    }
}

?>