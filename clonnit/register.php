<?php

$errors = array('username'=>'', 'email'=>'', 'password'=>'');
$username = '';
$email = '';
$password = '';

    if(isset($_POST['register']))
    {
        //check username
        if(empty($_POST['username']))
        {
            $errors['username'] = 'Please enter username<br />';
        }
        else
        {
            $username = $_POST['username'];
        }
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
    <h3>Create a new account</h3>
    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="Username" value="<?php echo htmlspecialchars($username) ?>"><br>
        <div class="error-msg-credentials"><?php echo $errors['username']?></div>
        <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email) ?>"><br>
        <div class="error-msg-credentials"><?php echo $errors['email']?></div>
        <input type="password" name="password" placeholder="Password"
            value="<?php echo htmlspecialchars($password) ?>"><br>
        <div class="error-msg-credentials"><?php echo $errors['password']?></div>
        <input type="submit" name="register" value="Create"><br>
        <div class="reg-log-link"><a href="./login.php">Already have an account?</a>
    </form>
</section>

<?php include("./templates/footer.php");?>

</html>