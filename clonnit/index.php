<!DOCTYPE html>

<?php include("./templates/header.php");
include_once('./includes/autoload.inc.php');

?>

<section class="credentials-container">
<?php 
if(isset($_SESSION["username"])){
    echo "<p>Welcome " . $_SESSION["username"] ." <p>";
}
?>

<main>
            

                <?php 
                $posts = new Contentdata();
                $array = $posts -> GetAllPosts();   
                foreach($array as $value){
                    $var_id = $value->GetID();
                    echo '<a href="post.php?var_id=' . $var_id . '">  <div class="left-title">  <h2> ' . $value->Gettitle() . ' </h2> </a> ';

                    echo ' <p> ' . $value->Getcontent() . '</p> </div> <br>';

                }
                
                ?>

       
    </main>

</section>
<?php include("./templates/footer.php");?>

</html>