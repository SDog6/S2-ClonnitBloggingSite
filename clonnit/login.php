<?php
  require('./classes/User.php');
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
            header('Location: index.php');
        }
    }
?>

<!DOCTYPE html>

<?php include("./templates/header.php");?>

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
</section>

<?php include("./templates/footer.php");?>


</html>