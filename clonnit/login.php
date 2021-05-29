<?php

include_once('./includes/autoload.inc.php');


$errors = array('email'=>'', 'password'=>'');
$email = '';
$password = '';

    if(isset($_POST['login']))
    {
        //check email
        if(empty($_POST['email']))
        {
            $errors['email'] = 'Please enter email<br />';
        }
        else
        {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $errors['email'] = 'Please enter a valid email address<br />';
            }
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
            $email = $_POST["email"];
            $loginattempt = new Userdata();
            $founduser = $loginattempt->GetAUser($email);
            if($founduser === null){
                header("login.php?error=wronglogin");
            }
            $hashpass = $founduser->GetPassword();
            $checkpassword = password_verify($password, $hashpass);

            if($checkpassword === false){
                header("location: login.php?error=wronglogin");
            }
            else if($checkpassword === true){
                session_start();
                $_SESSION["id"] = $founduser->GetID();
                $_SESSION["username"] = $founduser->GetUsername();
                header("location: index.php");
            }  
        }
    }
?>

<!DOCTYPE html>

<?php include("./templates/header.php");?>
<?php 
if(isset($_SESSION["id"]))
{
  header("location: index.php");
  exit;
}
?>


<section class="credentials-container">
    <h3>Log into your account</h3>
    <form action="login.php" method="POST">
        <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email) ?>"><br>
        <div class="error-msg-credentials"><?php echo $errors['email']?></div>
        <input type="password" name="password" placeholder="Password"
            value="<?php echo htmlspecialchars($password) ?>"><br>
        <div class="error-msg-credentials"><?php echo $errors['password']?></div>
        <input type="submit" name="login" value="Log in"><br>
        <div class="reg-log-link"><a href="./register.php">Don't have an account?</a>
        </div>
    </form>
    <?php 
 if(isset($_GET["error"])){
    if($_GET["error"] == "wronglogin"){
        echo "<p>Wrong login details!</p>";
    }
}
?>
</section>



<?php include("./templates/footer.php");?>


</html>