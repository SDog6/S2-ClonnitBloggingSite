<?php 
include_once ('PDO.class.php');

function isset_username($username)
{
    $checkUsername = new Userdata();
    $checkUsername->GetUsernameCount($username);

    if ($checkUsername > 0)
        return true;    //user exists
    else
        return false;   //user does not exist


}

function isset_email($email)
{
    $checkEmail = new Userdata();
    $checkEmail->GetEmailCount($email);

    if ($checkEmail > 0)
        return true;    //user exists
    else
        return false;
}

if(isset($_POST['username']))
{
    if(!isset_username($_POST['username']))
        echo 'true';
    else
        echo 'false';
}
else if(isset($_POST['email']))
{
    if(!isset_email($_POST['email']))
    echo 'true';
else
    echo 'false';
}
?>