<?php
require_once('User.php');
class UserModel
{
    private $conn;
    public function __construct()
    {
        $this->conn = mysqli_connect("localhost","root","","online_store");
    }

    public function IsEmailExists($email)
    {
        $findInDataBase = "select * from users where email = '$email'";
        $query = mysqli_query($this->conn,$findInDataBase);
        
        if(mysqli_num_rows($query) > 0)
                return true;
        return false;
    }

    public function IsUserNameExists($userName)
    {
        $findInDataBase = "select * from users where user_name = '$userName'";
        $query = mysqli_query($this->conn,$findInDataBase);
        
        if(mysqli_num_rows($query) > 0)
                return true;
        return false;
    }

    public function IsAccountExistByEmail($email,$password)
    {
        $findInDataBase = "select * from users where email = '$email' and password = '$password'";
        $query = mysqli_query($this->conn,$findInDataBase);
        
        if(mysqli_num_rows($query) > 0)
                return true;
        return false;
    }

    public function IsAccountExistByUserName($userName,$password)
    {
        $findInDataBase = "select * from users where user_name = '$userName' and password = '$password'";
        $query = mysqli_query($this->conn,$findInDataBase);
        
        if(mysqli_num_rows($query) > 0)
                return true;
        return false;
    }

    public function addToDataBase(User $user)
    {
        $userName = $user->getUserName();
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $userType = $user->getUserType();
        $insertIntoDataBase = "INSERT INTO users(user_name,first_name, last_name, email,password,user_type) VALUES ('$userName','$firstName','$lastName','$email','$password','$userType')";
        $query = mysqli_query($this->conn,$insertIntoDataBase);  
    }

    public function selectRegistedUsers() 
    {
        $selectFromDataBase = "select * from users"; 
        $query = mysqli_query($this->conn,$selectFromDataBase);
        $result = [];
        while($row = $query->fetch_assoc())
        {
            $result[] = $row;
        }   
        return $result;
    }

    public function endConnection()
    {
        mysqli_close($this->conn);
    }
}

?>