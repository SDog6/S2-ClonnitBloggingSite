<?php
include_once './includes/autoload.inc.php';

$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$confirmPassword = htmlspecialchars($_POST['confirmPassword']);

$ok = false;
$canRegister = false;

if (!$username && !$email && !$password && !$confirmPassword) {
  echo 'All fields required!';
  $ok = false;
} else {
  //check username
  if (!$username) {
    echo 'Please enter username!';
    $ok = false;
  } elseif (strlen($username) < 3) {
    echo 'Username cannot be less than 3 characters!';
    $ok = false;
  } else {
    //check email
    if (!$email) {
      echo 'Please enter email!';
      $ok = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo 'The email is not valid!';
      $ok = false;
    } else {
      //check password
      if (!$password) {
        echo 'Please enter a password!';
        $ok = false;
      } elseif (strlen($password) < 5) {
        echo 'Password should be at least 5 characters!';
        $ok = false;
      } else {
        //check confirmPassword
        if (!$confirmPassword) {
          echo 'Please confirm your password!';
          $ok = false;
        } else {
          if ($confirmPassword !== $password) {
            echo 'Passwords should match!';
            $ok = false;
          } else {
            $ok = true;
          }
        }
      }
    }
  }
}

//check for dublicates in db
if ($ok == true) {
  $register = new Userdata();
  $usernameOk = false;
  $emailOk = false;
  $usernameExist = $register->GetUsernameCount($username) == 0 ? false : true;
  $emailExist = $register->GetEmailCount($email) == 0 ? false : true;

  if ($usernameExist && $emailExist) {
    echo 'User with this username/email already exists!';
    $canRegister = false;
  } elseif ($usernameExist && !$emailExist) {
    echo 'Username is already taken!';
    $canRegister = false;
  } elseif (!$usernameExist && $emailExist) {
    echo 'Email is already in use!';
    $canRegister = false;
  } else {
    $canRegister = true;
  }
}

//create user
if ($canRegister == true) {
  $register = new Userdata();
  $register->RegisterAUser(
    $username,
    $email,
    password_hash($password, PASSWORD_DEFAULT)
  );
  //success
  echo '<span id="success">Successfull registration!</span>';
}
?>