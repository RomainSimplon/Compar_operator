<?php

class Admin {

    private $id;
    private $pseudo;
    private $pw;

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



    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }

    public function getPseudo(){
        return $this->pseudo;
    }




    public function setPw($pw){
        $this->pw = $pw;
    }

    public function getPw(){
        return $this->pw;
    }

}