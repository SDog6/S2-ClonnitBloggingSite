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

    $id = $_SESSION['id'];

    $loginattempt = new Userdata();
    $founduser = $loginattempt->GetAUserByID($id);
    $username = $founduser->GetUsername();

    $creation = new Contentdata();
    $creation->CreateNewPost($title, $content, $id);
    header('location: postcreation.php?error=none');
  }
}
?>

<!DOCTYPE html>
<?php include './templates/header.php'; ?>
<?php include_once './scripts/protectedpage.php'; ?>

<section class="post-container">
    <h3>Create a new post</h3>
    <form action="postcreation.php" method="POST">
        <input type="text" name="title" placeholder="Title" value="<?php echo htmlspecialchars(
          $title
        ); ?>"><br>
        <div class="error-msg-credentials"><?php echo $errors['title']; ?></div>
        <textarea name="content" placeholder="Content"><?php echo htmlspecialchars(
          $content
        ); ?></textarea><br>
        <div class="error-msg-credentials"><?php echo $errors[
          'content'
        ]; ?></div>
        <input type="submit" name="creation" value="Create"><br>
    </form>

    <?php if (isset($_GET['error'])) {
      if ($_GET['error'] == 'none') {
        echo '<p>Sucessful post creation</p>';
      }
    } ?>
</section>


<?php include './templates/footer.php'; ?>

</html>