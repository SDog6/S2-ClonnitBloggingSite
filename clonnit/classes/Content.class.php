<?php

class Content{

private $id;
private $title;
private $content;
private $author_id;
private $timestamp;

public function __construct($id,$title,$content,$author_id,$timestamp){
    $this->id = $id;
    $this->title = $title;
    $this->content = $content;
    $this->author_id = $author_id;
    $this->timestamp = $timestamp;
}


public function GetID(){
    return $this->id;
}

public function Gettitle(){
    return $this->title;
}

public function Getcontent(){
    return $this->content;
}

public function Getauthor_id(){
    return $this->author_id;
}

public function GetTime(){
    return $this->timestamp;
}

public function GetInfo(){
    return "ID:$this->id title:$this->title content:$this->content author_id:$this->author_id";
}

}


?>