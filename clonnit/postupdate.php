<?php
include_once './includes/autoload.inc.php';
error_reporting(E_ALL & ~E_NOTICE);
session_start();

$errors = ['title' => '', 'content' => ''];
$title = '';
$content = '';
if (isset($_POST['creation'])) {
  //check title
  if (empty($_POST['title'])) {
    $errors['title'] = 'Please enter title<br />';
  } else {
    $title = $_POST['title'];
  }
  //check content
  if (empty($_POST['content'])) {
    $errors['content'] = 'Please enter content<br />';
  } else {
    $content = $_POST['content'];
  }

  if (array_filter($errors)) {
    echo '';
  } else {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $edit = $_GET['edit_id'];

    $creation = new Contentdata();
    $creation->UpdatePost($title, $content, $edit);
  }
}
?>

<!DOCTYPE html>
<?php include './templates/header.php'; ?>
<?php include_once './scripts/protectedpage.php'; ?>

<section class="post-container">
    <h3>Edit post</h3>

    <?php 
    $edit = $_GET['edit_id'];
    $posts = new Contentdata();
    $passedpost = $posts->GetAPostByID($edit);
    ?>
    <form action="postupdate.php?edit_id=<?php echo $edit; ?>" method="POST">
        <input type="text" name="title" placeholder="Title" value="<?php echo $passedpost->Gettitle(); ?>"><br>
        <div class="error-msg-credentials"><?php echo $errors['title']; ?></div>
        <textarea name="content" placeholder="Content"><?php echo $passedpost->Getcontent(); ?></textarea><br>
        <div class="error-msg-credentials"><?php echo $errors[
          'content'
        ]; ?></div>
        <input type="submit" name="creation" value="Update"><br>
    </form>

</section>


<?php include './templates/footer.php'; ?>

</html>