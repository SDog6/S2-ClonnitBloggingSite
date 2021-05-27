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
        <div class="container">
            

                <?php 
                $posts = new Contentdata();
                $array = $posts -> GetAllPosts();   

                foreach($array as $value){
                    echo '<div class="left-title"> <h2> Title:' . $value->Gettitle() . '</h2></div>';
                }

                
                ?>


            
            <div class="right-title">
                <h2>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa, fugit?</h2>
            </div>
            <div class="left-content">
                <p> Some content here</p>
            </div>
            <div class="right-content">
                <p> Some content here</p>
            </div>
        </div>
    </main>

</section>
<?php include("./templates/footer.php");?>

</html>