<?php
include_once './includes/autoload.inc.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

$ok = false;
$canRegister = false;

// $register->RegisterAUser(
//   $username,
//   $email,
//   password_hash($password, PASSWORD_DEFAULT)
// );

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
            //success
            //echo '<span id="success">Successfull registration!</span>';
            $ok = true;
          }
        }
      }
    }
  }
}

if ($ok == true) {
  $register = new Userdata();
  $usernameOk = false;
  $emailOk = false;
  $usernameExist =
    $register->GetAUserByUsername($username)->GetUsername() === null
      ? false
      : true;
  $emailExist = $register->GetAUser($email)->GetEmail() === null ? false : true;

  // if ($register->GetAUserByUsername($username) != null) {
  //   echo 'Username is already taken!';
  //   $usernameOk = false;
  //   $canRegister = false;
  // } else {
  //   $usernameOk = true;
  // }

  // if ($register->GetAUser($email) != null) {
  //   echo 'Email is already taken!';
  //   $canRegister = false;
  // } else {
  //   $emailOk = true;
  // }

  // if (
  //   $register->GetAUserByUsername($username) === null &&
  //   $register->GetAUser($email) === null
  // ) {
  //   $canRegister = true;
  // }

  // if ($usernameExist && $emailExist) {
  //   $usernameOk = false;
  //   $emailOk = false;
  // } elseif (!$usernameExist && $emailExist) {
  //   $usernameOk = true;
  //   $emailOk = false;
  // } elseif ($usernameExist && !$emailExist) {
  //   $usernameOk = false;
  //   $emailOk = true;
  // } elseif (!$usernameExist && !$emailExist) {
  //   $usernameOk = true;
  //   $emailOk = true;
  // }

  // if ($usernameExist) {
  //   $usernameOk = false;
  // } else {
  //   $usernameOk = true;
  // }
  // if ($emailExist) {
  //   $emailOk = false;
  // } else {
  //   $emailOk = true;
  // }
}
echo $usernameExist;
echo $emailExist;

// if ($usernameExist && $emailExist) {
//   echo 'Username and email are already in use!';
//   $canRegister = false;
// } else {
//   if ($usernameExist == true) {
//   }
// }

// } elseif (
//   $GotUserName->GetUsername() == null &&
//   $GotUserEmail->GetEmail() != null
// ) {
//   echo 'Email is already taken!';
//   $canRegister = false;
// } elseif (
//   $GotUserName->GetUsername() == null &&
//   $GotUserEmail->GetEmail() == null
// ) {
//   $canRegister = true;
// }

?>