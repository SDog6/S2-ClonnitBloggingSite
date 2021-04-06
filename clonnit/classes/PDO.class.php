<?php
class Connection{

protected function Connect(){
    
$host ="studmysql01.fhict.local";
$user = 'dbi457075';
$dbpass = 'kEBJ47sXJNninLL';
$dbName = 'dbi457075';

    $dsn = 'mysql:host='.$host.';dbname='.$dbName;

    $pdo = new PDO($dsn,$user,$dbpass);
    
    $pdo ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
    PDO::FETCH_OBJ);

    return $pdo;

    
}
}
?>