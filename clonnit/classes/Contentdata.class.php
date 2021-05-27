<?php
include_once ('PDO.class.php');

class Contentdata extends Connection{


public function CreateNewPost($newtitle,$newcontent){
    $sql = 'INSERT INTO post(post_title,post_content) VALUES(:post_title,:post_content)';
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute(['post_title' => $newtitle, 'post_content' => $newcontent]);
}


public function GetAllPosts(){
    $sql = 'SELECT * FROM post ORDER BY id DESC';
    $stmt = $this->Connect()->prepare($sql);

    $postsarray = array();
    $stmt->execute();

    while($posts = $stmt->fetch()){
        $fid = $posts->id;
        $ftitle = $posts->post_title;
        $fcontent = $posts->post_content;
        $time = $posts->timeOfPost;
        $FPost = new Content($fid,$ftitle,$fcontent,$time);
        array_push($postsarray,$FPost);
        

    }

    return $postsarray;
}

}
?>