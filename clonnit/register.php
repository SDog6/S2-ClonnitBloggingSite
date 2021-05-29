<?php
include_once './includes/autoload.inc.php'; ?>
<!DOCTYPE html>
<?php include './templates/header.php'; ?>
<?php if (isset($_SESSION['id'])) {
  header('location: index.php');
  exit();
} ?>


<section class="credentials-container">
    <h3>Create a new account</h3>
    <form id="register-form" action="register.php" method="POST">
        <input type="text" id="reg-username" name="username" placeholder="Username"><br>

        <input type="email" id="reg-email" name="email" placeholder="Email"><br>

        <input type="password" id="reg-password" name="password" placeholder="Password"><br>

        <input type="password" id="reg-conpassword" name="conpassword" placeholder="Confirm password"><br>



    </form>
    <div class="error-msg-credentials" id="reg-error"></div>
    <input type="submit" name="register" value="Create" id="registerbtn" style="
  left: 0;"><br>
    <div class="reg-log-link"><a href="./login.php">Already have an account?</a>

</section>


<?php include './templates/footer.php'; ?>

</html>