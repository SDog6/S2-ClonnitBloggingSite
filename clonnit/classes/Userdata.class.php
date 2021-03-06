<?php
include_once ('PDO.class.php');

class Userdata extends Connection{


public function RegisterAUser($newusername,$newemail,$newpassword){
    $sql = 'INSERT INTO user(username,email,password) VALUES(:username,:email,:password)';
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute(['username' => $newusername, 'email' => $newemail, 'password' => $newpassword]);
}


public function UpdateEmail($newemail,$newid){
    $sql = 'UPDATE user SET email = :email WHERE id = :id';
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute(['email' => $newemail,'id' => $newid]);
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
    $admin = $user->admin;
    $founduser = new User($fid,$fusername,$fpassword,$femail,$admin);
    return $founduser;
}

public function GetAUserByUsername($username){
    $sql = 'SELECT * FROM user WHERE username =?';
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    $fid = $user->id;
    $fusername= $user->username;
    $fpassword = $user->password;
    $femail = $user->email;
    $admin = $user->admin;
    $founduser = new User($fid,$fusername,$fpassword,$femail,$admin);
    return $founduser;
}

public function GetAUserByID($id){
    $sql = 'SELECT * FROM user WHERE id =?';
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute([$id]);
    $user = $stmt->fetch();
    $fid = $user->id;
    $fusername = $user->username;
    $fpassword = $user->password;
    $femail = $user->email;
    $admin = $user->admin;
    $founduser = new User($fid, $fusername, $fpassword, $femail,$admin);
    return $founduser;
  }

  public function GetUsernameCount($username)
  {
    $sql = "SELECT * from user where username='{$username}'";
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute();
    $usernameCount = $stmt->rowCount();
    return $usernameCount;
  }

  public function GetEmailCount($email)
  {
    $sql = "SELECT * from user where email='{$email}'";
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute();
    $emailCount = $stmt->rowCount();
    return $emailCount;
  }
}
?>