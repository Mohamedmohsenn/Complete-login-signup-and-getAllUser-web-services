<?php
require_once('AdminController.php');
require_once('UserController.php');

$request = new FacadRequestHandler();
$request->hanlde();
class FacadRequestHandler
{
    private $adminController ;
    private $userController ;
    
    public function __construct()
    {
        $this->adminController = new AdminController();
        $this->userController = new UserController();
    }

    public function hanlde()
    { 
        if($_GET['filter'] == 'register')
        {
            $this->userController->register();
        }

        elseif($_GET['filter'] == 'login')
        {            
            $this->userController->login();
        }

        elseif($_GET['filter'] == 'Admin/GetAllUsers')
        {           
            $this->adminController->getAllUsers();
        }
        else
        {
            echo "404 ERROR The requested URL was not found on this server.";
        }
    }
}

?>