<!DOCTYPE html>

<?php
include './templates/header.php';
include_once './includes/autoload.inc.php';
?>

<section class="credentials-container" style="display:grid">
    <?php if (isset($_SESSION['username'])) {
      echo '<p id="welcome">Welcome ' . $_SESSION['username'] . ' <p>';
    } ?>

    <main>


        <?php
        $display = new DisplayContent();
        $display->ShowContent();
        ?>


    </main>

</section>
<?php include './templates/footer.php'; ?>

</html>