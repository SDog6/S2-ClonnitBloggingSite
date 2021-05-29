<?php
  include_once('./includes/autoload.inc.php');

$errors = array('username'=>'');
$username = '';
    if(isset($_POST['update']))
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
        
        if(array_filter($errors))
        {
            echo '';
        }
        else
        {
            $username = $_POST["username"];
            $id = $_SESSION["id"];
            $update = new Userdata();
            $update->UpdateUsername($username,$id);
            header("location: changeusername.php?error=none");
        }
    }

?>

<!DOCTYPE html>
<?php include("./templates/header.php");?>
<?php include_once("./scripts/protectedpage.php");?>

<section class="credentials-container">
    <h3>Update username</h3>
    <form action="changeusername.php" method="POST">
        <input type="text" name="username" placeholder="New username" value="<?php echo htmlspecialchars($username) ?>"><br>
        <div class="error-msg-credentials"><?php echo $errors['username']?></div>
        <input type="submit" name="update" value="Update"><br>
    </form>

    <?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "none"){
            echo "<p>Sucessfullu updated username</p>";
        }
    }
    
    ?>
</section>


<?php include("./templates/footer.php");?>
</html>