<?php
session_start(); ?>

<?php include_once './includes/autoload.inc.php'; ?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
    <link rel="icon" href="./favicon.ico">
    <script src="https://kit.fontawesome.com/78b9271039.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./js/register.js"></script>
    <title>Clonnit</title>
</head>

<body>
    <header>
        <nav>
            <a href="index.php" class="navButtons" id="homeBtn">Home</a>
            <?php if (isset($_SESSION['username'])) {
              echo "<a href='postcreation.php' class='navButtons' id='homeBtn'>Post</a>";
            } ?>
            <div class="search-box">
            <form method="get" action="index.php">
                <input class="search-txt" type="text" name="search" id="search" placeholder="Search Clonnit">
                <button type="submit" class="search-btn"> <i class="fas fa-search"></i>  </button>
            </form>
            </div>
            <?php if (isset($_SESSION['username'])) {
              echo "<a href='scripts/logout.php' class='navButtons' id='profileBtn'>Logout</a>";
              echo "<a href='profilepage.php' class='navButtons' id='profileBtn'>" .
                $_SESSION['username'] .
                '</a>';
            } else {
              echo "<a href='login.php' class='navButtons' id='profileBtn'>Login</a>";
            } ?>
            <?php include './includes/changeNav.inc.php'; ?>
        </nav>
    </header>