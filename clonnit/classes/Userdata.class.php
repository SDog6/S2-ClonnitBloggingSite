<?php
include_once ('PDO.class.php');

class Userdata extends Connection{


public function RegisterAUser($newusername,$newemail,$newpassword){
    $sql = 'INSERT INTO user(username,email,password) VALUES(:username,:email,:password)';
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute(['username' => $newusername, 'email' => $newemail, 'password' => $newpassword]);
}


public function UpdateUsername($newusername,$id){
    $sql = 'UPDATE user SET username = ? WHERE id = ?';
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute([$newusername],[$id]);
    echo "nice";
}


public function UpdateEmail($newemail,$id){
    $sql = 'UPDATE user SET email = ? WHERE id = ?';
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute([$newemail],[$id]);
}


public function UpdatePassword($newpassowrd,$providedid){
    $sql = 'UPDATE user SET password = :password WHERE id = :id';
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute(['password' => $newpassowrd, 'id' => $providedid]);
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

public function GetUsernameCount($username){
    $sql = "SELECT COUNT(*) AS num FROM user WHERE username='".$username."'";
    $result = $this->Connect()->prepare($sql);
    $result -> execute([$username]);
    $numUsername = $result->fetchColumn();
    return $numUsername;
}

public function GetEmailCount($email){
    $sql = "SELECT COUNT(*) AS num FROM user WHERE email='".$email."'";
    $result = $this->Connect()->prepare($sql);
    $result -> execute([$email]);
    $numEmail = $result->fetchColumn();
    return $numEmail;
}

}
?>