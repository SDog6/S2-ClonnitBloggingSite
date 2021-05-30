<?php
include_once ('PDO.class.php');

class Contentdata extends Connection{


public function CreateNewPost($newtitle,$newcontent,$author){
    $sql = 'INSERT INTO post(post_title,post_content,author_id) VALUES(:post_title,:post_content,:author_id)';
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute(['post_title' => $newtitle, 'post_content' => $newcontent,'author_id' => $author]);
    
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
        $author = $posts->author_id;
        $FPost = new Content($fid,$ftitle,$fcontent,$time,$author);
        array_push($postsarray,$FPost);
        

    }

    return $postsarray;
}


public function SerachPosts($name){
    $sql = 'SELECT * FROM post WHERE post_title LIKE :post_title ORDER BY id DESC';
    $stmt = $this->Connect()->prepare($sql);

    $postsarray = array();
    $name = "%$name%";
    $stmt->execute(['post_title' => $name]);

    while($posts = $stmt->fetch()){
        $fid = $posts->id;
        $ftitle = $posts->post_title;
        $fcontent = $posts->post_content;
        $time = $posts->timeOfPost;
        $author = $posts->author_id;
        $FPost = new Content($fid,$ftitle,$fcontent,$time,$author);
        array_push($postsarray,$FPost);
        

    }

    return $postsarray;
}


public function DeletePost($id){
    $sql = 'DELETE FROM post WHERE id = :id';
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute(['id' => $id]);
}


public function DeleteComments($id){
    $sql = 'DELETE FROM comments WHERE post_id = :post_id';
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute(['post_id' => $id]);
}



public function GetAPostByID($id){
    $sql = 'SELECT * FROM post WHERE id=:id ';
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute(['id'=> $id]);
    $posts = $stmt->fetch();
        $fid = $posts->id;
        $ftitle = $posts->post_title;
        $fcontent = $posts->post_content;
        $time = $posts->timeOfPost;
        $author = $posts->author_id;
        $FPost = new Content($fid,$ftitle,$fcontent,$time,$author);
        return $FPost;
}




public function PostComment($author_id,$post_id,$comment){
    $sql = 'INSERT INTO comments(post_id,comment,author_id) VALUES(:post_id,:comment,:author_id)';
    $stmt = $this->Connect()->prepare($sql);
    $stmt->execute(['author_id' => $author_id, 'post_id' => $post_id,'comment' => $comment]);
}

public function GetAllComments($post_id){
    $sql = 'SELECT * FROM comments WHERE post_id =? ORDER BY id DESC';
    $stmt = $this->Connect()->prepare($sql);

    $commentsarray = array();
    $stmt->execute([$post_id]);

    while($com = $stmt->fetch()){
        $fid = $com->id;
        $fpost = $com->post_id;
        $fcomment = $com->comment;
        $fauthor = $com->author_id;
        $FCmon = new Comment($fid,$fpost,$fcomment,$fauthor);
        array_push($commentsarray,$FCmon);
        

    }

    return $commentsarray;
}


}
?>