<?php

class review {

    private $id;
    private $message;
    private $author;
    private $is_tour_operator;

    
    public function __construct($id,$message,$author,$is_tour_operator)
    {
        $this->id = $id;
        $this->message = $message;
        $this->author = $author;
        $this->is_tour_operator = $is_tour_operator;
    }



    public function getId(){
        return $this->id;
    }

    public function getMessage(){
        return $this->message;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function getTourOperator(){
        return $this->is_tour_operator;
    }
}