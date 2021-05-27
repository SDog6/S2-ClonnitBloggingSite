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
                    echo ' <div class="left-title">  <h2> ' . $value->Gettitle() . '</h2> ';
                    echo ' <p> ' . $value->Getcontent() . '</p> </div> <br>';

                }
                
                ?>


            
            <div class="right-title">
                <h2>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa, fugit?</h2>
            </div>
       
    </main>

</section>
<?php include("./templates/footer.php");?>

</html>