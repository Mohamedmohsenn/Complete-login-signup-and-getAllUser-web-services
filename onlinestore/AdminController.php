<?php

require_once('GetAllUsersService.php');
require_once('loginservice.php');

class AdminController
{
    private $allUsersService;
    private $loginService;

    public function __construct()
    {
        $this->allUsersService = new GetAllUsersService();
        $this->loginService = new LoginService();
    }

    public function getAllUsers()
    {
        $result[] = $this->allUsersService->getAllRegistedUsers();
        print_r(json_encode($result));
    }

}

?>