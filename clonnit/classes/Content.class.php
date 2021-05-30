<?php

class Content{

private $id;
private $title;
private $content;
private $author_id;
private $timestamp;

public function __construct($id,$title,$content,$timestamp){
    $this->id = $id;
    $this->title = $title;
    $this->content = $content;
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
<<<<<<< HEAD
    return "ID:$this->id title:$this->title content:$this->content author_id:$this->author_id";
=======
    return "ID:$this->id title:$this->title content:$this->content time:$this->timestamp";
>>>>>>> Hristo
}

}


?>