<?php
include_once ('PDO.class.php');

class DisplayContent{


public function ShowContent(){
    
  $userdata = new Userdata();
  $posts = new Contentdata();


  if (isset($_GET['history'])) {
    $history = $_GET['history'];
    $array = $posts->GetAllPostsByAuthor($history);

    if (count($array) === 0) {
      echo 'No posts found that match the criteria';
    } else {
      foreach ($array as $value) {
        if (isset($_SESSION['id'])) {
          $user = $userdata->GetAUserByID($_SESSION['id']);
          if (
            $_SESSION['id'] === $value->Getauthor_id()
          ) {
            $var_id = $value->GetID();
            echo '<a href="post.php?var_id=' .
              $var_id .
              '">  <div class="left-title">  <h2> ' .
              $value->Gettitle() .
              ' </h2> </a> ';
            echo '<a href="./scripts/deletePost.php?var_id=' .
              $var_id .
              '">  <p> Delete </p></a> ';
              echo '<a href="postupdate.php?edit_id=' .
              $var_id .
              '">  <p> Edit </p></a> </div> <br>';
          } 
          else if (
            $user->GetAdminStatus() == 1
          ) {
            $var_id = $value->GetID();
            echo '<a href="post.php?var_id=' .
              $var_id .
              '">  <div class="left-title">  <h2> ' .
              $value->Gettitle() .
              ' </h2> </a> ';
            echo '<a href="./scripts/deletePost.php?var_id=' .
              $var_id .
              '">  <p> Delete </p></a> </div> <br>';
          } else {
            $var_id = $value->GetID();
            echo '<a href="post.php?var_id=' .
              $var_id .
              '">  <div class="left-title">  <h2> ' .
              $value->Gettitle() .
              ' </h2> </a> </div> <br> ';
          }
        } else {
          $var_id = $value->GetID();
          echo '<a href="post.php?var_id=' .
            $var_id .
            '">  <div class="left-title">  <h2> ' .
            $value->Gettitle() .
            ' </h2> </a> </div> <br>';
        }
      }
    }
  } 
  else if (isset($_GET['search'])) {
    $serach = $_GET['search'];
    $array = $posts->SerachPosts($serach);

    if (count($array) === 0) {
      echo 'No posts found that match the criteria';
    } else {
      foreach ($array as $value) {
        if (isset($_SESSION['id'])) {
          $user = $userdata->GetAUserByID($_SESSION['id']);
          if (
            $_SESSION['id'] === $value->Getauthor_id()
          ) {
            $var_id = $value->GetID();
            echo '<a href="post.php?var_id=' .
              $var_id .
              '">  <div class="left-title">  <h2> ' .
              $value->Gettitle() .
              ' </h2> </a> ';
            echo '<a href="./scripts/deletePost.php?var_id=' .
              $var_id .
              '">  <p> Delete </p></a> ';
              echo '<a href="postupdate.php?edit_id=' .
              $var_id .
              '">  <p> Edit </p></a> </div> <br>';
          } 
          else if (
            $user->GetAdminStatus() == 1
          ) {
            $var_id = $value->GetID();
            echo '<a href="post.php?var_id=' .
              $var_id .
              '">  <div class="left-title">  <h2> ' .
              $value->Gettitle() .
              ' </h2> </a> ';
            echo '<a href="./scripts/deletePost.php?var_id=' .
              $var_id .
              '">  <p> Delete </p></a> </div> <br>';
          } else {
            $var_id = $value->GetID();
            echo '<a href="post.php?var_id=' .
              $var_id .
              '">  <div class="left-title">  <h2> ' .
              $value->Gettitle() .
              ' </h2> </a> </div> <br> ';
          }
        } else {
          $var_id = $value->GetID();
          echo '<a href="post.php?var_id=' .
            $var_id .
            '">  <div class="left-title">  <h2> ' .
            $value->Gettitle() .
            ' </h2> </a> </div> <br>';
        }
      }
    }
  } else {
    $array = $posts->GetAllPosts();
    foreach ($array as $value) {
      if (isset($_SESSION['id'])) {
        $user = $userdata->GetAUserByID($_SESSION['id']);
        if (
          $_SESSION['id'] === $value->Getauthor_id()
        ) {
          $var_id = $value->GetID();
          echo '<a href="post.php?var_id=' .
            $var_id .
            '">  <div class="left-title">  <h2> ' .
            $value->Gettitle() .
            ' </h2> </a> ';
          echo '<a href="./scripts/deletePost.php?var_id=' .
            $var_id .
            '">  <p> Delete </p></a> ';
            echo '<a href="postupdate.php?edit_id=' .
            $var_id .
            '">  <p> Edit </p></a> </div> <br>';
        } 
        else if (
          $user->GetAdminStatus() == 1
        ) {
          $var_id = $value->GetID();
          echo '<a href="post.php?var_id=' .
            $var_id .
            '">  <div class="left-title">  <h2> ' .
            $value->Gettitle() .
            ' </h2> </a> ';
          echo '<a href="./scripts/deletePost.php?var_id=' .
            $var_id .
            '">  <p> Delete </p></a> </div> <br>';
        } else {
          $var_id = $value->GetID();
          echo '<a href="post.php?var_id=' .
            $var_id .
            '">  <div class="left-title">  <h2> ' .
            $value->Gettitle() .
            ' </h2> </a> </div> <br> ';
        }
      } else {
        $var_id = $value->GetID();
        echo '<a href="post.php?var_id=' .
          $var_id .
          '">  <div class="left-title">  <h2> ' .
          $value->Gettitle() .
          ' </h2> </a> </div> <br>';
      }
    }
  }
}


}
?>