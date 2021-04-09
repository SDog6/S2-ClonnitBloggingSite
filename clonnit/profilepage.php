<?php
  include_once('./includes/autoload.inc.php');
?>

<!DOCTYPE html>
<?php include("./templates/header.php");?>

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
?>

</section>

<?php include("./templates/footer.php");?>
</html>