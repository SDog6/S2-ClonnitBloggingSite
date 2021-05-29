<?php
session_start();
include_once('./includes/autoload.inc.php');


$errors = array('email'=>'');
$email = '';
    if(isset($_POST['change']))
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
        

        if(array_filter($errors))
        {
            echo '';
        }
        else
        {
            $email = $_POST["email"];

            $id = $_SESSION["id"];
            
            $loginattempt = new Userdata();
            $loginattempt->UpdateEmail($email,$id);
            header("location: changeemail.php?error=none");

           
        }
    }
?>

<!DOCTYPE html>

<?php include("./templates/header.php");?>
<?php include_once("./scripts/protectedpage.php");?>



<section class="credentials-container">
    <h3>Log into your account</h3>
    <form action="changeemail.php" method="POST">
        <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email) ?>"><br>
        <div class="error-msg-credentials"><?php echo $errors['email']?></div>
        <input type="submit" name="change" value="Update"><br>
        </div>
    </form>
    <?php 
 if(isset($_GET["error"])){
    if($_GET["error"] == "none"){
        echo "<p>Email updated!</p>";
    }
}
?>
</section>



<?php include("./templates/footer.php");?>


</html>