<?php
  include_once('./includes/autoload.inc.php');
?>

<!DOCTYPE html>
<?php include("./templates/header.php");?>
<?php include_once("./scripts/protectedpage.php");?>


<section class="credentials-container">

 <?php
$id = $_SESSION["id"];
$loginattempt = new Userdata();
$founduser = $loginattempt->GetAUserByID($id);
echo "<br>";
echo "Username: "  . $founduser->GetUsername();
echo "<br>";
echo "<br>";
echo "Email: " . $founduser->GetEmail();
echo "<br>";
echo "<br>";
echo "Password: ********** ";
echo "<br>";
echo "<br>";
echo "<a href='changeusername.php' >Change username</a>";
echo "<br>";
echo "<a href='changeemail.php' >Change email</a>";
echo "<br>";
echo "<a href='changepassword.php' >Change password</a>";


?>

</section>

<?php include("./templates/footer.php");?>
</html>