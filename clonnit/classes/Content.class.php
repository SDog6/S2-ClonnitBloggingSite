<?php

class Content{

private $id;
private $title;
private $content;
private $author_id;
private $timestamp;

public function __construct($id,$title,$content,$timestamp,$author_id){
    $this->id = $id;
    $this->title = $title;
    $this->content = $content;
    $this->timestamp = $timestamp;
    $this->author_id = $author_id;
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


}


?>