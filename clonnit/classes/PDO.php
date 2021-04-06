<?php

$host ='studmysql01.fhict.local';
$user = 'dbi457075';
$dbpass = 'kEBJ47sXJNninLL';
$dbname = 'dbi457075';

//DSN
$dsn = 'mysql:host='. $host . ';dbname=' . $dbname;

$pdo = new PDO($dsn,$user,$dbpass);

$pdo ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
PDO::FETCH_OBJ);


//INSERT

$username = 'TEST';
$password = '123';
$useremail = 'test@gmail.com';

$sql = 'INSERT INTO user(username,email,password) VALUES(:username, :email,:password)';
$statement = $pdo ->prepare($sql);
$statement->execute(['username' => $username,'email' => $useremail, 'password' => $password]);
echo 'Success';


?>