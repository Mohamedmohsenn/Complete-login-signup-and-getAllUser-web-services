<?php

class Validator
{
    public function isAdmin()
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