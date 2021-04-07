<!DOCTYPE html>

<?php include("./templates/header.php");?>
<section class="credentials-container">


<?php 
if(isset($_SESSION["username"])){
    echo "<p>Welcome " . $_SESSION["username"] ." <p>";
}
?>
<?php include("./templates/post.php");?>



</section>
<?php include("./templates/footer.php");?>

</html>