<?php
require_once('AdminController.php');
require_once('UserController.php');

$request = new FacadRequestHandler();
$request->handle();
class FacadRequestHandler
{
    private $adminController ;
    private $userController ;
    
    public function __construct()
    {
        $this->adminController = new AdminController();
        $this->userController = new UserController();
    }

    public function handle()
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
            if($this->isAdmin())
            {
                $this->adminController->getAllUsers();
            }
            else
            {
                echo 'blocked';
            } 
        }
        
        else
        {
            echo "404 ERROR The requested URL was not found on this server.";
        }
    }

    private function isAdmin()
    {
        session_start();     
        if(isset($_SESSION['login']))
        {
            if($_SESSION['login'] == "admin")
                return true;
            return false;
        }
        return false;
    }
}

?>