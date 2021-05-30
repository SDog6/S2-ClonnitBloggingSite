<?php

include('../classes/Contentdata.class.php');


 $id = $_GET['var_id'];
 $del = new Contentdata();
 $del->DeleteComments($id);
 $del->DeletePost($id);

header("location: ../index.php");
exit();

?>