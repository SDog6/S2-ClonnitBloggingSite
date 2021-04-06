<?php

class User{

private $id;
private $username;
private $password;
private $email;

public function __construct($id,$username,$password,$email){
    $this->id = $id;
    $this->username = $username;
    $this->password = $password;
    $this->email = $email;
}

public function GetUsername(){
    return "$this->username";
}

public function GetPassword(){
    return "$this->password";
}

public function GetEmail(){
    return "$this->email";
}


}


?>