<?php

include_once('./includes/autoload.inc.php');
session_start();


$errors = array('tpassword'=>'', 'password'=>'');
$tpassword = '';
$password = '';

    if(isset($_POST['change']))
    {
        //check current password
        if(empty($_POST['tpassword']))
        {
            $errors['tpassword'] = 'Please enter current password<br />';
        }

        
        //check password
        if(empty($_POST['password']))
        {
            $errors['password'] = 'Please enter password <br />';
        }
        else
        {
            $password = $_POST['password'];
        }

        if(array_filter($errors))
        {
            echo '';
        }
        else
        {
            $password = $_POST["password"];
            $currentpassword = $_POST["tpassword"];

            $id = $_SESSION["id"];

            $loginattempt = new Userdata();

            $user = $loginattempt->GetAUserByID($id);

            if(password_verify($currentpassword,$user->GetPassword())){
                $loginattempt->UpdatePassword(password_hash($password,PASSWORD_DEFAULT),$id);
                header("location: changepassword.php?error=none");

            }
            else {
                header("location: changepassword.php?error=wrong");
            }

          
        }
    }
?>

<!DOCTYPE html>

<?php include("./templates/header.php");?>
<?php include_once("./scripts/protectedpage.php");?>



<section class="credentials-container">
    <h3>Update your password</h3>
    <form action="changepassword.php" method="POST">
        <input type="password" name="tpassword" placeholder="Current password" value="<?php echo htmlspecialchars($tpassword) ?>"><br>
        <div class="error-msg-credentials"><?php echo $errors['tpassword']?></div>

        <input type="password" name="password" placeholder="New password"
            value="<?php echo htmlspecialchars($password) ?>"><br>

        <div class="error-msg-credentials"><?php echo $errors['password']?></div>
        <input type="submit" name="change" value="Update"><br>
        </div>
    </form>
    <?php 
 if(isset($_GET["error"])){
    if($_GET["error"] == "none"){
        echo "<p>Password updated!</p>";
    }
}

if(isset($_GET["error"])){
    if($_GET["error"] == "wrong"){
        echo "<p>Wrong password!</p>";
    }
}
?>
</section>



<?php include("./templates/footer.php");?>


</html>