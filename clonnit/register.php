<?php
include_once('./includes/autoload.inc.php');

$errors = array('username'=>'', 'email'=>'', 'password'=>'');
$username = '';
$email = '';
$password = '';

    // if(isset($_POST['register']))
    // {
    //     //check username
    //     if(empty($_POST['username']))
    //     {
    //         $errors['username'] = 'Please enter username<br />';
    //     }
    //     else
    //     {
    //         $username = $_POST['username'];
    //     }
    //     //check email
    //     if(empty($_POST['email']))
    //     {
    //         $errors['email'] = 'Please enter email<br />';
    //     }
    //     else
    //     {
    //         $email = $_POST['email'];
    //         if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    //         {
    //             $errors['email'] = 'Please enter a valid email address<br />';
    //         }
    //     }
        
    //     //check password
    //     if(empty($_POST['password']))
    //     {
    //         $errors['password'] = 'Please enter password <br />';
    //     }
    //     else
    //     {
    //         $password = $_POST['password'];
    //     }

        
    //     if(array_filter($errors))
    //     {
    //         echo '';
    //     }
    //     else
    //     {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $register = new Userdata();
            $register->RegisterAUser($username,$email,password_hash($password, PASSWORD_DEFAULT));
            header("location: register.php?error=none");
    //     }
    // }

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        $errorUsername = false;
        $errorEmail = false;
        $errorPassword = false;
        $errorConfirmPassword = false;

        $errorMsgUsername = "";
        $errorMsgEmail = "";
        $errorMsgPassword = "";
        $errorMsgConfirmPassword = "";

        if(empty($username)) {
            $errorMsgUsername = "Please enter a username!";
            $errorUsername = true;
        }
        elseif(strlen($username) < 3)
        {
            $errorMsgUsername = "The username must be at least 3 characters long!";
            $errorUsername = true;
        }
        //check if username is already in use

        if(empty($email)) {
            $errorMsgEmail = "Please enter an email address!";
            $errorEmail = true;
        }
        elseif(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errorMsgEmail = "Please enter a valid email address!";
            $errorEmail = true;
        }

        if(empty($password)) {
            $errorMsgPassword = "Please enter a password!";
            $errorPassword = true;
        }
        elseif(strlen($password) < 8) {
            $errorMsgPassword = "The password cannot be less than 8 characters long!";
            $errorPassword = true;
        }
        if(empty($confirmPassword)) {
            $errorMsgConfirmPassword = "Please confirm the password you entered!";
            $errorConfirmPassword = true;
        }
        elseif($confirmPassword === $password) {
            $errorMsgConfirmPassword = "The passwords must match!";
            $errorConfirmPassword = true;
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
    <h3>Create a new account</h3>
    <form action="register.php" id="register_form" name="register_form" method="POST">

        <input type="text" name="username" id="reg-username" placeholder="Username"
            value="<?php echo htmlspecialchars($username) ?>"><br>
        <div class="error-msg-credentials" id="reg-usernamecheck">Cannot proceed without a username</div>

        <input type="text" name="email" id="reg-email" required placeholder="Email"
            value="<?php echo htmlspecialchars($email) ?>"><br>
        <div class="error-msg-credentials" id="reg-emailcheck">Please enter a valid email</div>

        <input type="password" name="password" id="reg-password" placeholder="Password"
            value="<?php echo htmlspecialchars($password) ?>"><br>
        <div class="error-msg-credentials" id="reg-passcheck">Please enter password</div>

        <input type="password" name="conpassword" id="reg-conpassword" placeholder="Confirm password"><br>
        <div class="error-msg-credentials" id="reg-passmatch">Passwords don't match</div>

        <input type="submit" name="register" id="reg-submitbtn" value="Create"><br>
        <div class="reg-log-link"><a href="./login.php">Already have an account?</a>
    </form>
</section>
<script src="app.js"></script>


<?php include("./templates/footer.php");?>

</html>