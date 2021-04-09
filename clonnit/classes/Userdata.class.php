<?php
include_once ('PDO.class.php');

class Userdata extends Connection{


public function RegisterAUser($newusername,$newemail,$newpassword){
    $sql = 'INSERT INTO user(username,email,password) VALUES(:username,:email,:password)';
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute(['username' => $newusername, 'email' => $newemail, 'password' => $newpassword]);
}

public function GetAUser($email){
    $sql = 'SELECT * FROM user WHERE email =?';
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    $fid = $user->id;
    $fusername= $user->username;
    $fpassword = $user->password;
    $femail = $user->email;
    $founduser = new User($fid,$fusername,$fpassword,$femail);
    return $founduser;
}

public function GetAUserByID($id){
    $sql = 'SELECT * FROM user WHERE id =?';
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute([$id]);
    $user = $stmt->fetch();
    $fid = $user->id;
    $fusername= $user->username;
    $fpassword = $user->password;
    $femail = $user->email;
    $founduser = new User($fid,$fusername,$fpassword,$femail);
    return $founduser;
}

}
?>