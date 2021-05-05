<?php

class TourOperator {

    private $id;
    private $name;
    private $grade;
    private $link;
    private $is_premium;

    
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


    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setGrade($grade){
        $this->grade = $grade;
    }

    public function getGrade(){
        return $this->grade;
    }


    public function setLink($link){
        $this->link = $link;
    }

    public function getLink(){
        return $this->link;
    }


    public function setIs_premium($is_premium){
        $this->is_premium = $is_premium;
    }

    public function getIsPremium(){
        return $this->is_premium;
    }
}