<?php
  include_once('classes/UserDataManagement.class.php');
  class Userdata extends Connection{


public function RegisterAUser($newusername,$newemail,$newpassword){
    $sql = 'INSERT INTO user(username,email,password) VALUES(:username,:email,:password)';
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute(['username' => $newusername, 'email' => $newemail, 'password' => $newpassword]);
}
/* 
public function GetAUser($username,$password){
    sql = 'SELECT FROM user'
}
 */
}
?>