<?php

class Comment{
    
private $id;
private $post_id;
private $comment;
private $author_id;

public function __construct($id,$post_id,$comment,$author_id){
    $this->id = $id;
    $this->post_id = $post_id;
    $this->comment = $comment;
    $this->author_id = $author_id;
}


public function GetID(){
    return $this->id;
}

public function GetPostID(){
    return $this->post_id;
}

public function GetComment(){
    return $this->comment;
}

public function GetAuthorID(){
    return $this->author_id;
}


}


?>