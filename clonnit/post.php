<!DOCTYPE html>

<?php
  include("./templates/header.php");
  include_once('./includes/autoload.inc.php');

$errors = array('comment'=>'');
$comment = '';
    if(isset($_POST['creation']))
    {
        //check content
        if(empty($_POST['comment']))
        {
            $errors['comment'] = 'Please enter comment<br />';
        }
        else
        {
            $comment = $_POST['comment'];
        }
        
        if(array_filter($errors))
        {
            echo '';
        }
        else
        {
            $posts = new Contentdata();
            $comment = $_POST["comment"];
            $var_value = $_GET['var_id'];
            $id = $_SESSION["id"];

            $posts->PostComment($id,$var_value,$comment);
            echo "Nice";



        }
    }

?>

<section class="credentials-container">


<main>
            

                <?php 

                     $var_value = $_GET['var_id'];
                     $posts = new Contentdata();
                     $users = new Userdata();
                     $passedpost = $posts->GetAPostByID($var_value);
                     $id = $passedpost->Getauthor_id();
                     $user = $users->GetAUserByID($id);

                     echo '<div class="left-title">  <h3> ' . $passedpost->Gettitle() . ' </h3> 
                     <p> Posted by:' . $user->GetUsername() .'</p>
                     </div> <br>';
                      echo ' <div class="left-title">  <p> ' . $passedpost->Getcontent() . '</p> </div> <br>';
                      ?>
                    
                    
                    <section class="post-container">

                    <form action="post.php?var_id=<?php echo $var_value ?>" method="POST">
                      <textarea name="comment" placeholder="Comment..."><?php echo htmlspecialchars($comment) ?></textarea><br>
                      <div class="error-msg-credentials"><?php echo $errors["comment"]?></div>
                       <input type="submit" name="creation" value="Create"><br>
                       </form>
                    
                       </section>

                   
                    
                    
                   
                  

                     <?php
                     
                     $array = $posts->GetAllComments($var_value);

                     foreach($array as $value){
                        $author_id = $value->GetAuthorID();
                        $user = $users->GetAUserByID($author_id);
                         echo  $user->GetUsername() . ': ' . $value->GetComment() . '<br>';


                     }
                     
                     ?>

       
    </main>

   
    
   

</section>
<?php include("./templates/footer.php");?>

</html>