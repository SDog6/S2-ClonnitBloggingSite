<?php

class User{

private $id;
private $username;
private $password;
private $email;
private $admin;

public function __construct($id,$username,$password,$email,$admin){
    $this->id = $id;
    $this->username = $username;
    $this->password = $password;
    $this->email = $email;
    $this->admin = $admin;
}


public function GetID(){
    return $this->id;
}

public function GetUsername(){
    return $this->username;
}

public function GetPassword(){
    return $this->password;
}

public function GetEmail(){
    return $this->email;
}

public function GetAdminStatus(){
    return $this->admin;
}



public function GetInfo(){
    return "ID:$this->id Username:$this->username Password:$this->password Email:$this->email";
}

}


?>