<?php

class review {

    private $id;
    private $message;
    private $author;
    private $is_tour_operator;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }
    
    
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
        $method = 'set'.ucfirst($key);
        
        if(method_exists($this, $method))
        {
            $this->$method($value);
        }
        }
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