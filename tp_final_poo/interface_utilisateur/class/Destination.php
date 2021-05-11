<?php 

class Destination {
    private $id;
    private $location;
    private $price;
    private $image;
    private $id_tour_operator;
    private $imagenoiretblanc;


public function __construct(array $data){

    $this->hydrate($data);
  
}

        public function hydrate(array $data)
        {
            foreach ($data as $key => $value)
            {
              $method = 'set'.ucfirst($key);
    
              if (method_exists($this, $method))
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


public function setLocation($location){
    $this->location = $location;
}

public function getLocation(){
    return $this->location;
}


public function setPrice($price){
    $this->price = $price;
}


public function getPrice(){
    return $this->price;
}

public function setId_tour_operator($id_tour_operator){
    $this->id_tour_operator = $id_tour_operator;
}

public function getId_tour_operator(){
    return $this->id_tour_operator;
}

public function setImage($image){
    $this->image = $image;
}

public function getImage(){
    return $this->image;
}

public function setImagenoiretblanc($imagenoiretblanc){
    $this->imagenoiretblanc = $imagenoiretblanc;
}



public function getImagenoiretblanc(){
   return $this->imagenoiretblanc;
}



}

