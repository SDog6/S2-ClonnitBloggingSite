<?php 
if(isset($_POST["register"])){

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    require_once('./classes/UserDataManagement.php');
    RegisterAUser($username,$email,$password);

}
else{
    head("location: register.php");
    exit();
}

?>